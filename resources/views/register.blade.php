@if(isset($errors))
    <pre>{{$errors}}</pre>
@endif

<form action="{{ route('view-register') }}" method="post">
    @csrf

    <label for="name">Họ tên:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Mật khẩu:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Đăng ký</button>
</form>