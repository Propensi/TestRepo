<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset("/bower_components/adminlte/bootstrap/css/bootstrap.min.css")}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("/bower_components/adminlte/dist/css/AdminLTE.min.css")}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset("/bower_components/adminlte/plugins/iCheck/square/blue.css")}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style type="text/css">
.login-page, .register-page {
    background: #F8FBFF;
}

  </style>
</head>

<body class="hold-transition login-page">

<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Simponi</b>RCTI</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

     <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
    {!! csrf_field() !!}

      <div class="form-group has-feedback">
        <div class="col-md-12">
        <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
         @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
            </div>                  
      </div>

      <div class="form-group has-feedback">
        <div class="col-md-12">
            <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
       </div>
      <div class="row">
        <div class="col-xs-8">
             <div class="form-group">
                            <div class="col-md-8 ">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <a href="{{ url('/password/reset') }}">Forgot Your Password?</a><br>


  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<script src="{{ assets("/bower_components/adminlte/plugins/jQuery/jQuery-2.2.0.min.js") }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ assets("/bower_components/adminlte/bootstrap/js/bootstrap.min.js") }}"></script>
<!-- iCheck -->
<script src="{{ assets("/bower_components/adminlte/plugins/iCheck/icheck.min.js") }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

