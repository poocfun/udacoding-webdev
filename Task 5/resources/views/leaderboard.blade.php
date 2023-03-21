<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medicio Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('template')}}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('template')}}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('template')}}/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="{{ asset('template')}}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('template')}}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('template')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('template')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('template')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('template')}}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('template')}}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('template')}}/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medicio
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/medicio-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.html" class="logo me-auto"><img src="{{ asset('template')}}/assets/img/logo.png" alt=""></a>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <h1 class="logo me-auto"><a href="index.html">Medicio</a></h1> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Categories</a></li>
          <li><a class="nav-link scrollto" href="#departments">Leaderboard</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Portofolio</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Testimonial</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Join</span> Us</a>

    </div>
  </header><!-- End Header -->

   <main id="main">
    <div class="container" style="margin-top:200px;">
    <a href="{{ url('/') }}" style="color: #48AA33; font-size:30px;" >< Leaderboard Mentoring Program</a>
    <div class="card mt-5">
        <div class="card-header">

        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Nama Peserta</th>
                        <th>Sekolah</th>
                        <th>Program</th>
                        <th>Angkatan</th>
                        <th>Skor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leaderboard as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->sekolah }}</td>
                                    <td>{{ $row->program }}</td>
                                    <td>{{ $row->angkatan }}</td>
                                    <td>{{ $row->skor }}</td>
                                </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
   </main>
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
                <a href="index.html" class="logo me-auto"><img width="200px" height="100px" src="{{ asset('template')}}/assets/img/logo.png" alt=""></a>

            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Blog</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Careers</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Media Center</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Help Center</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Contact Us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Driver Help Center</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Term & Conditions</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy Policy</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Download</h4>
            <button type="button" class="btn btn-secondary" name="button"><i class="fab fa-app-store"></i> App Store</button>
            <button type="button" class="btn btn-secondary" name="button"><i class="fab fa-google-play"></i> Play Store</button>

            <p class="mt-4 mb-0" style="font-weight:bold;">Follow Us</p>
            <div class="social-links mt-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        Copyright &copy; 2018 - 2022 Udacoding
      </div>
    </div>
  </footer><!-- End Footer -->

  <!-- Vendor JS Files -->
  <script src="{{ asset('template')}}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="{{ asset('template')}}/assets/vendor/aos/aos.js"></script>
  <script src="{{ asset('template')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('template')}}/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="{{ asset('template')}}/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="{{ asset('template')}}/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('template')}}/assets/js/main.js"></script>

</body>

</html>
