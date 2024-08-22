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
            <div class="logo">
                <a href="/home"><img href="/home" src="/logo/logo.png" alt=""></a>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="/profil" class="akun"> <?= session()->get('user')['nama']; ?> <img style="border-radius:100%; width:30px; height:30px; object-fit:fill;" src="/userImg/<?= session()->get('user')['foto']; ?>" alt=""></a></li>

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
                    <?php $i = 1; ?>
                    <?php foreach ($dataMelamar as $dm) : ?>
                        <button type="button" class="pekerjaan" data-bs-toggle="modal" data-bs-target="#modalPekerjaanSaya<?= $i; ?>">
                            <img src="/imgJob/<?= $dm['fotoPekerjaan']; ?>" alt="">
                            <h5><?= $dm['namaPekerjaan']; ?></h5>
                            <p><?= $dm['alamat']; ?></p>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modalPekerjaanSaya<?= $i++; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?= $dm['namaPekerjaan']; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <img style="max-width: 100%;" src="/imgJob/<?= $dm['fotoPekerjaan']; ?>" alt=""><br>
                                        </div>
                                        <h2>Deskripsi Pekerjaan</h2>
                                        <p style="text-align: left;"><i class="bi bi-card-text me-2"></i> <?= $dm['deskripsiPekerjaan']; ?></p>
                                        <p style="text-align: left;"><i class="bi bi-geo-alt-fill me-2"></i> <?= $dm['alamat']; ?></p>
                                        <p style="text-align: left;"><i class="bi bi-hourglass-split me-2"></i> <?= $dm['waktuPekerjaan']; ?></p>
                                        <p style="text-align: left;">Status :
                                            <?php if ($dm['status'] == 'kirim') : ?>
                                                <span><i class="bi bi-send-check"></i> <?= $dm['status']; ?></span>
                                            <?php endif; ?>

                                            <?php if ($dm['status'] == 'Diterima') : ?>
                                                <span class="text-success"><i class="bi bi-check2"> </i><?= $dm['status']; ?></span>
                                            <?php endif; ?>

                                            <?php if ($dm['status'] == 'Ditolak') : ?>
                                                <span class="text-danger"><i class="bi bi-x-lg"> </i><?= $dm['status']; ?></span>
                                            <?php endif; ?>

                                            <?php if ($dm['status'] == 'Selesai') : ?>
                                                <span class="text-primary"><i class="bi bi-check2-all"> </i><?= $dm['status']; ?></span>
                                            <?php endif; ?>
                                        <p>
                                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                                            <style>
                                                .checked {
                                                    color: orange;
                                                }
                                            </style>

                                        <p style="text-align: left;">Penilaian :
                                            <?php if ($dm['penilaian'] != '-') : ?>
                                                <?= $dm['penilaian']; ?>
                                            <?php else : ?>
                                                -
                                            <?php endif; ?>
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="window.location.href = 'mailto:<?= $dm['email']; ?>?subject=Lamaran Pekerjaan&body=Halo, bapak/ibu <?= $dm['nama'] ?>.'" class="btn btn-success">Hubungi Pembuat Kerja</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>





            <div class="col-6 d-flex align-items-center">
                <div class="daftarPekerjaan">
                    <div class="row my-1">
                        <h5 style="color: #FFFFFF;">Postingan Saya</h5>
                    </div>
                    <?php $i = 1; ?>
                    <?php foreach ($dataPostingan as $ds) : ?>
                        <button type="button" class="pekerjaan" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $i ?>">
                            <img src="/imgJob/<?= $ds['foto']; ?>" alt="">
                            <h5><?= $ds['namaPekerjaan']; ?></h5>
                            <p><?= $ds['alamat']; ?></p>

                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?= $i++ ?>" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?= $ds['namaPekerjaan']; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <img class="mx-auto" style="max-width: 100%;" src="/imgJob/<?= $ds['foto']; ?>" alt=""><br>
                                        </div>
                                        <h2>Deskripsi Pekerjaan</h2>
                                        <p style="text-align: left;"><i class="bi bi-card-text me-2"></i> <?= $ds['deskripsiPekerjaan']; ?></p>
                                        <p style="text-align: left;"><i class="bi bi-geo-alt-fill me-2"></i> <?= $ds['alamat']; ?></p>
                                        <p style="text-align: left;"><i class="bi bi-hourglass-split me-2"></i> <?= $ds['waktuPekerjaan']; ?></p>

                                        <!-- Jika pekerjaan belum didapat pekerjanya -->
                                        <?php if ($ds['statusPosting'] == 'Belum ada pekerja') : ?>
                                            <p style="text-align: left;"><i class="bi bi-x-lg me-2"></i> <span class="text-danger"><?= $ds['statusPosting']; ?></span></p>
                                        <?php endif; ?>

                                        <!-- Jika pekerja sudah dapat -->
                                        <?php if ($ds['statusPosting'] == 'Sudah ada pekerja') : ?>
                                            <p style="text-align: left;"><i class="bi bi-check-all me-2"></i> <span class="text-success"><?= $ds['statusPosting']; ?></span></p>
                                            <?php foreach ($pelamarDiterima as $pd) : ?>
                                                <?php if ($ds['kodePekerjaan'] == $pd['kodePekerjaan']) : ?>
                                                    <p style="text-align: left;"><i class="bi bi-person me-2"></i> <span><?= $pd['nama']; ?> | <a style="text-decoration: none;" href="/penilaian/<?= $ds['kodePekerjaan']; ?>">Beri Penilaian</a></span> </p>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                        <!-- Jika pekerjaan selesai, penilaian sudah diberikan -->
                                        <?php if ($ds['statusPosting'] == 'Selesai') : ?>
                                            <p style="text-align: left;"><i class="bi bi-check-all me-2"></i> <span class="text-success"><?= $ds['statusPosting']; ?></span></p>
                                            <?php foreach ($pelamarSelesai as $ps) : ?>
                                                <?php if ($ds['kodePekerjaan'] == $ps['kodePekerjaan']) : ?>
                                                    <p style="text-align: left;"><i class="bi bi-person me-2"></i> <span><?= $ps['nama']; ?> | <?= $ps['nilai']; ?></span> </p>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                        <div class="row">
                                            <div class="col">
                                                <button onclick="window.location.href = '/hapus/<?= $ds['kodePekerjaan']; ?>';" class="btn btn-outline-danger">Hapus</button>
                                            </div>
                                            <div class="col">
                                                <button onclick="window.location.href= '/edit/<?= $ds['kodePekerjaan']; ?>';" class="btn btn-outline-warning">Ubah</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="window.location.href = '/listpelamar/<?= $ds['kodePekerjaan']; ?>';" class="btn btn-primary">Lihat Daftar Pelamar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


        </div>

    </div>
</body>

</html>