<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: black;
            margin: 0;
            padding: 0;
            transition: background 0.3s, color 0.3s;
        }

        .dark-mode {
            background-color: #1e3a8a;
            color: white;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: #007bff;
            color: white;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
        }

        #toggle-bg {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: white;
        }

        .register-container {
            width: 400px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            transition: background 0.3s, color 0.3s;
        }

        .dark-mode .register-container {
            background: #1e40af;
            color: white;
        }

        .form-group {
            margin-bottom: 15px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            text-align: left;
        }

        .form-group input {
            width: 100%;
            padding: 10px 35px 10px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .dark-mode .form-group input {
            background: #3b82f6;
            color: white;
            border: 1px solid #60a5fa;
        }

        .toggle-password {
            position: absolute;
            right: 10px;
            top: 37px;
            cursor: pointer;
            color: #666;
        }

        .dark-mode .toggle-password {
            color: #ccc;
        }

        .register-btn {
            width: 100%;
            background: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .register-btn:hover {
            background: #0056b3;
        }

        .login-link {
            display: block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
            text-align: center;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .dark-mode .login-link {
            color: #93c5fd;
        }

        footer {
            text-align: center;
            padding: 10px;
            background: #007bff;
            color: white;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <a href="{{ url('/') }}">Home</a> |
            <a href="{{ route('login') }}">Đăng nhập</a> |
            <a href="{{ route('register') }}">Đăng ký</a>
        </nav>
        <button id="toggle-bg">🌙</button>
    </header>

    <main>
        <div class="register-container">
            <h2>Màn hình đăng ký</h2>

            @if ($errors->any())
                <div style="color: red; margin-bottom: 10px;">
                    <ul style="padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" name="password" id="password" required>
                    <span class="toggle-password" onclick="togglePassword('password', this)">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Nhập lại mật khẩu</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required>
                    <span class="toggle-password" onclick="togglePassword('password_confirmation', this)">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                </div>

                <a href="{{ route('login') }}" class="login-link">Đã có tài khoản?</a>
                <button type="submit" class="register-btn">Đăng ký</button>
            </form>
        </div>
    </main>

    <footer>
        <p>© 2025 Lập trình web</p>
    </footer>

    <script>
        document.getElementById('toggle-bg').addEventListener('click', function () {
            document.body.classList.toggle('dark-mode');
            this.textContent = document.body.classList.contains('dark-mode') ? '☀️' : '🌙';
        });

        function togglePassword(fieldId, iconEl) {
            const field = document.getElementById(fieldId);
            const icon = iconEl.querySelector('i');

            if (field.type === "password") {
                field.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>
