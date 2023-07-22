<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Siakas</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/img/logo.ico" rel="icon">
    <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/vendor/aos/aos.css" rel="stylesheet">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

            <div class="logo d-flex align-items-center">
                <img src="/img/icon.png" alt="">
                <span style="font-family: 'Script MT'">Siakas</span>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="#beranda">Beranda</a></li>
                    <li><a class="nav-link scrollto" href="#tentangsekolah">Tentang Sekolah</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="beranda" class="hero d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Selamat Datang di SIAKAS</h1>
                    <h2 data-aos="fade-up" data-aos-delay="400">Sistem Informasi Administrasi Keuangan Sekolah</h2>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="{{ route('siswa.login') }}"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>MASUK</span>
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="/img/background.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <section id="tentangsekolah" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row gx-0">

                    <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up"
                        data-aos-delay="200">
                        <div class="content">
                            <h3>Tentang Sekolah</h3>
                            <h2>{{ $data->nama_sekolah }}</h2>
                            <p style="text-align: justify">{{ $data->informasi_sekolah }}</p>
                        </div>
                    </div>

                    <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                        @if ($data->image == null)
                            <img src="{{ asset('images/sdmulia.jpg') }}" class="img-fluid" style="border-radius: 5%"
                                alt="foto sekolah">
                        @else
                            <img src="{{ asset('images/' . $data->image) }}" class="img-fluid" style="border-radius: 5%"
                                alt="foto sekolah">
                        @endif
                    </div>

                </div>
            </div>

        </section><!-- End About Section -->


        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h2>Kontak</h2>
                    <p>Kontak Kami</p>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Alamat</h3>
                                <p>{{ $data->alamat_sekolah }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bi bi-telephone-fill"></i>
                                <h3>Telepon</h3>
                                <p>{{ $data->telepon_sekolah }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bi bi-envelope-at"></i>
                                <h3>Email</h3>
                                <p>{{ $data->email_sekolah }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bi bi-facebook"></i>
                                <h3>Facebook</h3>
                                <p>{{ $data->facebook_sekolah }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bi bi-instagram"></i>
                                <h3>Instagram</h3>
                                <p>{{ $data->instagram_sekolah }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-md-12">
                            <div class="info-box">
                                <i class="bi bi-clock-fill"></i>
                                <h3>Jam Kerja</h3>
                                <p>{{ $data->jam_kerja_sekolah }}</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            </div>

        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/vendor/aos/aos.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/js/main.js"></script>

</body>

</html>
