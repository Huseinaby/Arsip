<?php

namespace App\Http\Controllers;

use App\Models\Imb;
use Illuminate\Http\Request;

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
            'nomor_dp' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'lokasi' => 'required',
            'box' => 'required',
            'keterangan' => 'nullable',
            'tahun' => 'required'
        ]);
        Imb::create($validateData);

        return redirect()->route('home')->with('success', 'Data IMB berhasil ditambahkan !!');
    }

    public function update(Request $request, $id_imb){
        $imb = Imb::where('id', $id_imb)->firstOrFail();

        $validateData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'lokasi' => 'required',
            'box' => 'required',
            'keterangan' => 'nullable',
            'tahun' => 'required'
        ]);

        $imb->update($validateData);

        return redirect()->route('dashboard')->with('success', 'Data IMB berhasil diupdate !!');
    }

    public function destroy($id_imb){
        $imb = Imb::where('id', $id_imb)->firstOrFail();

        $imb->delete();

        return redirect()->route('dashboard')->with('success', 'Data IMB berhasil dihapus !!');
    }
}
