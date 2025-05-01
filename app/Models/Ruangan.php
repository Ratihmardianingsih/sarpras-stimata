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
        'nama_kategori','kode_kategori', 'nama_ruangan', 'kapasitas', 'lokasi',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kode_kategori', 'kode_kategori');
    }
}
