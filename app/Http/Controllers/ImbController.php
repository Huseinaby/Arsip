<?php

namespace App\Http\Controllers;

use App\Models\Imb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class ImbController extends Controller
{


    // SIMPAN
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nomor_dp' => 'required|numeric',
            'nama' => 'nullable',
            'alamat' => 'nullable',
            'lokasi' => 'nullable',
            'box' => 'nullable',
            'keterangan' => 'nullable',
            'tahun' => 'nullable',
            'imbs' => 'nullable' // Field untuk file PDF yang digabungkan
        ]);

        // Decode base64 to store as file
        $base64Pdf = $request->input('imbs');
        $pdfContent = base64_decode(preg_replace('#^data:application/pdf;base64,#i', '', $base64Pdf));

        // Simpan file ke storage Laravel (atau folder tertentu)
        $fileName = 'imb_' . $request['nomor_dp'] . '_' . $request['tahun'] . '.pdf';
        $validateData['imbs'] = $fileName;

        Storage::disk('public')->put('imbs/' . $fileName, $pdfContent);


        Imb::create($validateData);

        return redirect()->route('input')->with('success', 'Data IMB berhasil ditambahkan !!');
    }


    // Hapus
    public function destroy($id_imb)
    {
        $imb = Imb::where('id', $id_imb)->firstOrFail();

        $imb->delete();

        return redirect()->route('home')->with('success', 'Data IMB berhasil dihapus !!');
    }

    // Update
    public function update(Request $request, $id_imb)
    {
        $imb = Imb::where('id', $id_imb)->firstOrFail();

        $validateData = $request->validate([
            'nomor_dp' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'lokasi' => 'required',
            'box' => 'required',
            'keterangan' => 'nullable',
            'tahun' => 'required',
        ]);

        if ($request->filled('imbs')) {
            if ($imb->imbs) {
                Storage::delete('storage/app/public/imbs/' . $imb->imbs);
            }

            $base64Pdf = $request->input('imbs');
            $pdfContent = base64_decode(preg_replace('#^data:application/pdf;base64,#i', '', $base64Pdf));

            $fileName = 'imb_' . $request['nomor_dp'] . '_' . $request['tahun'] . '.pdf';
            $validateData['imbs'] = $fileName;

            Storage::disk('public')->put('imbs/' . $fileName, $pdfContent);
        } else {
            $validateData['imbs'] = $imb->imbs;
        }

        $imb->update($validateData);

        return redirect()->route('input')->with('success', 'IMB Berhasil dirubah!!');
    }



    public function management()
    {
        $items = Imb::orderBy('tahun', 'asc') // Urutkan berdasarkan 'tahun' terlebih dahulu
            ->orderBy('nomor_dp', 'asc') // Kemudian urutkan berdasarkan 'nomor_dp'
            ->paginate(20); // Membatasi 20 data per halaman
        $title = "Data IMB";

        // Mengirim data ke view
        return view('management', compact('items', 'title'));

    }

    public function show($name)
    {
        $path = storage_path('app/public/imbs/' . $name);
        return response()->file($path, [
            'Content-Type' => 'application/pdf'
        ]);
    }

    public function printAll(Request $request)
    {
        $query = $request->input('query');
        $field = $request->input('field');

        // Pastikan $field tidak kosong dan valid
        if ($field && $query) {
            // Lakukan pencarian dengan filter yang diberikan
            $items = Imb::where($field, 'like', '%' . $query . '%')
                ->orderBy('tahun', 'asc')      
                ->orderBy('nomor_dp', 'asc')   
                ->get();

        } elseif ($request->filled('query')) {
            // Jika hanya query yang terisi, cari semua data berdasarkan query
            $items = Imb::where('nomor_dp', 'like', '%' . $query . '%')
                ->orWhere('nama', 'like', '%' . $query . '%')
                ->orWhere('alamat', 'like', '%' . $query . '%')
                ->orWhere('lokasi', 'like', '%' . $query . '%')
                ->orWhere('box', 'like', '%' . $query . '%')
                ->orWhere('keterangan', 'like', '%' . $query . '%')
                ->orWhere('tahun', 'like', '%' . $query . '%')
                ->orderBy('nomor_dp', 'asc')->get(); 
        } else {
            $items = Imb::orderBy('tahun', 'asc')      
                ->orderBy('nomor_dp', 'asc')->get();
        }

        // Menampilkan view yang sudah diformat untuk print
        return view('management_print', compact('items'));
    }


    public function search(Request $request)
    {
        $query = $request->input('query');
        $field = $request->input('field');

        // Cek jika field dan query kosong
        if ((!$request->filled('query') && !$request->filled('field')) || ((!$request->filled('query') && $request->filled('field')))) {
            // Jika tidak ada isian query atau field, kembali ke halaman management
            return redirect()->route('management'); // Ganti 'management' dengan nama rute yang sesuai
        }

        // Lakukan pencarian berdasarkan field yang dipilih
        if ($request->filled('query') && $request->filled('field')) {
            $items = Imb::where($field, 'like', '%' . $query . '%')->orderBy('nomor_dp', 'asc')->paginate()->withQueryString();
        } elseif ($request->filled('query')) {
            // Jika hanya query yang terisi, cari semua data
            $items = Imb::where('nomor_dp', 'like', '%' . $query . '%')
                ->orWhere('nama', 'like', '%' . $query . '%')
                ->orWhere('alamat', 'like', '%' . $query . '%')
                ->orWhere('lokasi', 'like', '%' . $query . '%')
                ->orWhere('box', 'like', '%' . $query . '%')
                ->orWhere('keterangan', 'like', '%' . $query . '%')
                ->orWhere('tahun', 'like', '%' . $query . '%')
                ->orderBy('nomor_dp', 'asc')->paginate()->withQueryString();
        }

        $title = 'Data IMB';

        return view('management', compact('items', 'title'));
    }
}
