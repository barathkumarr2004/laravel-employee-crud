<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Register</title>

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

        .register-box{
            width:400px;
            background:#ffffff;
            padding:35px;
            border-radius:15px;
            box-shadow:0 15px 35px rgba(0,0,0,.3);
        }

        .register-box h2{
            text-align:center;
            color:#0d6efd;
            margin-bottom:30px;
            font-weight:bold;
        }

        .form-control{
            height:48px;
            border-radius:8px;
        }

        .btn-register{
            width:100%;
            height:48px;
            border:none;
            border-radius:8px;
            background:#198754;
            color:white;
            font-size:18px;
            transition:.3s;
        }

        .btn-register:hover{
            background:#157347;
        }

        .login-link{
            text-align:center;
            margin-top:18px;
        }

        .login-link a{
            text-decoration:none;
            font-weight:bold;
        }

    </style>

</head>

<body>

<div class="register-box">

    <h2>Create Account</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="/register" method="POST">

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

        <button class="btn-register">
            Register
        </button>

    </form>

    <div class="login-link">
        Already have an account?
        <a href="/login">Login</a>
    </div>

</div>

</body>
</html>