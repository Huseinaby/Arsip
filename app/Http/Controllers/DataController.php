<?php

namespace App\Http\Controllers;

use App\Models\Imb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index()
    {
        $dataPerTahun = DB::table('imbs')
            ->select('tahun', DB::raw('COUNT(*) as count'))
            ->groupBy('tahun')
            ->orderBy('tahun')
            ->get();

        // return response()->json($data);

        return view('dashboard', [
            'title' => 'Dashboad',
            'dataPerTahun' => $dataPerTahun,
            'jumlahData'=> count(Imb::all())

        ]);
    }
}
