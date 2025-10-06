<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // query untuk ambil semua data -> get()
        // DB::table('tb_kategori')->get();
        $kategori = Kategori::get();
        return view('pages.kategori.show',compact(('kategori')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // membuat validasi untuk form tambah data kategori
        $request->validate([
            'nama_kategori'=>'required',
            'deskripsi'=>'required',
        ],[
            'nama_produk.required'=>'nama produk wajib diisi',
            'deskripsi.required'=>'deskripsi produk wajib diisi',
        ]);

        // perintah untuk menambahkan data ke tabel kategori
        Kategori::create([
            'nama_kategori'=>$request->nama_kategori,
            'deskripsi'=>$request->deskripsi,
        ]);

        // setelah data berhasil di tambah,akan mengarahkan ke halaman /kategori dan memberikan notif berhasil men...
        return redirect('/kategori')->with('message','Berhasil Menambahkan Data Kategori');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
