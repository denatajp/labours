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
                <a href="/"><img style="float:left; width: 170px; margin-top:14px;" href="/home" src="/logo/logo.png" alt="">
            </div>
            <div class="menu">
                <ul>
                    <li><a href="login" class="btn-sgnUp">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="loginSignUp">
            <form action="/signup" method="post" enctype="multipart/form-data">
                <h1>Sign Up</h1>
                <hr>
                <div>
                    <label for="">NIK</label>
                    <input type="text" name="nik">
                </div>
                <div>
                    <label for="">Nama Lengkap</label>
                    <input type="text" name="nama">
                </div>
                <div>
                    <label for="">Umur</label>
                    <input type="text" name="umur">
                </div>
                <div>
                    <label for="">Email</label>
                    <input type="text" name="email">
                </div>
                <div>
                    <label for="">Password</label>
                    <input type="password" name="password">
                </div>
                <div>
                    <label for="">Nomor Telepon</label>
                    <input type="text" name="telepon">
                </div>
                <div>
                    <label for="">Foto Profil</label>
                    <input type="file" id="foto" name="foto" onchange="preview()">
                    <img style="width: 150px; margin-left:25%; margin-top:10px;" src="" class="img-preview">
                </div>
                <button>Daftar</button>
            </form>
        </div>
    </div>
    <script>
        function preview() {
            const foto = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            const fileFoto = new FileReader();
            fileFoto.readAsDataURL(foto.files[0]);
            fileFoto.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>