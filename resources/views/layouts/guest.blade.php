<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- kalau pakai vite --}}
    @stack('styles') {{-- tambahan CSS --}}
</head>
<body>
    {{ $slot }}
</body>
</html>