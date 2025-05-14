<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('laporans', function (Blueprint $table) {
        $table->id();
        $table->string('kode_kategori');
        $table->integer('kapasitas');
        $table->date('tanggal_pinjam');
        $table->time('waktu_mulai');
        $table->time('waktu_selesai');
        $table->text('keterangan')->nullable();
        $table->string('status');
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->foreignId('ruangan_id')->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('laporans');
}
};
