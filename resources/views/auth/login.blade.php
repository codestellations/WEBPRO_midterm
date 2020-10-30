@section('Login', 'active')

@section('content')

    <style>
        body {
        height: 100%;
        }

        body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        }

        .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
        }
    </style>

    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>

<body class="text-center">
    <form action={{route('postLogin')}} class="form-signin" method="post">
        {{ csrf_field() }}
        <h1 class="h3 mb-3 font-weight-normal">Da Venti Admin Login</h1>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1" required>E-mail</span>
            </div>
            <input type="email" class="form-control" name="email" placeholder="example@email.com" required>
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Password</span>
            </div>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        
        <p class="mt-4 mb-3 text-muted">Don't have an account?</p>

        <button type="button" class="btn btn-outline-primary" onclick="document.location.href='/register';">Register</button>
    </form>
</body>
    