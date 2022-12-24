<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Admin|system</title>
  <link href="{{url('template_admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{url('template_admin/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{url('template_admin/css/ruang-admin.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link href="{{url('template_admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

  <style>
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

<body id="page-top">
 <div class="preloader">
  <div class="loading">
    <img src="https://c.tenor.com/I6kN-6X7nhAAAAAj/loading-buffering.gif" width="80">
    <p>Harap Tunggu</p>
  </div>

</div>
<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html" style="background: #C32E4B;">
      <div class="sidebar-brand-icon">
        <img src="{{url('template_user/assets/img/logo/bem.png')}}">
      </div>
      <div class="sidebar-brand-text mx-3">E-voting Admin</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
      <a class="nav-link" href="{{url('home')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Menu
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
        aria-controls="collapsePage">
        <i class="fas fa-fw fa-server"></i>
        <span>Master Data</span>
      </a>
      <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
         <a class="collapse-item" href="{{url('kandidat')}}"><i class="bi bi-people"></i>&nbsp;Kandidat</a>
         <a class="collapse-item" href="{{url('/master/prodi')}}"><i class="bi bi-mortarboard"></i>&nbsp;Prodi</a>
       </div>
     </div>
   </li>

  <hr class="sidebar-divider">
  <div class="sidebar-heading">
  </div>

  <li class="nav-item">
    <a class="nav-link" href="{{url('/admin/profil')}}">
      <i class="fas fa-fw fa-user"></i>
      <span>Profil</span>
    </a>
  </li>
  
  <hr class="sidebar-divider">
  <div class="version" id="version-ruangadmin"></div>
</ul>
<!-- Sidebar -->
<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
    <!-- TopBar -->
    <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top" style="background: #C32E4B;">
      <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">

          <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
          aria-labelledby="searchDropdown">

        </div>
      </li>





      <div class="topbar-divider d-none d-sm-block"></div>
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        @if(Auth::user()->foto==null)
        <img class="img-profile rounded-circle bg-white" src="{{url('template_user/img/user.jpg')}}" style="max-width: 60px">
        @else
        <img class="img-profile rounded-circle bg-white" 
        src="{{url('image_avatar/'.auth()->user()->foto)}}" style="max-width: 60px">
        @endif
        <span class="ml-2 d-none d-lg-inline text-white small">{{Auth::user()->nama}}</span>
      </a>
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
       
        <div class="dropdown-divider"></div>
        <a class="dropdown-item keluar" href="{{url('keluar')}}">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
<!-- Topbar -->

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">


 @yield('content')
 <!-- Modal Logout -->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Are you sure you want to logout?</p>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
      <a href="{{url('keluar')}}" class="btn btn-primary">Logout</a>
    </div>
  </div>
</div>
</div>

</div>
<!---Container Fluid-->
</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
        <b><a href="">Ahmad Haidar</a></b>
      </span>
    </div>
  </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>


<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="{{url('template_admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('template_admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{url('template_admin/js/ruang-admin.min.js')}}"></script>
<script src="{{url('template_admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('template_admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<!-- JavaScript Bundle with Popper -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script>
  let counter = 1
  $('.add-prodi').click(function(){
   counter++
   let inputan='<div class="mb-3 mt-2" id="hapus"><label class="form-label">Prodi</label><input type="text" class="form-control" name="nama_prodi[]"></div>'

   $('#tambah_inputan').append(inputan)
 });

  $('.remove').click(function(){

    $('#hapus').remove()
    counter--
  });

  $(document).ready(function () {
      $('#table').DataTable(); // ID From dataTable 
    });


  $(".hapus").click(function(e){
    e.preventDefault();
    var hapus = $(this).attr('href');
    Swal.fire({
      title: 'Yakin',
      text: "kandidat akan di hapus",
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

   $(".del").click(function(e){
    e.preventDefault();
    var hapus = $(this).attr('href');
    Swal.fire({
      title: 'Yakin',
      text: "prodi akan di hapus",
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