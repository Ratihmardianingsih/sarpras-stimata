<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Riwayat Transaksi</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Kategori</th>
                <th>Peminjam</th>
                <th>Nama Ruangan</th>
                <th>Kapasitas</th>
                <th>Tanggal Pinjam</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Keterangan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($riwayat as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->peminjaman->kode_kategori ?? 'Data tidak ditemukan' }}</td>
                    <td>{{ $item->peminjaman->peminjam->name ?? 'Data tidak ditemukan' }}</td>
                    <td>{{ $item->peminjaman->ruangan->nama_ruangan ?? 'Data tidak ditemukan' }}</td>
                    <td>{{ $item->peminjaman->kapasitas ?? 'Data tidak ditemukan' }}</td>
                    <td>{{ $item->peminjaman->tanggal_pinjam ?? 'Data tidak ditemukan' }}</td>
                    <td>{{ $item->peminjaman->waktu_mulai ?? 'Data tidak ditemukan' }}</td>
                    <td>{{ $item->peminjaman->waktu_selesai ?? 'Data tidak ditemukan' }}</td>
                    <td>{{ $item->peminjaman->keterangan ?? 'Data tidak ditemukan' }}</td>
                    <td>{{ $item->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
