<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style copy.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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

        .nilai {
            display: flex !important;
            justify-content: flex-end !important;
            align-items: flex-end !important;
        }

        .rating {
            display: inline-block;
        }

        .rating input {
            display: none;
        }

        .rating label {
            float: right;
            cursor: pointer;
            width: 40px;
            height: 40px;
            background-image: url('https://pngimg.com/uploads/red_star/red_star_PNG14.png');
            /* Ganti dengan path ke gambar bintang */
            background-size: cover;
        }

        .rating input:checked~label {
            background-image: url('https://www.pngkit.com/png/full/1-15402_red-star-png-red-star.png');
            /* Ganti dengan path ke gambar bintang terisi */
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

    <div class="container">

        <div class="row my-4">
            <h3>Penilaian Pekerja</h3>
        </div>

        <!-- Button 1 -->
        <div class="row my-4 bg-light rounded">
            <div class="col-2 p-3">
                <img style="max-width: 100%;" src="https://asset.kompas.com/crops/o1LWGsxHzhwi7y8weX75ORdUcuk=/0x0:938x625/750x500/data/photo/2022/01/17/61e51ddd38e41.jpg" alt="">
            </div>
            <div class="col-8 p-3">
                <div class="row">
                    <h3>Mengecat Rumah</h3>

                </div>
                <div class="row">
                    <p class="nama">Andri</p>
                </div>
                <form class="uhuyyTest" action="sc.php" method="get">
                    <div class="col-8">
                        <div class="row">
                            <div class="rating">
                                <input type="radio" id="star5" name="rating" value="5">
                                <label for="star5"></label>
                                <input type="radio" id="star4" name="rating" value="4">
                                <label for="star4"></label>
                                <input type="radio" id="star3" name="rating" value="3">
                                <label for="star3"></label>
                                <input type="radio" id="star2" name="rating" value="2">
                                <label for="star2"></label>
                                <input type="radio" id="star1" name="rating" value="1">
                                <label for="star1"></label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-2 p-3">
                <div class="nilai"><button class="btn btn-primary">Nilai</button></div>
                </form>
            </div>
        </div>
        <!-- End button 1 -->

        <!-- Button 1 -->
        <div class="row my-4 bg-light rounded">
            <div class="col-2 p-3">
                <img style="max-width: 100%;" src="https://asset.kompas.com/crops/o1LWGsxHzhwi7y8weX75ORdUcuk=/0x0:938x625/750x500/data/photo/2022/01/17/61e51ddd38e41.jpg" alt="">
            </div>
            <div class="col-8 p-3">
                <div class="row">
                    <h3>Mengecat Rumah</h3>

                </div>
                <div class="row">
                    <p class="nama">Andri</p>
                </div>
                <form class="uhuyyTest" action="sc.php" method="get">
                    <div class="col-8">
                        <div class="row">
                            <div class="rating">
                                <input type="radio" id="star5" name="rating" value="5">
                                <label for="star5"></label>
                                <input type="radio" id="star4" name="rating" value="4">
                                <label for="star4"></label>
                                <input type="radio" id="star3" name="rating" value="3">
                                <label for="star3"></label>
                                <input type="radio" id="star2" name="rating" value="2">
                                <label for="star2"></label>
                                <input type="radio" id="star1" name="rating" value="1">
                                <label for="star1"></label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-2 p-3">
                <div class="nilai"><button class="btn btn-primary">Nilai</button></div>
                </form>
            </div>
        </div>
        <!-- End button 1 -->

    </div>

</body>

</html>