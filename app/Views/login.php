<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="styleLogin.css" rel="stylesheet" type="text/css">
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>Labours.</a></div>
            <div class="menu">
                <ul>
                    <li><a href="signup" class="btn-sgnUp">Daftar</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="loginSignUp">
            <form action="/login" method="post">
                <h1>Login</h1>
                <p>Enter Your Email and Password</p>
                <hr>
                <div>
                    <label for="">Email</label>
                    <input type="text" placeholder="example@gmail.com" name="email">
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="password" placeholder="Password" name="password">
                </div>
                <button>Login</button>
            </form>
        </div>
    </div>
</body>

</html>