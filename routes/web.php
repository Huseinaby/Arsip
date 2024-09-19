<?php

use App\Http\Controllers\ImbController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard',[
        'title'=>'dashboard',
        'name'=>'Abu Husein',
    ]);
})->name('home');

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

Route::get('/management', function() {
    return view('management',[
        'title'=>'Data IMB'
    ]);
});

Route::post('/inputArsip', [ImbController::class, 'store']);

Route::get('/management', [ImbController::class, 'management']);

