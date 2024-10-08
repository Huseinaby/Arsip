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
        $fileName = 'imb_' . $request['nomor_dp'] . '_' . $request['tahun'] . '_' . time() . '.pdf';
        $validateData['imbs'] = $fileName;

        Storage::disk('public')->put('imbs/' . $fileName, $pdfContent);


        Imb::create($validateData);

        return redirect()->route('input')->with('success', 'Data IMB berhasil ditambahkan !!');
    }


    // Hapus
    public function destroy($id_imb)
    {
        $imb = Imb::where('id', $id_imb)->firstOrFail();

        if ($imb->imbs) {
            // dd($imb->imbs); 
            Storage::disk('public')->delete('imbs/' . $imb->imbs);
        }

        $imb->delete();

        return redirect()->route('management')->with('success', 'Data IMB berhasil dihapus !!');
    }

    // Update

    public function update(Request $request, $id_imb)
    {
        // Ambil data IMB berdasarkan ID atau gagal jika tidak ditemukan
        $imb = Imb::findOrFail($id_imb);

        // Validasi data yang diterima dari request
        $validateData = $request->validate([
            'nomor_dp' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'lokasi' => 'required',
            'box' => 'required',
            'keterangan' => 'nullable',
            'tahun' => 'required',
            'imbs' => 'nullable|string', // Asumsikan imbs dikirim sebagai string base64
        ]);

        $isFileUpdated = false;

        // Cek apakah ada file PDF baru yang diupload
        if ($request->filled('imbs')) {
            $isFileUpdated = true;

            // Jika ada file lama, hapus file tersebut
            if ($imb->imbs && Storage::disk('public')->exists('imbs/' . $imb->imbs)) {
                Storage::disk('public')->delete('imbs/' . $imb->imbs);
            }

            // Decode konten PDF dari base64
            $base64Pdf = $request->input('imbs');
            $pdfContent = base64_decode(preg_replace('#^data:application/pdf;base64,#i', '', $base64Pdf));

            // Buat nama file baru
            $fileName = 'imb_' . $validateData['nomor_dp'] . '_' . $validateData['tahun'] . '_' . time() . '.pdf';
            $validateData['imbs'] = $fileName;

            // Simpan file PDF ke storage
            Storage::disk('public')->put('imbs/' . $fileName, $pdfContent);
        } else {
            // Jika tidak ada file baru yang diupload, periksa apakah ada perubahan pada nomor_dp atau tahun
            $nomorDpChanged = $validateData['nomor_dp'] != $imb->nomor_dp;
            $tahunChanged = $validateData['tahun'] != $imb->tahun;

            if (($nomorDpChanged || $tahunChanged) && $imb->imbs) {
                // Extract nama file tanpa path
                $currentFileName = $imb->imbs;

                // Tentukan path saat ini dan path baru
                $currentPath = 'imbs/' . $currentFileName;

                // Pisahkan nama file berdasarkan underscore
                $parts = explode('_', pathinfo($currentFileName, PATHINFO_FILENAME));

                // Asumsikan format nama file adalah imb_nomor_dp_tahun_timestamp.pdf
                // Jadi, kita ambil nomor_dp dan tahun dari validateData
                if (count($parts) >= 4) { // memastikan ada cukup bagian
                    $newFileName = 'imb_' . $validateData['nomor_dp'] . '_' . $validateData['tahun'] . '_' . $parts[3] . '.' . pathinfo($currentFileName, PATHINFO_EXTENSION);

                    // Cek apakah file dengan nama baru sudah ada
                    if (!Storage::disk('public')->exists('imbs/' . $newFileName)) {
                        // Rename file di storage
                        Storage::disk('public')->move($currentPath, 'imbs/' . $newFileName);

                        // Update nama file di validateData
                        $validateData['imbs'] = $newFileName;
                    } else {
                        // Handle konflik nama file, misalnya dengan menambahkan timestamp atau memberikan error
                        // Berikut ini contoh menambahkan timestamp
                        $newFileName = 'imb_' . $validateData['nomor_dp'] . '_' . $validateData['tahun'] . '_' . time() . '.' . pathinfo($currentFileName, PATHINFO_EXTENSION);
                        Storage::disk('public')->move($currentPath, 'imbs/' . $newFileName);
                        $validateData['imbs'] = $newFileName;
                    }
                } else {
                    // Jika format nama file tidak sesuai, mungkin tambahkan log atau tangani sesuai kebutuhan
                    // Misalnya, tetap menggunakan nama file lama
                    $validateData['imbs'] = $currentFileName;
                }
            } else {
                // Jika tidak ada perubahan pada nomor_dp atau tahun, tetap gunakan nama file lama
                $validateData['imbs'] = $imb->imbs;
            }
        }

        // Update data IMB dengan data yang sudah divalidasi
        $imb->update($validateData);

        // Redirect dengan pesan <sukse></sukse>s
        return redirect()->route('management')->with('success', 'IMB Berhasil dirubah!!');
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
