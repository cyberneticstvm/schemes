<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Schemes | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ public_path().'/layout/plugins/fontawesome-free/css/all.min.css' }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ public_path().'/layout/plugins/icheck-bootstrap/icheck-bootstrap.min.css' }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ public_path().'/layout/dist/css/adminlte.min.css' }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b>SM</b>SCHEMES</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-submit">Sign In</button>
          </div>
          <!-- /.col -->
          <div class="col-12 mt-3">
          @if (count($errors) > 0)
          <div role="alert" class="alert alert-danger">
              @foreach ($errors->all() as $error)
                  {{ $error }}
              @endforeach
          </div>
          @endif
          </div>
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ public_path().'/layout/plugins/jquery/jquery.min.js' }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ public_path().'/layout/plugins/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
<!-- AdminLTE App -->
<script src="{{ public_path().'/layout/dist/js/adminlte.min.js' }}"></script>
<script>
    $('form').submit(function(){
        $(".btn-submit").attr("disabled", true);
        $(".btn-submit").html("<span class='spinner-grow spinner-grow-sm' role='status' aria-hidden='true'></span>&nbsp;Loading...");
    });
</script>
</body>
</html>
