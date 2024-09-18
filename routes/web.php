<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard',[
        'title'=>'dashboard',
        'name'=>'Abu Husein',
    ]);
});

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
