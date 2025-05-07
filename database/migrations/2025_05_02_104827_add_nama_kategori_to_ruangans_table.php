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
        Schema::table('ruangans', function (Blueprint $table) {
            $table->string('nama_kategori')->nullable()->after('kode_kategori');
        });
    }
    
    public function down()
    {
        Schema::table('ruangans', function (Blueprint $table) {
            $table->dropColumn('nama_kategori');
        });
    }
    
};
