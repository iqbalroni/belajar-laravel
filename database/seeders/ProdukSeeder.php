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
        // query untuk menambahkan data ke tabel tb_produk
        DB::table('tb_produk')->insert([
            [
                'nama_produk' => 'Smart TV Samsung 24 Inch',
                'harga' => 1500000,
                'deskripsi_produk' => 'ini adalah sebuah deskripsi dummy',
                'kategori_id' => '2',
                'created_at' => now()
            ],
            [
                'nama_produk' => 'Laptop Lenovo Thinkpad',
                'harga' => 1600000,
                'deskripsi_produk' => 'ini adalah sebuah deskripsi dummy',
                'kategori_id' => '2',
                'created_at' => now()
            ],
            [
                'nama_produk' => 'Smartwatch Apple watch series 9',
                'harga' => 800000,
                'deskripsi_produk' => 'ini adalah sebuah deskripsi dummy',
                'kategori_id' => '2',
                'created_at' => now()
            ]
        ]);
    }
}
