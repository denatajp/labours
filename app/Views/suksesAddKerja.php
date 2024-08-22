<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <link href="/css/styleLogin.css" rel="stylesheet" type="text/css">
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo">
                <a href="/home"><img style="float:left; width: 170px; margin-top:14px;" src="/logo/logo.png" alt="">
                </a>
            </div>
            <div class="menu">
                <ul>
                    <!-- <li><a href="signUp.html" class="btn-sgnUp">Daftar</a></li> -->
                    <li><a style="text-decoration: none;" href="/profil" class="akun"> <?= session()->get('username'); ?> <img style="border-radius:100%; width:30px; height:30px; object-fit:fill;" src="/userImg/<?= session()->get('user')['foto']; ?>" alt=""></a></li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="signupsuccess">
            <img src="successIcon.png" style="width: 200px;" alt="">
            <h1>Berhasil Menambahkan Pekerjaan!</h1>
            <h4>Silahkan Kembali ke Home Page</h4>
            <button onfocus="window.location.href = '/home';">Halaman Home</button>
        </div>
    </div>
</body>

</html>