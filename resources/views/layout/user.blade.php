<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>E-voting</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('template_user/assets/img/logo/bem.png')}}" rel="icon">
  <link href="{{url('template_user/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  
  <link href="{{url('template_user/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('template_user/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('template_user/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('template/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{url('template_user/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('template_user/assets/css/style.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <style type="text/css">


    .preloader {

      position: fixed;

      top: 0;

      left: 0;

      width: 100%;

      height: 100%;

      z-index: 9999;

      background-color: #fff;

    }

    .preloader .loading {

      position: absolute;

      left: 50%;

      top: 50%;

      transform: translate(-50%, -50%);

      font: 14px arial;

    }


  </style>
</head>

<body>
  <div class="preloader">
    <div class="loading">
      <img src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" width="80">
      <p>Harap Tunggu</p>
    </div>

  </div>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top shadow p-3 mb-5 bg-body rounded" style="background: white;">
    <div class="container d-flex align-items-center justify-content-between">
      <img src="{{url('template_user/assets/img/logo/bem.png')}}" alt="" class="img-fluid" 
      style="width: 70px;">
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.html" class="logo"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto{{ request()->is('index') ? 'active' : '' }}" href="{{url('index')}}" style="color: #C32E4B;"><i class="bi bi-house" style="float: left;"></i>&nbsp;Home</a></li>
          <li><a class="nav-link scrollto{{ request()->is('e-voting') ? 'active' : '' }}" href="{{url('e-voting')}}" style="color: #C32E4B;"><i class="bi bi-pie-chart"></i>&nbsp;Mulai Voting</a></li>
          <li><a class="nav-link scrollto{{ request()->is('profil') ? 'active' : '' }}" href="{{url('profil')}}" style="color: #C32E4B;"><i class="bi bi-person"></i>&nbsp;Profil</a></li>
          <li><a class="nav-link scrollto{{ request()->is('keluar') ? 'active' : '' }} keluar" href="{{url('keluar')}}" style="color: #C32E4B;"><i class="bi bi-box-arrow-right"></i>&nbsp;Keluar</a></li>
        </ul>

        <i class="bi bi-list mobile-nav-toggle" style="color: #C32E4B;"></i>
        
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->



  <main id="main">
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
        @yield('content')
      </div>
    </section>
  </main>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" 
  style="background: #C32E4B;">
  <i class="bi bi-arrow-up-short"></i>
</a>


<!-- Vendor JS Files -->
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="{{url('template_user/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{url('template_user/assets/vendor/aos/aos.js')}}"></script>
<script src="{{url('template_user/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('template_user/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{url('template_user/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{url('template_user/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{url('template_user/assets/vendor/php-email-form/validate.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<script src="{{url('template_user/assets/js/main.js')}}"></script>

<script type="text/javascript">
  $(".coblos").click(function(e){
    var form =  $(this).closest("form");
    e.preventDefault();
    Swal.fire({
      title: 'Yakin',
      text: "Dengan pilihan anda",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya'
    }).then((result) => {
      if (result.isConfirmed) {
        form.submit();
      }
    })
  })

  $(".keluar").click(function(e){
    e.preventDefault();
    var hapus = $(this).attr('href');
    Swal.fire({
      title: 'Yakin',
      text: "Anda akan keluar",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location = hapus;
      }
    })
  })

  $(document).ready(function () {

    $(".preloader").fadeOut(1000);

  })


</script>

</body>
@include('sweetalert::alert')
</html>