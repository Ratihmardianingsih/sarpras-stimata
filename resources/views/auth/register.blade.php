<x-guest-layout>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Daftar - Sarana dan Prasarana</title>
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

            .register-container {
                background-color: #FEE9A8;
                padding: 40px 30px;
                border-radius: 12px;
                box-shadow: 0 8px 16px rgba(0,0,0,0.15);
                width: 400px;
                text-align: center;
            }

            h2 {
                margin-bottom: 20px;
                font-size: 20px;
                font-weight: bold;
            }

            form {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }

            label {
                text-align: left;
                font-size: 14px;
                margin-bottom: 4px;
                color: #333;
            }

            input[type="text"],
            input[type="email"],
            input[type="password"] {
                padding: 10px;
                border: none;
                border-radius: 6px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
                width: 100%;
            }

            .register-btn {
                margin-top: 10px;
                padding: 12px;
                background-color: #007bff;
                color: white;
                border: none;
                border-radius: 6px;
                font-weight: 600;
                cursor: pointer;
            }

            .register-btn:hover {
                background-color: #0066cc;
            }

            .login-text {
                margin-top: 15px;
                font-size: 14px;
            }

            .login-text a {
                color: #007bff;
                text-decoration: none;
                font-weight: 500;
            }

            .login-text a:hover {
                text-decoration: underline;
            }

            .error {
                color: red;
                font-size: 12px;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <div class="register-container">
            <h2>DAFTAR</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Nama" required autofocus>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <input id="password" type="password" name="password" placeholder="Password" required>
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder="Ulangi Password" required>
                    @error('password_confirmation')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="register-btn">Registrasi</button>
            </form>

            <p class="login-text">Sudah Punya Akun? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </body>
    </html>
</x-guest-layout>
