<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/resto.png') }}">
    <title>Resto</title>
    <script src="https://kit.fontawesome.com/5f52f05008.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            background-image: url("{{ asset('img/background.jpeg') }}");
            background-size: cover;
        }

        a {
            text-decoration: none;
        }

        .content {
            margin-top: 10%;
        }

        .link:hover,
        .fa:hover {
            cursor: pointer;
            color: burlywood;
            transition: all .2s ease-in-out;
            transform: scale(1.5);
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link active  text-light" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Pricing</a>
                    </li>
                </ul>
            </div> --}}


        </div>
    </nav>

    <section id="banner">
        <!-- Content Wrapper. Contains page content -->
        <div class="content">
            <!-- Main content -->
            <div class="container">
                <div class="row">
                    <div class="col-md-6">

                        <h1 class="text-light  text-justify mb-5">{{ __('Selamat datang di situs web kami!') }}
                        </h1>
                        <p class="text-light text-justify">{{ __('Jelajahi kelezatan yang memukau dari hidangan dan
                            minuman
                            favorit kami di sini. Dari hidangan
                            lezat hingga minuman yang
                            menyegarkan, kami menghadirkan pengalaman kuliner penuh cita rasa untuk memanjakan lidah
                            Anda.')}}</p>
                        <p class="text-light text-justify"> {{ __('Jangan lewatkan kesempatan untuk menjelajahi menu
                            istimewa
                            kami yang pasti akan memikat
                            selera Anda. Temukan sensasi
                            kuliner yang tak terlupakan di sini!')}}</p>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid " src="{{ asset('img/menu-makanan.png') }}" alt="" width=100% height=100%>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col ">
                        <h1 class="text-center link text-light"><a href="{{ route('client.index') }}"
                                class="text-light">{{ __('Lihat menu')
                                }} <i class="fa-solid fa-angles-right"></i></a>
                        </h1>

                    </div>
                </div>
                <div class="row">
                    <div class="col text-center">
                        <i class="fa fa-instagram text-light m-3"></i>
                        <i class="fa fa-facebook text-light m-3"></i>
                        <i class="fa fa-phone text-light m-3"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>