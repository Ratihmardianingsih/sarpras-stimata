@extends('layouts.app')

@section('content')
    <div class="main-content">
        <header>
            <div>
                <h1>DASHBOARD</h1>
                <p>Selamat Datang, Peminjam</p>
            </div>
             <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                 @csrf 
            <button class="logout-btn">Logout</button>
        </header>

        <div class="table-container">
        <div class="card-stat-container">
            <div class="card-stat">
                <h3>{{ $totalRuangan }}</h3>
                <p>Total Ruangan Admin</p>
            </div>
            <div class="card-stat">
                <h3>{{ $ruanganTersedia }}</h3>
                <p>Total Ketersediaan Ruangan</p>
            </div>
            <div class="card-stat">
                <h3>{{ $diProses }}</h3>
                <p>Dalam Proses</p>
            </div>
        </div>

        <footer>
            <p>Copyright @Stimata2025</p>
        </footer>
    </div>
</div>

@endsection
