<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/styleAdmin.css">
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
    <div class="container mt-3">
        <div class="shadow-lg p-3 mb-5 bg-body rounded">
            <h2>Verifikasi Data Diri Pengguna</h2>
            <!--Ini yang di looping nanti-->
            <div class="row">
                <?php foreach ($user as $u) : ?>
                    <div class="grid text-center">
                        <div class="g-col-6 shadow-lg p-3 mb-4 bg-body rounded">
                            <div class="row">
                                <div class="col">
                                    <img src="/userImg/<?= $u['foto']; ?>" class="rounded float-end" alt="foto profil" width="400" height="400">
                                </div>
                                <div class="col align-self-center">
                                    <h4> Data Diri Pengguna</h4>
                                    <?= $u['nama']; ?>
                                    <br>
                                    <?= $u['umur']; ?>
                                    <br>
                                    <?= $u['email']; ?>
                                    <br>
                                    <?= $u['nomor_telepon']; ?>
                                </div>
                                <div class="col align-self-center">
                                    <!-- <div class="col"> -->
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <form action="/verif" method="post">
                                            <button class="btn btn-success btn-lg form-control" type="submit" value="<?= $u['nama']; ?>" name="btnVerif" id="btnVerif">Verifikasi</button>
                                        </form>
                                        <!-- </div> -->
                                        <br>
                                        <!-- <div class="col"> -->
                                        <form action="/tolak" method="post">
                                            <button class="btn btn-danger btn-lg form-control" type="submit" value="<?= $u['nama']; ?>" name="btnTolak" id="btnTolak">Tolak</button>
                                        </form>
                                    </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
</body>

</html>