<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ruangan</title>

    <!-- Link Bootstrap CSS untuk styling tabel -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Ruangan</h1>
        
        <!-- Tabel Ruangan -->
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nama Ruangan</th>
                    <th>Deskripsi</th>
                    <th>Kapasitas</th>
                    <th>Lokasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ruangans as $ruangan)
                    <tr>
                        <td>{{ $ruangan->nama }}</td>
                        <td>{{ $ruangan->deskripsi }}</td>
                        <td>{{ $ruangan->kapasitas }}</td>
                        <td>{{ $ruangan->lokasi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Script Bootstrap JS untuk fitur interaktif seperti tabel sorting, dll -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
