<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Labours</title>
    <link rel="stylesheet" href="css/styleAdmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    </style>
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo">
                <a href="/admin"><img style="float:left; width: 170px; margin-top:14px;" href="/home" src="/logo/logo.png" alt="">

            </div>
            <div class="menu">
                <ul>
                    <a href="/logout"><button type="button" class="btn btn-danger">Logout</button></a>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <center>
        <h2> Selamat Datang, <?= session()->get('admin')['username']; ?></h2>
    </center>
    <br>
    <center><a href="verifikasi"><button type="button" class="btn btn-success">Verifikasi Data</button></a> </center>



    </div>
    </div>
    </div>

</body>

</html>