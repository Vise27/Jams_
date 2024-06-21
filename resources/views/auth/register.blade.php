<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register</title>

  <!-- Archivos CSS Generales -->
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- Bibliotecas CSS -->
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/jquery-selectric/selectric.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/modules/bootstrap-social/bootstrap-social.css') }}">

  <!-- CSS de la Plantilla -->
  <link rel="stylesheet" href="{{ asset('backend/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/assets/css/components.css') }}">

  <!-- Inicio de Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-94034622-3');
  </script>
  <!-- Fin de Google Analytics -->
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-10 col-md-8 col-lg-6">
            <div class="login-brand">
              <img src="{{ asset('assets/front/img/jams.jpg') }}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">

              <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                  @csrf

                  <div class="form-group">
                    <label for="name">Nombre</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                      <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                      </div>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                      <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                      </div>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="password" class="d-block">Contraseña</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                    @if ($errors->has('password'))
                      <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                      </div>
                    @endif
                  </div>

                  <div class="form-group">
                    <label for="password_confirmation" class="d-block">Confirmar Contraseña</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Crear cuenta
                    </button>
                  </div>
                  <div class="text-center mt-4 mb-3">
                    <div class="text-job text-muted">Iniciar sesión con redes sociales</div>
                  </div>
                  <div class="row sm-gutters">
                    <div class="col-6">
                      <a class="btn btn-block btn-social btn-facebook" href="{{ route('auth.redirect') }}">
                        <span class="fab fa-facebook"></span> Facebook
                      </a>
                    </div>
                  </div>
                  
                <div class="mt-5 text-muted text-center">
                  ¿ya tienes una cuenta?<a href="{{ route('login') }}">iniciar sesión</a>
                </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              <!-- Pie de página simple aquí si es necesario -->
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Archivos JS Generales -->
  <script src="{{ asset('backend/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('backend/assets/js/stisla.js') }}"></script>
  
  <!-- Bibliotecas JS -->
  <script src="{{ asset('backend/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
  <script src="{{ asset('backend/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

  <!-- Archivo JS Específico de la Página -->
  <script src="{{ asset('backend/assets/js/page/auth-register.js') }}"></script>
  
  <!-- Archivo JS de la Plantilla -->
  <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('backend/assets/js/custom.js') }}"></script>
</body>
</html>
