<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/about',function(){
    return view('pages.about',[
        'nama'=>'mochammad ardiansyah',
        'umur'=>20,
        'alamat'=>'Malaysia'
    ]);
});


Route::view('/contact','pages.contact');

// satu controller banyak method
Route::get('/product',[ProdukController::class,'index']); //read data menampilkan data
Route::get('/product/create',[ProdukController::class,'create']); //menampilkan halaman form data
Route::post('/product',[ProdukController::class,'store']); // untuk mengolah data yang telah dikirim dari form data
Route::get('/product/{id}',[ProdukController::class,'show']); //untuk menampilkan halaman detail data
Route::get('/product/{id}/edit',[ProdukController::class,'edit']); //menampilkan halaman form edit data
Route::put('/product/{id}',[ProdukController::class,'update']); // untuk mengolah data yang telah dikirim dari form edit data
Route::delete('/product/{id}',[ProdukController::class,'destroy']); //method untuk menjalankan fungsi hapus data

Route::resource('kategori',KategoriController::class); // membuat routing menggunakan resource
