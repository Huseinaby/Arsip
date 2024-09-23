<?php

use App\Models\Imb;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImbController;
use App\Http\Controllers\DataController;

Route::get('/',[DataController::class,'index'])->name('home');

Route::get('/tentang', function() {
    return view('tentang', [
        'title' => 'Tentang'
    ]);
});


Route::get('/inputArsip', function() {
    return view('form',[
        'title'=>'Form Input IMB'
    ]);
});

// Route::get('/management', function() {
//     return view('management',[
//         'title'=>'Data IMB'
//     ]);
// });

Route::post('/inputArsip', [ImbController::class, 'store']);

Route::get('/management', [ImbController::class, 'management']);
Route::get('/lihat/{name}', [ImbController::class, 'show']);


Route::get('/login',function(){
    return view('login.index',[
        'title'=>'Login Page'
    ]);
});

// 'jumlahData'=>count(Imb::all()),
