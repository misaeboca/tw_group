
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TW Group | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg"><b>Iniciar Sesion</b></p>

      <form action="{{ route('login') }}" method="post">
        {{ csrf_field() }}
        <div class="mb-3">
      
          <input type="text" name="email" class=" form-control form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="CORREO ELECTRÓNICO" autofocus>


           @if ($errors->has('email'))
            <div class="invalid-feedback">
              @foreach ($errors->all() as $key => $message)
                  @if ($key== 0 && $message == 'Estas credenciales no coinciden con nuestros registros.')
                      <strong>          
                        {!! trans('auth.failed') !!}
                      </strong>
                      @break
                  @else 
                      <strong>{!! trans('auth.email') !!}</strong>
                      @break
                  @endif
              @endforeach
            </div>
          @endif 
        </div>


        <div class="mb-3">
            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                   placeholder="CONTRASEÑA" value="{{old('password')}}">
           
            @if($errors->has('password'))
                <div class="invalid-feedback">
                    <strong>{{ __('auth.password')}}</strong>
                </div>
            @endif
        </div>
     
        <div class="row">
         
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
          <!-- /.col -->

          <div class="col-12 pt-4">
            <a href="{{ route('register') }}">Registrar nuevo usuario</a>
          </div>

        </div>
      </form>

      <!-- /.social-auth-links -->

     
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
