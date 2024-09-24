<?php

use App\Models\Imb;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImbController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserController;

Route::get('/dashboard',[DataController::class,'index'])->name('home')->middleware('auth');

Route::get('/tentang', function() {
    return view('tentang', [
        'title' => 'Tentang'
    ]);
});


Route::get('/inputArsip', function() {
    return view('form',[
        'title'=>'Form Input IMB'
    ]);
})->middleware('auth');

// Route::get('/management', function() {
//     return view('management',[
//         'title'=>'Data IMB'
//     ]);
// });

Route::post('/inputArsip', [ImbController::class, 'store'])->middleware('auth');

Route::get('/management', [ImbController::class, 'management'])->middleware('auth');
Route::get('/lihat/{name}', [ImbController::class, 'show'])->middleware('auth');


Route::get('/', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'auth']);
Route::post('/logout', [UserController::class, 'logout']);

// 'jumlahData'=>count(Imb::all()),
