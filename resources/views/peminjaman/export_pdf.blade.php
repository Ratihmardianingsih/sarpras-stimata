<!DOCTYPE html>
<html>
<head>
    <title>Data Peminjaman</title>
</head>
<body>
    <h1>Data Peminjaman</h1>
    <table border="1">
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
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $pinjam)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pinjam->kode_kategori }}</td>
                    <td>{{ $pinjam->peminjam->name }}</td>
                    <td>{{ $pinjam->ruangan->nama_ruangan }}</td>
                    <td>{{ $pinjam->kapasitas }}</td>
                    <td>{{ $pinjam->tanggal_pinjam }}</td>
                    <td>{{ $pinjam->waktu_mulai }}</td>
                    <td>{{ $pinjam->waktu_selesai }}</td>
                    <td>{{ $pinjam->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
