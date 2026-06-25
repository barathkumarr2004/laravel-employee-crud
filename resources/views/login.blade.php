<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            margin:0;
            padding:0;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
            font-family:Arial, Helvetica, sans-serif;
        }

        .login-box{
            width:400px;
            background:#fff;
            padding:35px;
            border-radius:15px;
            box-shadow:0 15px 35px rgba(0,0,0,.3);
        }

        .login-box h2{
            text-align:center;
            margin-bottom:30px;
            font-weight:bold;
            color:#0d6efd;
        }

        .form-control{
            height:48px;
            border-radius:8px;
        }

        .btn-login{
            width:100%;
            height:48px;
            border:none;
            border-radius:8px;
            background:#0d6efd;
            color:white;
            font-size:18px;
            transition:.3s;
        }

        .btn-login:hover{
            background:#0b5ed7;
        }

        .register-link{
            text-align:center;
            margin-top:18px;
        }

        .register-link a{
            text-decoration:none;
            font-weight:bold;
        }

    </style>

</head>

<body>

<div class="login-box">

    <h2>Employee Login</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="/login" method="POST">

        @csrf

        <div class="mb-3">
            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Enter Email"
                required>
        </div>

        <div class="mb-3">
            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Enter Password"
                required>
        </div>

        <button class="btn-login">
            Login
        </button>

    </form>

    <div class="register-link">
        Don't have an account?
        <a href="/register">Register</a>
    </div>

</div>

</body>
</html>