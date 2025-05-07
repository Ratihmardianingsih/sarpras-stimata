<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts & Bootstrap -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ url('/dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i> Dashboard
                            </a>
                        </li>

                        @if(auth()->user()->role == 'admin') <!-- Sidebar untuk Admin -->
                            <!-- Data Ruangan Dropdown -->
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#dataRuanganDropdown" aria-expanded="false" aria-controls="dataRuanganDropdown">
                                    <i class="fas fa-cogs"></i> Data Ruangan
                                </a>
                                <div class="collapse" id="dataRuanganDropdown">
                                    <ul class="nav flex-column ms-3">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/kategori') }}">
                                                <i class="fas fa-th-list"></i> Kategori
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/ruangan') }}">
                                                <i class="fas fa-building"></i> Ruangan
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Ketersediaan Ruangan Dropdown -->
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#ketersediaanDropdown" aria-expanded="false" aria-controls="ketersediaanDropdown">
                                    <i class="fas fa-calendar-check"></i> Ketersediaan Ruangan
                                </a>
                                <div class="collapse" id="ketersediaanDropdown">
                                    <ul class="nav flex-column ms-3">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/ketersediaan') }}">
                                                <i class="fas fa-calendar-alt"></i> Ketersediaan
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/riwayat-transaksi') }}">
                                                <i class="fas fa-history"></i> Laporan
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/data-peminjaman') }}">
                                    <i class="fas fa-users"></i> Data Peminjaman
                                </a>
                            </li>
                        @endif

                        @if(auth()->user()->role == 'peminjam') <!-- Sidebar untuk Peminjam -->
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#peminjamanDropdown" aria-expanded="false" aria-controls="peminjamanDropdown">
                                <i class="fas fa-calendar-check"></i> Peminjaman Ruangan
                            </a>
                            <div class="collapse" id="peminjamanDropdown">
                                <ul class="nav flex-column ms-3">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/pinjam-ruangan') }}">
                                            <i class="fas fa-calendar-plus"></i> Pinjam Ruangan
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/informasi') }}">
                                            <i class></i> Informasi
                                        </a>
                                    </li>
                        </li>
                    @endif

                        <li class="nav-item">
                            <!-- Form logout dengan metode POST -->
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf <!-- Menambahkan CSRF token untuk keamanan -->
                                <button type="submit" class="nav-link text-danger btn btn-link">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
