<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="/css/styleTambahPekerjaan.css" rel="stylesheet" type="text/css">
    <title><?= $title; ?></title>
</head>
<style>
    p {
        color: black;
    }
</style>

<body>
    <script>
        function previewImg() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto.files[0]);

            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
    <nav>
        <div class="wrapper">
            <div class="logo">
                <a href="/home"><img style="float:left; width: 170px; margin-top:14px;" href="/home" src="/logo/logo.png" alt="">

            </div>
            <div class="menu">
                <ul>
                    <li><a href="/profil" class="akun"> <?= session()->get('username'); ?> <img style="border-radius:100%; width:30px; height:30px; object-fit:fill;" src="/userImg/<?= session()->get('user')['foto']; ?>" alt=""></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- <div class="container mt-3">
        <div class="mt-4 p-5 jumbotron text-white rounded" style="background-color: #0091A5;">
            <h1>Edit Pekerjaan</h1>
            <form class="form-horizontal" action="/edit/<?= $pekerjaan['kodePekerjaan']; ?>" method="post" enctype="multipart/form-data">
                <div class="mt-4 p-5 jumbotron text-white rounded" style="background-color: white;">
                        <div class="row ">
                            <div class="col">
                                <p> <label for="pesan">Nama Pekerjaan </label> <br>
                                    <input type="text" class="form-control" name="nama" value="<?= $pekerjaan['namaPekerjaan']; ?>">
                            </div>
                            <div class="col">
                                <p> <label for="pesan">Alamat </label> <br>
                                    <input type="text" class="form-control" value="<?= $pekerjaan['alamat']; ?>" name="alamat">
                            </div>
                            <div class="row">
                                <div class="col ">
                                    <div class="col">
                                        <p> <label for="deskripsi">Deskripsi Pekerjaan </label> <br>
                                            <textarea class="form-control" name="deskripsi" id="deskripsi" cols="30" rows="10"><?= $pekerjaan['deskripsiPekerjaan']; ?></textarea>
                                        </div>
                                    <div class="row">
                                        <div class="col">
                                            <p> <label for="pesan">Waktu Pekerjaan </label> <br>
                                                <input type="text" class="form-control" value="<?= $pekerjaan['waktuPekerjaan']; ?>" name="waktu">
                                        </div>
                                        <div class="col">
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input type="file" accept="image/*" id="foto" name="foto">
                                        </div>
                                        <div class="col">
                                            <input type="submit" value="Posting">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </form>
        </div>
    </div> -->
    <div class="container mt-3">
        <button onclick="window.location.href = '/home';" class="btn-close btn-close-white me-3 mt-3" style="float: right;" aria-label="close"></button>
        <div class="mt-4 p-5 jumbotron text-white rounded" style="background-color: #0091A5;">
            <h1>Edit Pekerjaan</h1>
            <form class="form-horizontal" action="/edit/<?= $pekerjaan['kodePekerjaan']; ?>" method="post" enctype="multipart/form-data">
                <div class="mt-4 p-5 jumbotron text-white rounded" style="background-color: white;">
                    <div class="row g-2">
                        <div class="col">
                            <p> <label for="pesan">Nama Pekerjaan </label> <br>
                                <input type="text" class="form-control" placeholder="Masukan Nama Pekerjaan" name="nama" value="<?= $pekerjaan['namaPekerjaan']; ?>">
                        </div>
                        <div class="col">
                            <p> <label for="pesan">Alamat </label> <br>
                                <input type="text" class="form-control" placeholder="Masukan Alamat" name="alamat" value="<?= $pekerjaan['alamat']; ?>">
                        </div>
                        <div class="row g-2">
                            <div class="col">
                                <p> <label for="waktu">Waktu Pekerjaan </label> <br>
                                    <input type="text" class="form-control" placeholder="Masukan Durasi Waktu Pekerjaan" name="waktu" value="<?= $pekerjaan['waktuPekerjaan']; ?>">
                            </div>
                            <div class="col">
                                <p> <label for="deskripsi">Deskripsi Pekerjaan </label> <br>
                                    <textarea class="form-control" cols="30" rows="4" placeholder="Masukan Deskripsi Pekerjaan" name="deskripsi"><?= $pekerjaan['deskripsiPekerjaan']; ?> </textarea>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <img src="/imgJob/<?= $pekerjaan['foto']; ?>" class="img-thumbnail img-preview" height="400" width="400">
                                </div>
                                <div class="col">
                                    <br>
                                    <br>
                                    <input class="btn" type="file" accept="image/*" id="foto" name="foto" value="Unggah Foto" onchange="previewImg()">
                                </div>
                                <div class="col">
                                </div>
                                <div class="col">
                                </div>
                                <div class="col">
                                </div>
                                <div class="col">
                                </div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"></div>
                                <div class="col"><input class="btn" style="background: #0091A5; color:white" type="submit" value="Posting"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>