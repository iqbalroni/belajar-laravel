<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_kategori')->insert([
            [
                'nama_kategori'=>'Elektronik',
                'deskripsi'=>'barang elektronik dengan kualitas baik'
            ],
            [
                'nama_kategori'=>'Rumah Tangga',
                'deskripsi'=>'barang rumah tangga dengan kualitas mantappp '
            ],
        ]);
        // query untuk menambahkan data ke tabel tb_produk
        DB::table('tb_produk')->insert([
            [
                'kode_produk'=>'A001',
                'nama_produk' => 'Smart TV Samsung 24 Inch',
                'harga' => 1500000,
                'deskripsi_produk' => 'ini adalah sebuah deskripsi dummy',
                'stok'=>100,
                'kategori_id' => 1,
                'created_at' => now()
            ],
            [
                'kode_produk'=>'A002',
                'nama_produk' => 'Charger Apple',
                'harga' => 2000000,
                'deskripsi_produk' => 'ini adalah sebuah deskripsi dummy',
                'stok'=>50,
                'kategori_id' => 1,
                'created_at' => now()
            ],
            [
                'kode_produk'=>'A003',
                'nama_produk' => 'Sapu Ijuk',
                'harga' => 50000,
                'deskripsi_produk' => 'ini adalah sebuah deskripsi dummy',
                'stok'=>500,
                'kategori_id' => 2,
                'created_at' => now()
            ],
        ]);
    }
}
