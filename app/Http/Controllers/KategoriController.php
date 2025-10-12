<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // variabel yang isinya berasal dari request search
        $search = $request->keyword;

        // query untuk ambil semua data -> get()
        // DB::table('tb_kategori')->get();
        $kategori = Kategori::when($search,function($query,$search){
            return $query->where('nama_kategori','like',"%{$search}%");
        })->get();
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
        // query dibawah berfungsi untuk mengambil 1 data berdasarkan parameter id yang di kirimkan dari routing
        $data = Kategori::findOrFail($id);

        // setelah itu di arahkan ke view pages/kategori/edit dan mengirimkan data yang di beri nama 'Kategori'
        return view('pages.kategori.edit',['kategori'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // membuat validasi untuk form tambah data kategori
        $request->validate([
            'nama_kategori'=>'required',
            'deskripsi'=>'required',
        ],[
            'nama_produk.required'=>'nama produk wajib diisi',
            'deskripsi.required'=>'deskripsi produk wajib diisi',
        ]);

        // perintah untuk mengubah data berdasarkan id yang di kirimkan
        Kategori::where('id_kategori',$id)->update([
            'nama_kategori'=>$request->nama_kategori,
            'deskripsi'=>$request->deskripsi,
        ]);

        // setelah data berhasil di tambah,akan mengarahkan ke halaman /kategori dan memberikan notif berhasil men...
        return redirect('/kategori')->with('message','Berhasil Menambahkan Data Kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // query untuk menghapus data di tabel "tb_kategori"
        Kategori::findOrFail($id)->delete();
        return redirect('/kategori')->with('message','Data Kategori Berhasil dihapus!!');
    }
}
