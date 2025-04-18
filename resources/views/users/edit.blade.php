<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa người dùng</title>
</head>
<body>
    <h2>Chỉnh sửa người dùng</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Tên:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required><br><br>

        <button type="submit">Cập nhật</button>
    </form>

    <a href="{{ route('users.index') }}">Quay lại danh sách</a>
</body>
</html>
