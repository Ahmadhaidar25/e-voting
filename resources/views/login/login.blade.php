<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Login</title>
  <link href="{{url('template_user/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{url('template_user/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{url('template_user/css/ruang-admin.min.css')}}" rel="stylesheet">

</head>

<body class="bg-white-login">
  <!-- Login Content -->
  <div class="row">
    <div class="col-sm-5 px-0 d-none d-sm-block mt-3">
      <center>
        <img src="{{url('template_admin/img/login.png')}}" class="rounded mx-auto d-block" style="width: 130%;">
      </center>
    </div>
    <div class="col-lg-7 mt-3">

     <div class="container-login">
      <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-12 col-md-9">
          <div class="card shadow-sm my-5" style="width: 100%;">
            <div class="card-body p-0">
              <div class="row">
                <div class="col-lg-12">
                  <div class="login-form">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Login</h1>

                    </div>
                    <form class="user" action="{{url('masuk')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Nip/Npm" autofocus>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                      </div>
                      <div class="form-group">
                        <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                         <a href="{{url('/lupa/password')}}">Lupa password ?</a>
                       </div>
                     </div>
                     <div class="form-group">
                      <button type="submit" class="btn btn-block text-white" 
                      style="background: #C32E4B;">
                      <div class="spinner" style="display: none;">
                        <i role="status" class="spinner-border spinner-border-sm"></i></div>
                        <div class="hide-text">Login</div>
                      </button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">

                    <a class=" nav-link font-weight-bold small" href="{{url('register')}}">
                      <span class="text-secondary">Belum punya akun ?</span> &nbsp;Daftar
                    </a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Login Content -->
<script src="{{url('template_user/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('template_user/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('template_user/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{url('template_user/js/ruang-admin.min.js')}}"></script>

<script type="text/javascript">
  (function () {
    $('.user').on('submit', function () {
      $('.button-prevent').attr('disabled', 'true');
      $('.spinner').show();
      $('.hide-text').hide();
    })
  })();
</script>
</body>
@include('sweetalert::alert')
</html>