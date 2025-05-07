<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

  protected $table = 'ruangans';



    // Menambahkan atribut yang bisa diisi secara massal
        protected $fillable = [
            'kode_kategori', 'nama_ruangan', 'kapasitas', 'deskripsi', 'lokasi',
        ];
        
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kode_kategori', 'kode_kategori');
    }

    // Model Ruangan
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }

}
