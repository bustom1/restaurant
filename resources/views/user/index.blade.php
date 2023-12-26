<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" href="{{ asset('img/resto.png') }}">
    <title>{{ $title }}</title>
    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Animate.css -->
    <link href="/animate.css/animate.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome iconic font -->
    <link href="/fontawesome/css/fontawesome-all.css" rel="stylesheet" type="text/css" />
    <!-- Magnific Popup -->
    <link href="/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
    <!-- Slick carousel -->
    <link href="/slick/slick.css" rel="stylesheet" type="text/css" />
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Oswald:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <!-- Theme styles -->
    <link href="/css/dot-icons.css" rel="stylesheet" type="text/css">
    <link href="/css/theme.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/5f52f05008.js" crossorigin="anonymous"></script>
    <!--rating-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">


    {{-- Alpine JS --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="js/alpine.js"></script>

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('uploads/23.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

        h2,
        #portfolio-flters li {
            color: black;
            font-weight: bold;
        }

        .navbar a {
            float: right;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dropdown {
            float: left;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .dropdown-content {
            display: none;
            width: 150px;
            position: absolute;
            background-color: #E7F6F2;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }


        .dropdown:hover .dropdown-content {
            display: block;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .star-rating-complete {
            color: #c59b08;
        }

        .rating-container .form-control:hover,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }

        .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rated:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ffc700;
        }

        .rated:not(:checked)>label:before {
            content: '★ ';
        }

        .rated>input:checked~label {
            color: #ffc700;
        }

        .rated:not(:checked)>label:hover,
        .rated:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rated>input:checked+label:hover,
        .rated>input:checked+label:hover~label,
        .rated>input:checked~label:hover,
        .rated>input:checked~label:hover~label,
        .rated>label:hover~input:checked~label {
            color: #c59b08;
        }

        .star--gold {
            color: #FFD700;
            /* Warna kuning yang diinginkan */

        }

        .brdr {
            border: 1px solid #000;
            padding: 15px;
        }

        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .no-click {
            pointer-events: none;
        }

        .bg-rating {
            background-color: #222831;
            border-radius: 20px;
            /* Atur nilai border-radius sesuai preferensi Anda */
            overflow: hidden;
        }
    </style>
</head>

<body class="body">
    <header class="header header-horizontal header-view-pannel">
        <div class="container">
            <nav class="navbar">

                <div class="navbar-collapse pt-4">
                    <div class="navbar-extra">
                        @guest
                        @if (Route::has('login'))
                        <a class="btn-theme btn" style="background-color: #395B64; border-radius: 15px"
                            href="{{ route('login') }}">{{ __('Login') }}</a>&nbsp;
                        @endif
                        @else
                        <a class="btn-theme btn" style="background-color: #395B64; border-radius: 15px"
                            href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>&nbsp;

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        @if (Auth::user()->role == 'client')
                        <a type="button" href="{{ route('listChart') }}" class="btn-theme btn position-relative mr-4"
                            style="background-color: #395B64; border-radius: 15px; color: white; height: 55px; padding-top: 10px">
                            <h3><i class="bx bx-cart" style="font-size: 24px;"></i></h3>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill badge-danger">
                                {{ Cart::count() }}
                            </span>
                        </a>&nbsp;
                        @elseif(Auth::user()->role == 'kasir')
                        <a class="btn-theme btn mr-3 text-light" style="background-color: #395B64; border-radius: 15px"
                            href="{{ route('order.index') }}">Order</a>
                        @else
                        <a class="btn-theme btn mr-3 text-light" style="background-color: #395B64; border-radius: 15px"
                            href="{{ route('manager.index') }}">Dashboard</a>
                        @endif
                        @endguest


                        <a class="btn-theme btn mr-3 text-light" style="background-color: #395B64; border-radius: 15px"
                            href="{{ route('client.home') }}">Kembali</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <br><br><br>

    <h2 align="center">Our Menu</h2>

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-1">Desserts</li>
                        <li data-filter=".filter-2">Drinks</li>
                        <li data-filter=".filter-3">Maincourse</li>
                        <li data-filter=".filter-4">Snack</li>
                    </ul>
                </div>
            </div>


            <div class="row portfolio-container" style="padding-left: 10%">
                @foreach ($produk as $d)
                <form action="{{ route('order.store') }}" method="post">
                    @csrf
                    <div class="col-lg-2 col-md-6 portfolio-item filter-{{ $d->kategori_produks }} "
                        style="background-color: #222831; padding: 0px; border-radius: 20px; margin-left: 10px;">
                        <img class="card-img-top" src="{{ asset('uploads/' . $d->gambar_produks) }}" alt="Card image"
                            style="border-radius: 20px 20px 0 0; width: 100%; height: 200px; object-fit: cover;">
                        <div class="card-body" style="color: white; padding: 8px; height: 125px; overflow: hidden;">
                            <h4 class="card-title"
                                style="font-size: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                {{ $d->nama_produks }}</h4>
                            <input type="hidden" name="product_name" value=" {{ $d->nama_produks }}">
                            <p class="card-text" style="font-size: 14px;">Rp.{{ number_format($d->harga_produks, 0, ',',
                                '.') }}</p>
                            <a class="btn btn-warning btn-sm" data-toggle="modal"
                                data-target="#exampleModals{{ $d->id_produks }}" title="App 1">Lihat Produk</a>
                            <a class="btn btn-success btn-sm" data-toggle="modal"
                                data-target="#exampleModal{{ $d->id_produks }}" title="App 1">Order <i
                                    class="bx bx-cart"></i></a>

                        </div>
                    </div>

                    <div class="modal fade" id="exampleModals{{ $d->id_produks }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content card" style="max-width: 300px; background-color:#222831;">
                                <img class="card-img-top" src="{{ asset('uploads/' . $d->gambar_produks) }}"
                                    alt="Card image"
                                    style="width: 100%; border-radius: 10px 10px 0 0; max-height: 360px; object-fit: cover;">
                                <div class="modal-body" align="center" style="padding: 15px;">
                                    <h4 class="card-title text-white" style="font-size: 14px;">
                                        {{ $d->nama_produks }}
                                    </h4>
                                    <p class="card-text text-white" style="font-size: 12px;"><b>Harga:
                                        </b>Rp.{{ number_format($d->harga_produks, 0, ',', '.') }}</p>
                                    <p class="card-text text-white" style="font-size: 12px;"><b>Deskripsi: </b>
                                    </p>
                                    <p class="card-text text-white" style="font-size: 12px;">
                                        {{ $d->deskripsi_produks }}</p>
                                    <p class="card-text text-white" style="font-size: 12px;"><b>Stok: </b>
                                        {{ $d->stok_produks }}</p>
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-dismiss="modal">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="exampleModal{{ $d->id_produks }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content" style="background-color:#222831">
                                <div class="modal-header">
                                    <h5 class="modal-title text-white" id="exampleModalLabel">Pembelian Barang
                                    </h5>
                                    <button type="button" class="close text-white" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="row">
                                        <label class="col-sm-3 text-white">Kuantitas </label>
                                        <div class="col-sm-6">
                                            <div class="input-group ">
                                                <span class="input-group-btn">
                                                    <button type="button"
                                                        class="quantity-left-minus btn  btn-number text-white"
                                                        data-type="minus" data-field="">
                                                        <i class="bx bx-minus text-white"></i>
                                                    </button>
                                                </span>
                                                <input type="number" id="quantity" name="jumlah"
                                                    class="form-control input-number" value="1" min="1" max="100">
                                                <input type="hidden" id="id_produk" name="id_produk"
                                                    value="{{ $d->id_produks }}">
                                                <span class="input-group-btn">
                                                    <button type="button"
                                                        class="quantity-right-plus btn  btn-number text-white"
                                                        data-type="plus" data-field="">
                                                        <i class="bx bx-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <label class="col-sm-3 text-white">Tersisa: {{ $d->stok_produks }}
                                            Buah</label>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="harga" id="harga" value="{{ $d->harga_produks }}">
                                    {{-- <button type="submit" class="btn btn-secondary">Beli Sekarang</button> --}}
                                    <button type="submit" class="btn btn-secondary" name="action" value="buy_now">Beli
                                        Sekarang</button>
                                    <button type="submit" class="btn btn-primary" name="action"
                                        value="add_to_cart">Masukkan Keranjang</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                @endforeach

            </div>
    </section><!-- End Portfolio Section -->
    <!--rating-->
    @if (!empty($value->star_rating))

    <div class="container">
        <div class="row">
            <div class="col mt-4">
                <p class="font-weight-bold">Review</p>
                <div class="form-group row">
                    <div class="col">
                        <div class="rated">
                            @for ($i = 1; $i <= $value->star_rating; $i++)
                                <label class="star-rating-complete" title="text">{{ $i }}
                                    stars</label>
                                @endfor
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-4">
                    <div class="col">
                        <p>{{ $value->comments }}</p>
                    </div>
                </div>
            </div>
        </div>
        @else
        {{-- START --}}
        <div class="container">
            <div class="row">
                <div class="col mt-4">
                    <form class="py-2 px-4 bg-rating" action="{{ route('review.store') }}"
                        style="box-shadow: 0 0 10px 0 #222831;" method="POST" autocomplete="off">
                        @csrf
                        <p class="font-weight-bold text-light">Review</p>
                        <div class="form-group row mt-4">
                            <div class="col">
                                <input type="text" class="form-control" name="name" placeholder="Masukan Nama Anda"
                                    maxlength="200">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <div class="rate">
                                    <input type="radio" id="star5" class="rate" name="rating" value="5" />
                                    <label for="star5" title="text">5 stars</label>
                                    <input type="radio" checked id="star4" class="rate" name="rating" value="4" />
                                    <label for="star4" title="text">4 stars</label>
                                    <input type="radio" id="star3" class="rate" name="rating" value="3" />
                                    <label for="star3" title="text">3 stars</label>
                                    <input type="radio" id="star2" class="rate" name="rating" value="2">
                                    <label for="star2" title="text">2 stars</label>
                                    <input type="radio" id="star1" class="rate" name="rating" value="1" />
                                    <label for="star1" title="text">1 star</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mt-4">
                            <div class="col">
                                <textarea class="form-control" name="comment" rows="6 "
                                    placeholder="Tinggalkan komentar Anda di sini" maxlength="200"></textarea>
                            </div>
                        </div>
                        <div class="mt-3 text-right">
                            <button class="btn btn-sm py-2 px-3 btn-light">Kirim
                            </button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endif


    {{-- rating view --}}
    <div class="row mt-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($value as $index => $_)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $index }}" @if ($index===0)
                    class="active" @endif></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($value as $index => $item)
                <div class="carousel-item @if ($index === 0) active @endif">
                    {{-- START --}}
                    <div class="container bg-rating" style="box-shadow: 0 0 10px 0 #222831;">
                        <div class="row">
                            <div class="col mt-4">
                                <form class="py-2 px-4" method="POST" autocomplete="off">
                                    <p class="font-weight-bold text-light">REVUEW CUSTOMER</p>
                                    <div class="">
                                        <p class="text-left no-click text-uppercase fw-bold fs-4 text-light"
                                            name="comment" maxlength="200" readonly>{{ $item->name }}
                                        </p>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            @for ($i = 0; $i < 5; $i++) @if ($i < $item->star_rating)
                                                <label class="star--gold" title="{{ $i }} stars">
                                                    <i class="fas fa-star"></i>
                                                </label>
                                                @else
                                                <label title="{{ $i }} stars">
                                                    <i class="fas fa-star"></i>
                                                </label>
                                                @endif
                                                @endfor

                                        </div>
                                    </div>
                                    {{-- comment --}}
                                    <div class="">
                                        <p class="text-left no-click text-capitalize fw-bold fs-6 text-light"
                                            name="comment" maxlength="200" readonly>{{ $item->comments }}
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <i class=""></i>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>
    <!--end rating -->

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Paralax.js -->
    <script src="/parallax.js/parallax.js"></script>
    <!-- Waypoints -->
    <script src="/waypoints/jquery.waypoints.min.js"></script>
    <!-- Slick carousel -->
    <script src="/slick/slick.min.js"></script>
    <!-- Magnific Popup -->
    <script src="/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Inits product scripts -->
    <script src="/js/script.js"></script>
    <a class="scroll-top disabled" href="#"><i class="fas fa-angle-up" aria-hidden="true"></i></a>
    <footer class="flex-shrink-0 section-text-white footer footer-links">

        <div class="footer-copy">
            <div class="container text-white-50"><strong>&copy; </strong>
                All rights reserved.</div>
        </div>
    </footer>

    <!-- jQuery library -->
    <script src="/js/jquery-3.3.1.js"></script>
    <!-- Bootstrap -->
    <script src="/bootstrap/js/bootstrap.js"></script>
    <!-- Paralax.js -->
    <script src="/parallax.js/parallax.js"></script>
    <!-- Waypoints -->
    <script src="/waypoints/jquery.waypoints.min.js"></script>
    <!-- Slick carousel -->
    <script src="/slick/slick.min.js"></script>
    <!-- Magnific Popup -->
    <script src="/magnific-popup/jquery.magnific-popup.min.js"></script>
    <!-- Inits product scripts -->
    <script src="/js/script.js"></script>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJ4Qy67ZAILavdLyYV2ZwlShd0VAqzRXA&callback=initMap">
    </script>
    <script async defer src="https://ia.media-imdb.com/images/G/01/imdb/plugins/rating/js/rating.js"></script>

    <script>
        $(document).ready(function() {

            var quantitiy = 0;
            $('.quantity-right-plus').click(function(e) {

                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                $('#quantity').val(quantity + 1);


                // Increment

            });

            $('.quantity-left-minus').click(function(e) {
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());

                // If is not undefined

                // Increment
                if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
                }
            });

        });
    </script>
</body>

</html>