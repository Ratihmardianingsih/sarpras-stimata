<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['nama_pembeli', 'jumlah', 'status', 'created_at']; // Pastikan kolom yang relevan ada
}
