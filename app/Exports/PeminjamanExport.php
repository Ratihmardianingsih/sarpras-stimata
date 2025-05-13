<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;

class PeminjamanExport implements FromCollection
{
    public function collection()
    {
        // Mengambil semua data peminjaman
        return Peminjaman::with(['peminjam', 'ruangan'])->get();
    }
}
