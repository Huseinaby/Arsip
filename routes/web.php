<?php

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



Route::post('/inputArsip', [ImbController::class, 'store']);

Route::get('/management', [ImbController::class, 'management'])->name('management');
Route::get('/management/search', [ImbController::class, 'search'])->name('management.search');
Route::get('/lihat/{name}', [ImbController::class, 'show']);


Route::get('/login',function(){
    return view('login.index',[
        'title'=>'Login Page'
    ]);
});

Route::get('/imb/print-all', [ImbController::class, 'printAll'])->name('imb.printAll');


// web.php// web.php
