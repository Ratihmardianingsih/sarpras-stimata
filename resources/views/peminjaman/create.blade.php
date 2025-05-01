<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Peminjaman</title>
</head>
<body>
    <h1>Form Peminjaman Ruangan</h1>

    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf
        <label for="ruangan_id">Pilih Ruangan:</label>
        <select name="ruangan_id" id="ruangan_id" required>
            @foreach ($ruangans as $ruangan)
                <option value="{{ $ruangan->id }}">{{ $ruangan->nama }}</option>
            @endforeach
        </select><br><br>

        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" required><br><br>

        <label for="waktu_mulai">Waktu Mulai:</label>
        <input type="time" name="waktu_mulai" required><br><br>

        <label for="waktu_selesai">Waktu Selesai:</label>
        <input type="time" name="waktu_selesai" required><br><br>

        <button type="submit">Ajukan Peminjaman</button>
    </form>
</body>
</html>
