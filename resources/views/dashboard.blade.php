<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{asset('new')}}/assets/img/bem.png" rel="icon">
    <link href="{{asset('new')}}/assets/img/bem.png" rel="apple-touch-icon">
    <title>Subiksa Website</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('new')}}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{asset('new')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('new')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('new')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('new')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{asset('new')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('new')}}/assets/css/style.css" rel="stylesheet">
</head>

<body>
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center">
            <img src="{{asset('new')}}/assets/img/bem.png" class="brand-image img-circle elevation-3"
                style="opacity: .8" width="50px">
            <h1 class="logo"><a>
                    <Fieldset>FAKULTAS TEKNIK DAN KEJURUAN</Fieldset><span> 2021</span>
                </a></h1>
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>Ini Adalah<span> Tampilan Home</span></h1>
            <div class="d-flex">
                @if (Route::has('login'))
                @auth
                @if (Auth::user()->role == 'dosen')
                <a href="/dosen" class="btn-get-started scrollto">Get Started</a>
                @else
                <a href="/mahasiswa" class="btn-get-started scrollto">Get Started</a>
                @endif
                @endauth
                @endif
            </div>
        </div>
    </section><!-- End Hero -->

    <footer id="footer">



        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Ketut Gede Subiksa<span>.</span></h3>
                        <p>
                            Ilmu Komputer 4A <br>
                            1915101007 <br>
                            Singaraja<br>
                            Bali <br><br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script src="{{asset('new')}}/assets/vendor/aos/aos.js"></script>
    <script src="{{asset('new')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('new')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{asset('new')}}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{asset('new')}}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{asset('new')}}/assets/vendor/purecounter/purecounter.js"></script>
    <script src="{{asset('new')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('new')}}/assets/vendor/waypoints/noframework.waypoints.js"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('new')}}/assets/js/main.js"></script>

</body>

</html>