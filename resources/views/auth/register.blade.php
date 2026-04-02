<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    <div class="col-md-4 mx-auto">
        <h3 class="mb-3">Register</h3>

        <form method="POST" action="/register">
            @csrf
            <input type="text" name="name" class="form-control mb-2" placeholder="Nama" required>
            <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <button class="btn btn-success w-100">Register</button>
        </form>

        <p class="mt-3">Sudah punya akun? <a href="/login">Login</a></p>
    </div>
</div>

</body>
</html>