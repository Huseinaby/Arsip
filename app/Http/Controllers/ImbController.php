<?php

namespace App\Http\Controllers;

use App\Models\Imb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImbController extends Controller
{
    public function index()
    {
        return view('imb', [
            'imbs' => Imb::all()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nomor_dp' => 'required|unique:imbs',
            'nama' => 'required',
            'alamat' => 'required',
            'lokasi' => 'required',
            'box' => 'required',
            'keterangan' => 'nullable',
            'tahun' => 'required',
            'imbs' => 'required' // Field untuk file PDF yang digabungkan
        ]);

        // Decode base64 to store as file
        $base64Pdf = $request->input('imbs');
        $pdfContent = base64_decode(preg_replace('#^data:application/pdf;base64,#i', '', $base64Pdf));

        // Simpan file ke storage Laravel (atau folder tertentu)
        $fileName = 'merged_imb_' . time() . '.pdf';
        $validateData['imbs'] = $fileName;

        Storage::disk('public')->put('imbs/' . $fileName, $pdfContent);


        Imb::create($validateData);

        return redirect()->route('home')->with('success', 'Data IMB berhasil ditambahkan !!');
    }

    public function destroy($id_imb)
    {
        $imb = Imb::where('id', $id_imb)->firstOrFail();

        $imb->delete();

        return redirect()->route('dashboard')->with('success', 'Data IMB berhasil dihapus !!');
    }

    public function management()
    {
        $items = imb::paginate(23); // Membatasi 25 data per halaman

        $title = "Data IMB";

        // Mengirim data ke view
        return view('management', compact('items', 'title'));
    }

    public function show($name)
    {
        return view('lihatPdf', [
            "fileName" => $name
        ]);
    }
}
