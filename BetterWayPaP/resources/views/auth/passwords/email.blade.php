<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Redefinir a Password</title>
    <link rel="stylesheet" href="../resources/css/register-style.css">
</head>

<link rel="icon" type="image/png" sizes="50x50" href="/resources/images/icon_logo-removebg-preview.png">



<body>
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">Redefinir a Password</div>
        </div>

          <br>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="form-inner">
                    <div class="col-md-6">
                        
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        <form method="POST" action="{{ route('password.email') }}">
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
                            <br>
                            <div class="row mb-0">
                                <div class="field btn">
                                  <div class="btn-layer"></div>
                                  <input type="submit" value="Enviar link">
                                </div>
                              </div>
                            </div>
    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


