<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5" style="width:400px;">

<h2 class="text-center">Login</h2>

@if(session('error'))

<div class="alert alert-danger">
{{ session('error') }}
</div>

@endif

<form action="/login" method="POST">

@csrf

<input
type="email"
name="email"
class="form-control mb-3"
placeholder="Email"
required>

<input
type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>

<button class="btn btn-success w-100">
Login
</button>

</form>

<a href="/register">Create Account</a>

</div>

</body>
</html>