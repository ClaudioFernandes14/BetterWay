<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Bem Vindo</title>
    <link rel="stylesheet" href="../resources/css/register-style.css">
</head>

<link rel="icon" type="image/png" sizes="50x50" href="resources/images/icon_logo-removebg-preview.png">

<body>

<div class="wrapper">
    <div class="title-text">
      <div class="title login">Login</div>
      <div class="title signup">Registar</div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" checked>
        <input type="radio" name="slide" id="signup">
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Registar</label>
        <div class="slider-tab"></div>
      </div>
      <div class="form-inner">
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="row mb-3">
              <div class="field">
                  <input id="email" type="email" placeholder="Email *" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <br>

          <div class="row mb-3">
              <div class="field">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password * " name="password" required autocomplete="current-password">

              <span class="eye" onclick="showLoginPw()">
                <i id="loginPw1" class="bi bi-eye-fill"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg></i>
                <i id="loginPw2" class="bi bi-eye-slash"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                  <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                  <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                </svg></i>
              </span>

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>


          <div class="row mb-3">
              <div class="col-md-6 offset-md-4">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                      <label class="form-check-label" for="remember">
                          {{ __('Lembrar de Mim') }}
                      </label>
                  </div>
              </div>
          </div>

          <div class="pass-link">
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Esqueceste te da Password?') }}
            </a>
            @endif
          </div>

          <div class="row mb-0">
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Login">
            </div>
          </div>
      </form>
      </div>
    </div>
  </div>

  <script src="../resources/js/registar.js"></script>

</body>
  

</html>