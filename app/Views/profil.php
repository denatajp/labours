<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Data Diri</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="/css/styleProfil.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        p {
            color: black;
        }

        #card {
            margin-top: 15px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
    </style>
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
    <!-- <div class="mt-3 p-4 jumbotron text-white rounded" style="background-color: #0091A5;">
<h1>Labours.</h1>
</div> -->
    <div class="container">
        <div class="col-md-6 offset-md-3">
            <div class="card" id="card">
                <div class="card-header text-center">
                    <div class="my-4 p-4 jumbotron text-white shadow-lg" style="background-color: #0091A5;">
                        <h2>Profil Data Diri</h2>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="/userImg/<?= $user['foto']; ?>" alt="Profile Picture" style="width:300px;height:220px;"><br><br>
                        </div>
                        <h4 class="card-title text-center"><?= $user['nama']; ?></h4>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">

                                <p><strong>Umur:</strong> <?= $user['umur']; ?></p>
                            </div>
                            <div class="col-sm-12">
                                <p><strong>Email:</strong> <?= $user['email']; ?></p>
                                <p><strong>Telepon:</strong> <?= $user['nomor_telepon']; ?></p>
                                <hr>
                                <div class="text-center">
                                    <a href="/logout" class="btn" style="background: #0091A5; color:white">Log Out</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>