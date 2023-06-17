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
    <title>Postingan | Labours</title>
    <style>
        body {
            background-color: #D9D9D9;
        }

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
            background-color: #bbbbbb;
            border-radius: 5px;
            padding: 1em;
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
    </style>
</head>

<body>
    <nav>
        <div class="wrapper">
            <div class="logo"><a href=''></a></div>
            <div class="menu">
                <ul>
                    <li><a href="signUp.html" class="btn-sgnUp">Daftar</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row my-4">
            <div class="col-6 d-flex align-items-center">

                <!-- Pekerjaan yang sedang dilakukan (user) -->
                <div class="daftarPekerjaan">
                    <div class="row my-1">
                        <h5 style="color: #FFFFFF;">Pekerjaan Saya</h5>
                    </div>
                    <?php $i=1; ?>
                    <?php foreach ($dataMelamar as $dm) : ?>
                        <button type="button" class="pekerjaan" data-bs-toggle="modal" data-bs-target="#modalPekerjaanSaya<?= $i; ?>">
                            <img src="https://asset.kompas.com/crops/o1LWGsxHzhwi7y8weX75ORdUcuk=/0x0:938x625/750x500/data/photo/2022/01/17/61e51ddd38e41.jpg" alt="">
                            <h5><?= $dm['jenisPekerjaan']; ?></h5>
                            <p>Yogyakarta</p>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalPekerjaanSaya<?= $i++; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Deskripsi Pekerjaan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <img style="max-width: 100%;" src="<?= $dm['sampul']; ?>" alt="">
                                        <h2><?= $dm['jenisPekerjaan']; ?></h2>
                                        <p style="text-align: left;">- Lokasi : Sleman</p>
                                        <p style="text-align: left;">- Durasi : <?= $dm['waktuPekerjaan']; ?></p>
                                        <p style="text-align: left;">- Fasilitas : Alat-alat disediakan</p>
                                        <h6 class="inline">Status : <h6 class="text-success"><?= $dm['status']; ?></h6></h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- <button type="button" class="pekerjaan" data-bs-toggle="modal" data-bs-target="#modalPekerjaanSaya">
                        <img src="https://asset.kompas.com/crops/o1LWGsxHzhwi7y8weX75ORdUcuk=/0x0:938x625/750x500/data/photo/2022/01/17/61e51ddd38e41.jpg" alt="">
                        <h5>Memotong Rumput</h5>
                        <p>Yogyakarta</p>
                    </button> -->

                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Daftar Pelamar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <button class="pekerjaan">
                                <img src="https://asset.kompas.com/crops/o1LWGsxHzhwi7y8weX75ORdUcuk=/0x0:938x625/750x500/data/photo/2022/01/17/61e51ddd38e41.jpg" alt="">
                                <h5>Axel Tandilangi K.</h5>
                                <p>Mahasiswa, Yogyakarta</p>
                            </button>
                            <button class="pekerjaan">
                                <img src="https://asset.kompas.com/crops/o1LWGsxHzhwi7y8weX75ORdUcuk=/0x0:938x625/750x500/data/photo/2022/01/17/61e51ddd38e41.jpg" alt="">
                                <h5>Denata</h5>
                                <p>Mahasiswa, Yogyakarta</p>
                            </button>
                            <button class="pekerjaan">
                                <img src="https://asset.kompas.com/crops/o1LWGsxHzhwi7y8weX75ORdUcuk=/0x0:938x625/750x500/data/photo/2022/01/17/61e51ddd38e41.jpg" alt="">
                                <h5>Mikhael Puntito</h5>
                                <p>Mahasiswa, Yogyakarta</p>
                            </button>
                            <button class="pekerjaan">
                                <img src="https://asset.kompas.com/crops/o1LWGsxHzhwi7y8weX75ORdUcuk=/0x0:938x625/750x500/data/photo/2022/01/17/61e51ddd38e41.jpg" alt="">
                                <h5>Jonathan</h5>
                                <p>Mahasiswa, Yogyakarta</p>
                            </button>
                            <button class="pekerjaan">
                                <img src="https://asset.kompas.com/crops/o1LWGsxHzhwi7y8weX75ORdUcuk=/0x0:938x625/750x500/data/photo/2022/01/17/61e51ddd38e41.jpg" alt="">
                                <h5>Dwiki</h5>
                                <p>Mahasiswa, Yogyakarta</p>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 d-flex align-items-center">
                <div class="daftarPekerjaan">
                    <div class="row my-1">
                        <h5 style="color: #FFFFFF;">Postingan Saya</h5>
                    </div>
                    <button type="button" class="pekerjaan" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <img src="https://asset.kompas.com/crops/o1LWGsxHzhwi7y8weX75ORdUcuk=/0x0:938x625/750x500/data/photo/2022/01/17/61e51ddd38e41.jpg" alt="">
                        <h5>Memotong Rumput</h5>
                        <p>Yogyakarta</p>
                    </button>
                </div>
            </div>


        </div>

    </div>
</body>

</html>