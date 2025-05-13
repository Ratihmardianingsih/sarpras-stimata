<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    
    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id', 'ruangan_id', 'kode_kategori', 'kapasitas', 
        'tanggal_pinjam', 'waktu_mulai', 'waktu_selesai', 'keterangan', 'status'
    ];

    // Relasi dengan pengguna (user)
    public function peminjam()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi dengan ruangan
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id');
    }
   

}
