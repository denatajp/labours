<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Home User | Labours</title>
    <style>
        .daftarPekerjaan {
            width: 100%;
            height: 30em;
            background-color: #0091A5;
            border-radius: 5px;
            padding: 3%;
            overflow: auto;
        }

        ::-webkit-scrollbar {
            width: 10px;
            /* Lebar scrollbar */
        }

        /* Track */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            /* Warna latar belakang track */
        }

        /* Thumb */
        ::-webkit-scrollbar-thumb {
            background: #888;
            /* Warna thumb */
        }

        /* Mouse-over effects */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
            /* Warna thumb saat dihover */
        }


        .deskripsiPekerjaan {
            width: 100%;
            height: 30em;
            background-color: #eee3ff;
            border-radius: 5px;
            padding: 1em;
            overflow: auto;
        }

        .pekerjaan {
            /* display: flex; */
            margin: 5px auto;
            margin-bottom: 10px;
            background-color: #ffffff;
            color: black;
            font-size: medium;
            overflow: hidden;
            border-radius: 5px;
            /* width: 30em; */
            height: 80px;
        }

        .pekerjaan>img {
            margin-right: 5px;
            float: left;
            /* object-fit: fill; */
            align-items: center;
            max-height: 100%;
            border-radius: 5px;

        }

        .pekerjaan:hover {
            background-color: #e6e6e6;
        }

        .test:hover {
            background-color: #000000;
        }

        .btn-primary {
            background-color: #0091A5;
        }

        .btn-primary:hover {
            background-color: #555;
        }

        .search-container {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-container input[type="search"] {
            border-radius: 2rem;
            padding: 6px 12px;
            margin-right: 10em;
            width: 250px;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo">
                <a href="/home"><img href="/home" src="/logo/logo.png" alt=""></a>
            </div>

            <!-- <div class="menu">
                <ul>
                    <li><a href="/profil" class="akun"> <\?= session()->get('user')['nama']; ?> <img style="border-radius:100%; width:30px; height:30px; object-fit:fill;" src="/userImg/<\?= session()->get('user')['foto']; ?>" alt=""></a></li>

                </ul>
            </div> -->
            <div class="menu d-flex align-items-center">
                <div class="search-container">
                    <form action="/search" method="get" class="me-5" class="form-control inline">
                        <div class="input-group">
                            <input class="form-control" name="keyword" type="search" placeholder="Cari pekerjaan" aria-label="Search">
                            <!-- <button class="btn btn-light form-control">Cari</button> -->
                        </div>
                    </form>
                </div>
                <ul>
                    <li><a href="/profil" class="akun"> <?= session()->get('user')['nama']; ?> <img style="border-radius:100%; width:30px; height:30px; object-fit:fill;" src="/userImg/<?= session()->get('user')['foto']; ?>" alt=""></a></li>
                </ul>
            </div>

        </div>
    </nav>

    <!-- <nav class="navbar" style="background-color: #0091A5; height:80px; display:flex; align-items:center;">
        <div class="container">
            <a class="navbar-brand" href="/home">
                <img href="/home" src="/logo/logo.png" alt="" width="150">
            </a>

            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Cari</button>
            </form>
        </div>
    </nav> -->

    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-6 d-flex align-items-center">
                <h5 class="ms-3">Pilih pekerjaan anda</h5>
            </div>

            <div class="col-6 d-flex align-items-center">
                <button class="btn btn-primary me-3" onclick="window.location.href = '/postingansaya';" style="background-color: #0091A5; text-align: left;"><i class="bi bi-list-task"></i> Postingan Saya</button>
                <button class="btn btn-primary me-8" onclick="window.location.href = '/tambahpekerjaan';" style="background-color: #0091A5; text-align: left;"><i class="bi bi-plus-lg"></i> Tambah Pekerjaan</button>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-4 d-flex align-items-center">
                <div class="daftarPekerjaan">
                    <?php foreach ($pekerjaan as $p) : ?>
                        <button class="pekerjaan" onclick="window.location.href = '/deskripsi/<?= $p['kodePekerjaan']; ?>';">
                            <img style="max-height: 100%;" src="/imgJob/<?= $p['foto']; ?>" alt="">
                            <h5><?= $p['namaPekerjaan']; ?></h5>
                            <p>Yogyakarta</p>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-8 d-flex align-items-center">
                <div class="deskripsiPekerjaan">
                    <?php if (session()->getFlashdata('deskripsi')) : ?>
                        <div class="text-center">
                            <h4 class="mx-auto"><?= $deskripsi['namaPekerjaan']; ?></h4>
                            <img class="mx-auto" style="height: 500px;" src="/imgJob/<?= $deskripsi['foto']; ?>" alt="">
                        </div>

                        <hr>

                        <h4><i class="bi bi-card-text me-2"> </i><?= $deskripsi['deskripsiPekerjaan']; ?></h4>
                        <br>
                        <h4><i class="bi bi-geo-alt-fill me-2"></i> <?= $deskripsi['alamat']; ?></h4>
                        <br>
                        <h4><i class="bi bi-hourglass-split me-2"></i> <?= $deskripsi['waktuPekerjaan']; ?> Jam</h4>
                        <br>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                            <div class="col-3">
                                <button class="btn text-light shadow-lg" style="background: #0091A5;" onclick="window.location.href = '/lamar/<?= $deskripsi['kodePekerjaan']; ?>'"><i class="bi bi-send-fill"></i> Lamar</button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>


        </div>

    </div>
</body>

</html>