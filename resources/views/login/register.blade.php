<!DOCTYPE html>
<html lang="en">

<head>

 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 <link href="img/logo/logo.png" rel="icon">
 <title>Register</title>
 <link href="{{url('template_user/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
 <link href="{{url('template_user/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
 <link href="{{url('template_user/css/ruang-admin.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                    @if ($errors = session('errors')) 
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                      </svg>
                      &nbsp;
                      <strong>Email sudah pernah di pakai</strong>
                    </div>
                    @endif
                  </div>
                  <hr>
                  <form action="{{url('/daftar/akun')}}" method="post" class="reg">
                    @csrf
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="nama" value="{{old('nama')}}">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jk"
                        value="{{old('jk')}}L">
                        <label class="form-check-label">Laki-Laki</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jk"
                        value="{{old('jk')}}P">
                        <label class="form-check-label">Perempuan</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>No Telepon</label>
                      <input type="number" class="form-control" name="no_tlp" value="{{old('no_tlp')}}">
                    </div>

                    <div class="form-group">
                      <label>Npm/Nip</label>
                      <input type="text" class="form-control" name="username" value="{{old('username')}}">
                    </div>

                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" name="password" 
                      placeholder="Password">
                    </div>

                   <input type="hidden" name="role" value="2">


                    <div class="form-group mt-3">
                     <button type="submit" class="btn btn-block text-white" 
                     style="background: #C32E4B;">
                     <div class="spinner" style="display: none;">
                      <i role="status" class="spinner-border spinner-border-sm"></i></div>
                      <div class="hide-text">Daftar</div>
                    </button>
                  </div>

                </form>
                <hr>
                <div class="text-center">
                  <a class="nav-link font-weight-bold small" href="{{url('/')}}">Saya sudah punya akun</a>
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
<!-- Register Content -->
<script src="{{url('template_user/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{url('template_user/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('template_user/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{url('template_user/js/ruang-admin.min.js')}}"></script>
<script type="text/javascript">
 (function () {
  $('.reg').on('submit', function () {
    $('.button-prevent').attr('disabled', 'true');
    $('.spinner').show();
    $('.hide-text').hide();
  })
})();
</script>
</body>
@include('sweetalert::alert')
</html>