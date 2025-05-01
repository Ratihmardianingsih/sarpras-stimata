<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        DB::table('kategoris')->insert([
            ['kode_kategori' => 'KD-RK-01', 'deskripsi' => 'Ruang Kelas A. 3.1 (Kapasitas 30-45)'],
            ['kode_kategori' => 'KD-RK-02', 'deskripsi' => 'Ruang Kelas A. 3.2 (Kapasitas 30-45)'],
            ['kode_kategori' => 'KD-RK-03', 'deskripsi' => 'Ruang Kelas A. 3.3 (Kapasitas 30-45)'],
            ['kode_kategori' => 'KD-RK-04', 'deskripsi' => 'Ruang Kelas A. 3.4 (Kapasitas 30-45)'],
            ['kode_kategori' => 'KD-RK-05', 'deskripsi' => 'Ruang Kelas A. 3.5 (Kapasitas 70)'],
            ['kode_kategori' => 'KD-L4', 'deskripsi' => 'Lantai 4 (Kapasitas 200)'],
            ['kode_kategori' => 'KD-PRP', 'deskripsi' => 'Perpustakaan (Kapasitas 30)'],
            ['kode_kategori' => 'KD-RP', 'deskripsi' => 'Ruang Rapat/Pertemuan (Kapasitas 25)'],
            ['kode_kategori' => 'KD-KNT', 'deskripsi' => 'Kantin (Kapasitas 30)'],
            ['kode_kategori' => 'KD-LPN', 'deskripsi' => 'Lapangan (Kapasitas 500)'],
        ]);
    }
}
