<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STIMATA Sarpras</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            font-family: 'Georgia', serif;
            height: 100%;
        }

        header {
            background-color: #FFB96B;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 30px;
            height: 80px;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-container img {
            height: 60px;
            margin-right: 15px;
        }

        .title h1 {
            font-size: 24px;
            font-weight: bold;
        }

        .title p {
            font-size: 14px;
            margin-top: -5px;
        }

        .auth-links a {
            margin-left: 20px;
            margin-bottom: 30px;
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }

        main {
            position: relative;
            height: calc(100vh - 80px);
            background-image: url('{{ asset('images/stimata.png') }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
            overflow: hidden;
        }

        main::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 0;
        }

        .overlay {
            text-align: center;
            color: white;
            padding: 240px;
            border-radius: 5px;
            position: relative;
            z-index: 1;
        }

        .overlay h2 {
            font-size: 32px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .overlay h3 {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo STIMATA">
            <div class="title">
                <h1>STIMATA</h1>
                <p>Sarana dan Prasana</p>
            </div>
        </div>
        <div class="auth-links">
            <a href="{{ route('login') }}">LOG IN</a>
            <a href="{{ route('register') }}">REGISTER</a>
        </div>
    </header>

    <main>
        <div class="overlay">
            <h2>SELAMAT DATANG</h2>
            <h3>DI WEB SARPRAS STIMATA MALANG.</h3>
        </div>
    </main>
</body>
</html>
