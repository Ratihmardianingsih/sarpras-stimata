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
     <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
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
            <div class="sidebar">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo"> <!-- Ganti dengan logo yang sesuai -->
                </div>
                <ul>
                    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>

        <!-- Menu Sidebar untuk Admin -->
            <li><a href="{{ url('/kategori') }}"><i class=""></i> Kategori</a></li>
            <li><a href="{{ url('/ruangan') }}"><i class="fas fa-building"></i> Ruangan</a></li>
            <li><a href="{{ url('/ketersediaan') }}"><i class="fas fa-calendar-alt"></i> Ketersediaan</a></li>
            <li><a href="{{ url('/riwayat-transaksi') }}"><i class="fas fa-history"></i> Laporan</a></li>
            <li><a href="{{ url('/data-peminjaman') }}"><i class="fas fa-users"></i> Data Peminjaman</a></li>
        @endif
    </ul>
</div>

                       @if(auth()->user()->role == 'peminjam') <!-- Sidebar untuk Peminjam -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="SIKAD STIMATA Logo"> <!-- Ganti dengan logo yang sesuai -->
        </div>
        <ul>
            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ url('/informasi') }}">
                <i class></i> Informasi
            </a></li>
            <li><a href="{{ url('/pinjam-ruangan') }}">
                <i class></i> Pinjam Ruangan
            </a></li>
            <li><a href="{{ url('/laporan') }}">
                <i class></i> Laporan
            </a></li>
        </ul>
    </div>
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
