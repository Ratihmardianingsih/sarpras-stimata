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
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->string('status', 255)->change(); // Mengubah tipe kolom status menjadi varchar(255)
        });
    }
    
    public function down()
    {
        Schema::table('peminjaman', function (Blueprint $table) {
            $table->enum('status', ['pending', 'accepted', 'rejected'])->change(); // Kembalikan ke enum
        });
    }
};
