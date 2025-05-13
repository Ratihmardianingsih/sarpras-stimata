<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Ruangan</title>
</head>
<body>
    <h1>Daftar Ruangan</h1>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Kategori</th>
                <th>Nama Kategori</th>
                <th>Nama Ruangan</th>
                <th>Kapasitas</th>
                <th>Deskripsi</th>
                <th>Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ruangans as $ruangan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $ruangan->kode_kategori }}</td>
                    <td>{{ $ruangan->kategori ? $ruangan->kategori->nama_kategori : 'Nama Kategori Tidak Tersedia' }}</td>
                    <td>{{ $ruangan->nama_ruangan }}</td>
                    <td>{{ $ruangan->kapasitas }}</td>
                    <td>{{ $ruangan->deskripsi }}</td>
                    <td>{{ $ruangan->lokasi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
