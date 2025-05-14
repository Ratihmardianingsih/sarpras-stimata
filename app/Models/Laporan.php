<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_kategori', 'kapasitas', 'tanggal_pinjam', 'waktu_mulai', 
        'waktu_selesai', 'keterangan', 'status', 'user_id', 'ruangan_id'
    ];
    public function ruangan()
{
    return $this->belongsTo(Ruangan::class); 
}
public function user()
{
    return $this->belongsTo(User::class); 
}
}