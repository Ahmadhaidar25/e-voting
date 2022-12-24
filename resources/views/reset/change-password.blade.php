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
                  <form class="auth-form" action="{{ url('/change/password/post') }}" method="POST">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="mb-3">
                      <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                      <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                      @if ($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                      @endif
                    </div>

                    <div class="mb-3">
                      <label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
                      <input type="password" id="password" class="form-control" name="password" required autofocus>
                      @if ($errors->has('password'))
                      <span class="text-danger">{{ $errors->first('password') }}</span>
                      @endif
                    </div>

                    <div class="mb-3">
                      <label for="inputPassword" class="col-sm-4 col-form-label">Konfirmasi</label>

                      <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                      @if ($errors->has('password_confirmation'))
                      <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                      @endif

                    </div>
                    <div class="text-center">
                      <button class="btn btn-primary w-100 theme-btn" type="submit"
                      style="background: #C32E4B;">
                       Reset
                      </button>
                    </div>


                  </form>
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