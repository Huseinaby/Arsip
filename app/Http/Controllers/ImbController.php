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
            'nama' => 'required',
            'alamat' => 'required',
            'lokasi' => 'required',
            'box' => 'required',
            'keterangan' => 'nullable',
            'tahun' => 'required'
        ]);
        Imb::crate($validateData);
    }
}
