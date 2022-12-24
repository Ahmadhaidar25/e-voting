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
                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                  </div>
                  <hr>
                  <form action="{{url('/post/reset/password')}}" method="post" class="reg">
                    @csrf
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email" value="{{old('email')}}">
                    </div>
                    <div class="form-group mt-3">
                     <button type="submit" class="btn btn-block text-white" 
                     style="background: #C32E4B;">
                     <div class="spinner" style="display: none;">
                      <i role="status" class="spinner-border spinner-border-sm"></i></div>
                      <div class="hide-text">Submit</div>
                    </button>
                  </div>

                </form>
                <hr>
                <div class="text-center">
                  <a class="nav-link font-weight-bold small" href="{{url('/')}}">
                    <span class="text-secondary">Kembali Untuk</span> Login</a>
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