<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi dengan pengguna
            $table->foreignId('ruangan_id')->constrained('ruangans')->onDelete('cascade'); // Relasi dengan ruangan
            $table->string('kode_kategori'); // Kode Kategori
            $table->integer('kapasitas'); // Kapasitas
            $table->date('tanggal_pinjam'); // Tanggal pinjam
            $table->time('waktu_mulai')->nullable();
            $table->time('waktu_selesai')->nullable();
            $table->text('keterangan')->nullable(); // Keterangan
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status peminjaman
            $table->timestamps(); // Timestamps created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
}
