<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
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
    </style>
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''>L</a></div>
            <div class="menu">
                <ul>
                    <!-- <li><a href="signUp.html" class="btn-sgnUp">Daftar</a></li> -->
                    <li><a href="/logout" class="akun"> <?= session()->get('username'); ?> <i class="bi bi-person-circle text-light"></i></a></li>

                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-6 d-flex align-items-center">
                <h5 class="ms-3">Pilih pekerjaan anda</h5>
            </div>

            <div class="col-6 d-flex align-items-center">
                <button class="btn btn-primary me-3" onclick="window.location.href = '/postingansaya';" style="background-color: #0091A5; text-align: left;"><i class="bi bi-list-task"></i> Postingan Saya</button>
                <button class="btn btn-primary me-8" onclick="window.location.href = '/tambah';" style="background-color: #0091A5; text-align: left;"><i class="bi bi-plus-lg"></i> Tambah Pekerjaan</button>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-4 d-flex align-items-center">
                <div class="daftarPekerjaan">
                    <?php foreach ($pekerjaan as $p) : ?>
                        <button class="pekerjaan" onclick="window.location.href = '/deskripsi/<?= $p['kodePekerjaan']; ?>';">
                            <img style="max-height: 100%;" src="https://asset.kompas.com/crops/o1LWGsxHzhwi7y8weX75ORdUcuk=/0x0:938x625/750x500/data/photo/2022/01/17/61e51ddd38e41.jpg" alt="">
                            <h5><?= $p['jenisPekerjaan']; ?></h5>
                            <p>Yogyakarta</p>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-8 d-flex align-items-center">
                <div class="deskripsiPekerjaan">
                    <?php if (session()->getFlashdata('deskripsi')) : ?>
                        <img style="width: 100%;" src="https://asset.kompas.com/crops/o1LWGsxHzhwi7y8weX75ORdUcuk=/0x0:938x625/750x500/data/photo/2022/01/17/61e51ddd38e41.jpg" alt="">
                        <p><?= $deskripsi['jenisPekerjaan']; ?></p>
                        <p><?= $deskripsi['deskripsiPekerjaan']; ?></p>
                        <button onclick="window.location.href = '/lamar/<?= $deskripsi['kodePekerjaan']; ?>'">Lamar</button>
                    <?php endif; ?>
                </div>
            </div>


        </div>

    </div>
</body>

</html>