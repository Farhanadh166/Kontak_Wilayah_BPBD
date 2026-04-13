<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    <div class="col-md-4 mx-auto">
        <h3 class="mb-3">Login</h3>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="/login">
            @csrf
            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <button class="btn btn-primary w-100">Login</button>
        </form>

        <p class="mt-3">Belum punya akun? <a href="/register">Register</a></p>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    let redirectUrl = sessionStorage.getItem('redirect_after_login');

    if (redirectUrl) {
        let input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'redirect_to';
        input.value = redirectUrl;

        document.querySelector('form').appendChild(input);
    }
});
</script>
</body>
</html>