<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5" style="width:400px;">

<h2 class="text-center">Register</h2>

<form action="/register" method="POST">

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

<button class="btn btn-primary w-100">
Register
</button>

</form>

<a href="/login">Already have account? Login</a>

</div>

</body>
</html>