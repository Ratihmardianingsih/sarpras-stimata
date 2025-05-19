<?php

namespace App\Exports;

use App\Models\RiwayatTransaksi;
use Maatwebsite\Excel\Concerns\FromCollection;

class RiwayatTransaksiExport implements FromCollection
{
    protected $riwayat;

    public function __construct($riwayat)
    {
        $this->riwayat = $riwayat;
    }

    public function collection()
    {
        return $this->riwayat;
    }
}
