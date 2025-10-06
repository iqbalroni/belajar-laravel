<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // inisialisasi tabel produk
    protected $table = 'tb_produk';

    // inisialisasi primary_key di dalam tabel
    protected $primaryKey = 'id_produk';

    // inisialisasi data yang dapat kita isi
    // protected $fillable = ['nama_produk','harga','stok'];
    // inisialisasi data yang tidak boleh kita isi
    protected $guarded = ['id_produk'];
}
