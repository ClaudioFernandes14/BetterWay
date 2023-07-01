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
      <div class="title login">Registar</div>
      <div class="title signup">Login</div>
    </div>
    <div class="form-container">
      <div class="slide-controls">
        <input type="radio" name="slide" id="login" >
        <input type="radio" name="slide" id="signup" checked>
        <label for="login" class="slide login">Login</label>
        <label for="signup" class="slide signup">Registar</label>
        <div class="slider-tab"></div>
      </div>

      <div class="form-inner">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="field">
                <div class="col-md-6">
                    <input id="name" type="text" autocomplete="off" placeholder="Nome *" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="field">
                <div class="col-md-6">
                    <input id="email" type="email" autocomplete="off" placeholder="Email *" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
              <div class="field">
                  <h5>Data de Nascimento *</h5>
                  <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth">
          
             
                  @if ($errors->has('date_of_birth') && $errors->first('date_of_birth'))
                    
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('date_of_birth') }}</strong>
                      </span>
                      
                  @endif
              </div>
            </div>
            <br>
            <br>

            <div class="row mb-3">
                <div class="field">
                    <input id="password" type="password" placeholder="Password * " class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    <span class="eyeRegister" onclick="showpw()">
                        <i id="hide1" class="bi bi-eye-fill"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                          <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg></i>
                        <i id="hide2" class="bi bi-eye-slash"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
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
                <div class="field">
                    <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar a password*" name="password_confirmation" required autocomplete="new-password">

                    <span class="eyeConf" onclick="showConfpw()">
                        <i id="confHide1" class="bi bi-eye-fill"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                          <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg></i>
                        <i id="confHide2" class="bi bi-eye-slash"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                          <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                          <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                        </svg></i>
                    </span>
          
                      @error('password_conf')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
          
                </div>
            </div>

            <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" value="Registar" >
            </div>

            <div class="termos-link">Ao se registar vai aceitar os nossos <a href="#" id="termos-link">Termos e Condições!</a></div>
            {{-- <div id="termos-modal" class="modal">
              <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Termos e Condições</h2>
                <p>Aqui estão os termos e condições da BetterWay:</p>
                <p>Insira aqui o texto dos termos e condições.</p>
              </div>
            </div> --}}
        </form>
        
      </div>
    </div>
  </div>
</body>

<script src="../resources/js/registar.js"></script>

</html>