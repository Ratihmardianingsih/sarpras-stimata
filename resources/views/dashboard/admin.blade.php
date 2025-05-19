@extends('layouts.app')

@section('content')
    <div class="main-content">
        <!-- Header -->
        <header>
            <div>
                <h1>DASHBOARD</h1>
                <p>Selamat Datang! Admin {{ auth()->user()->name }} 👋</p>
            </div>
                <!-- Form logout dengan metode POST -->
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                 @csrf 
            <button class="logout-btn">Logout</button>
        </header>
      
        <div class="table-container">
        <!-- Card Stats -->
        <div class="card-stat-container">
            <div class="card-stat">
                <h3>{{ $totalRuangan }}</h3>
                <p>Total Ruangan</p>
            </div>
            <div class="card-stat">
                <h3>{{ $ruanganDipinjam }}</h3>
                <p>Total Ruangan Dipinjam</p>
            </div>
            <div class="card-stat">
                <h3>{{ $ruanganTersedia }}</h3>
                <p>Total Ketersediaan Ruangan</p>
            </div>
            <div class="card-stat">
                <h3>{{ $totalruanganProses }}</h3>
                <p>Total Peminjam</p>
            </div>
        </div>
     

        <!-- Footer -->
        <footer>
            <p>Copyright @Stimata2025</p>
        </footer>
</div>
    </div>
@endsection
