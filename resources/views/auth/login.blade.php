<!-- đặt trong đường dẫn laravel resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script>
        function toggleDarkMode() {
            document.body.classList.toggle("dark-mode");
            document.getElementById("theme-icon").textContent = document.body.classList.contains("dark-mode") ? "☀️" : "🌙";
        }
    </script>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f8f9fa; color: black; transition: background 0.3s, color 0.3s; }
        .dark-mode { background-color: #1e3a8a; color: white; }
        header { display: flex; justify-content: space-between; align-items: center; padding: 15px; height: 56px; background: #007bff; color: white; }
        nav a { color: white; text-decoration: none; margin: 0 10px; }
        #theme-icon { cursor: pointer; font-size: 24px; }
        .content { padding: 30px; text-align: center; }
        .login-box { max-width: 400px; margin: auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 0px 0px 10px gray; transition: background 0.3s; }
        .dark-mode .login-box { background: #1e40af; }
        footer { text-align: center; padding: 10px; background: #007bff; color: white; margin-top: 20px; }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="{{ url('/') }}">Home</a> |
            <a href="{{ route('login') }}">Đăng nhập</a> |
            <a href="{{ url('/register') }}">Đăng ký</a>
        </nav>
        <span id="theme-icon" onclick="toggleDarkMode()">🌙</span>
    </header>

    <section class="content">
        <div class="login-box">
            <h3 class="mb-4">Màn hình đăng nhập</h3>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3 text-start">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                    value="{{ old('email') }}" required autofocus>
                </div>
                <div class="mb-3 text-start">
                    <label class="form-label">Mật khẩu</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div class="mb-3 form-switch text-start">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">Ghi nhớ đăng nhập</label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                </div>
            </form>

            <a href="{{ route('password.request') }}" class="d-block mt-3">Quên mật khẩu?</a>
            </div>
    </section>

    <footer>
        <p>© 2025</p>
    </footer>
</body>
</html>
