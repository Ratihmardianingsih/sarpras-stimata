<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNamaKategoriToRuangansTable extends Migration
{
    /**
     * Menjalankan migrasi untuk menambah kolom nama_kategori.
     *
     * @return void
     */
    public function up()
    {
        // Cek apakah kolom 'nama_kategori' sudah ada atau belum
        if (!Schema::hasColumn('ruangans', 'nama_kategori')) {
            Schema::table('ruangans', function (Blueprint $table) {
                $table->string('nama_kategori')->nullable(); // Menambahkan kolom nama_kategori
            });
        }
    }

    /**
     * Membatalkan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ruangans', function (Blueprint $table) {
            $table->dropColumn('nama_kategori'); // Menghapus kolom nama_kategori
        });
    }
}
