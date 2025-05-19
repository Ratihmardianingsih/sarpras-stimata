<x-guest-layout>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Login - Sarana dan Prasarana</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: 'Poppins', sans-serif;
                background-color: #FFBC5B;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .login-container {
                background-color: #FEE9A8;
                padding: 40px 30px;
                border-radius: 12px;
                box-shadow: 0 8px 16px rgba(0,0,0,0.15);
                text-align: center;
                width: 350px;
            }

           .logo {
                display: block;
                margin-left: auto;
                margin-right: auto;
                width: 100px;
            }

            h2 {
                margin: 10px 0 5px;
                font-size: 18px;
                font-weight: bold;
            }

            p {
                margin: 5px 0 20px;
                font-size: 14px;
                color: #333;
                line-height: 1.4;
            }

            form input[type="email"],
            form input[type="password"] {
                width: 100%;
                padding: 12px;
                margin: 8px 0;
                border: none;
                border-radius: 6px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }

            .form-options {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: 10px 0 20px;
                font-size: 13px;
            }

            .remember-me {
                display: flex;
                align-items: center;
                gap: 6px;
                color: #333;
            }

            .forgot-password {
                color: #007bff;
                text-decoration: none;
                font-weight: 500;
            }

            .forgot-password:hover {
                text-decoration: underline;
            }

            .login-btn {
                width: 100%;
                padding: 12px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 6px;
                font-weight: 600;
                cursor: pointer;
                margin-top: 10px;
            }

            .login-btn:hover {
                background-color: #0066cc;
            }

            .register-text {
                margin-top: 15px;
                font-size: 14px;
            }

            .register-text a {
                color: #007bff;
                text-decoration: none;
                font-weight: 500;
            }

            .register-text a:hover {
                text-decoration: underline;
            }

            .error {
                color: red;
                font-size: 12px;
                margin-bottom: 5px;
                text-align: left;
            }

            .status-message {
                background-color: #d4edda;
                color: #155724;
                padding: 10px;
                margin-bottom: 10px;
                border-radius: 5px;
                font-size: 14px;
            }
        </style>
    </head>
    <body>
        <div class="login-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo STIMATA" class="logo">
            <h2>SARANA DAN PRASARANA</h2>
            <p>STMIKI PPKIA PRANDNYA PARAMITA <br> MALANG</p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="status-message">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror

                <input id="password" type="password" name="password" placeholder="Password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember" id="remember">
                        Remember me
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">
                            Forgot your password?
                        </a>
                    @endif
                </div>

                <button type="submit" class="login-btn">Login</button>
            </form>

            <p class="register-text">
                Belum Punya Akun? <a href="{{ route('register') }}">Daftar</a>
            </p>
        </div>
    </body>
    </html>
</x-guest-layout>
