<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        DB::table('kategoris')->insert([
            ['kode_kategori' => 'KD-RK-01', 'nama_kategori' => 'Ruang Kelas','nama_ruangan' => 'Ruang Kelas A. 3.1', 'kapasitas' => 45],
            ['kode_kategori' => 'KD-RK-02', 'nama_kategori' => 'Ruang Kelas','nama_ruangan' => 'Ruang Kelas A. 3.2', 'kapasitas' => 45],
            ['kode_kategori' => 'KD-RK-03', 'nama_kategori' => 'Ruang Kelas','nama_ruangan'=>  'Ruang Kelas A. 3.3', 'kapasitas' => 45],
            ['kode_kategori' => 'KD-RK-04', 'nama_kategori' => 'Ruang Kelas','nama_ruangan' => 'Ruang Kelas A. 3.4', 'kapasitas' => 45],
            ['kode_kategori' => 'KD-RK-05', 'nama_kategori' => 'Ruang Kelas','nama_ruangan' => 'Ruang Kelas A. 3.5', 'kapasitas' => 70],
            ['kode_kategori' => 'KD-L4', 'nama_kategori' => 'Lantai Atas','nama_ruangan' => 'Lantai 4', 'kapasitas' => 200],
            ['kode_kategori' => 'KD-PRP', 'nama_kategori' => 'Perpustakaan','nama_ruangan' => 'Perpustakaan', 'kapasitas' => 30],
            ['kode_kategori' => 'KD-RP', 'nama_kategori' => 'Ruang Rapat','nama_ruangan' => 'Ruang Rapat/Pertemuan', 'kapasitas' => 25],
            ['kode_kategori' => 'KD-KNT', 'nama_kategori' => 'Kantin', 'nama_Ruangan' => 'Kantin', 'kapasitas' => 30],
            ['kode_kategori' => 'KD-LPN', 'nama_kategori' => 'Lapangan','nama_ruangan' => 'Halaman Kampus',  'kapasitas' => 500],
        ]);
    }
    

}
