<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(Request $request){
        $toko = [
            'nama_toko'=>'Makmur Jaya Abadi',
            'alamat'=>'Bondowoso, Jawa Timur',
            'type'=>'ruko',
        ];

        $search = $request->keyword;

        $produk = Produk::when($search,function($query,$search){
            return $query->where('nama_produk','like',"%{$search}%");
        })->get(); //query untuk mengambil semua data yang berada di tabel "tb_produk"
        // $queryBuilder = DB::table('tb_produk')->get(); // query untuk mengambil semua data yang berada di tabel "tb_produk"
        return view('pages.produk.show',[
            'data_toko'=>$toko,
            'data_produk'=>$produk,
        ]);
    }

    public function create(){
        return view('pages.produk.add');
    }

    public function store(Request $request){
        // validasi
        $request->validate([
            'nama_produk'=>'required|min:8|max:12', // nama wajib di isi , minimal 8 karakter dan maximal 12 karakter
            'harga_produk'=>'required',
            'deskripsi'=>'required',
        ],[
            'nama_produk.min'=>'nama produk minimal 8 karakter',
            'nama_produk.max'=>'nama produk maximal 12 karakter',
            'nama_produk.required'=>'nama produk wajib diisi',
            'harga_produk.required'=>'harga produk wajib diisi',
            'deskripsi.required'=>'deskripsi produk wajib diisi',
        ]);

        // untuk menambahkan data ke tabel 'tb_produk'
        // DB::table('tb_produk')->create();
        // query tambah data
        Produk::create([
            'nama_produk'=>$request->nama_produk,
            'harga'=>$request->harga_produk,
            'deskripsi_produk'=>$request->deskripsi,
            'kategori_id'=>'1',
        ]);

        // setelah data berhasil di tambah,akan mengarahkan ke halaman /product dan memberikan notif berhasil men...
        return redirect('/product')->with('message','Berhasil Menambahkan Data Produk');
    }

    public function show($id){
        // query atau perintah
        // elequent orm
        $data = Produk::findOrFail($id);

        // query builder
        // DB::table('tb_produk')->where('id_produk',$id)->firstOrFail();

        return view('pages.produk.detail',[
            'produk'=>$data
        ]);
    }

    public function edit($id){
        // mengambil 1 data spesifik dari id yang di kirimkan dari parameter
        $data = Produk::findOrFail($id);

        return view('pages.produk.edit',[
            'data'=>$data,
        ]);
    }

    public function update($id, Request $request){
        $request->validate([
            'nama_produk'=>'required|min:8', // nama wajib di isi , minimal 8 karakter
            'harga_produk'=>'required',
            'deskripsi'=>'required',
        ],[
            'nama_produk.required'=>'nama produk wajib diisi',
            'harga_produk.required'=>'harga produk wajib diisi',
            'deskripsi.required'=>'deskripsi produk wajib diisi',
        ]);

        // query untuk simpan data yang telah kita update atau di edit
        Produk::where('id_produk',$id)->update([
            'nama_produk'=>$request->nama_produk,
            'harga'=>$request->harga_produk,
            'deskripsi_produk'=>$request->deskripsi,
        ]);

        return redirect('/product')->with('message','Data Berhasil Di Edit');
    }

    public function destroy($id){
        // query untuk menghapus data di tabel "tb_produk"
        Produk::findOrFail($id)->delete();
        return redirect('/product')->with('message','Data Produk Berhasil dihapus!!');
    }
}
