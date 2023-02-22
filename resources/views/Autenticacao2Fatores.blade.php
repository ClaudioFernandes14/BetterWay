<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Autenticacao 2 Fatores</title>
    <link rel="stylesheet" href="../resources/css/register-style.css">
</head>

<link rel="icon" type="image/png" sizes="50x50" href="resources/images/icon_logo-removebg-preview.png">

<body>

<div class="wrapper">
    <div class="title-text">
      <div class="title login">Autenticacao 2 Fatores</div>
    </div>
    <br>
    <div class="form-container">

      
      @if (session('status') == "two-factor-authentication-disabled")
      <h5 style="color: red">A Autenticacao foi desabilitada</h5>
      @endif

      @if (session('status') == "two-factor-authentication-enabled")
        <h5 style="color: green">A Autenticacao foi abilitada</h5>
      @endif

      <div class="form-inner">


        <form method="POST" action="user/two-factor-authentication">
          @csrf
          <br>

          @if (auth()->user()->two_factor_secret)
            @method('DELETE')

            <div class="qrCode">
              {!!auth()->user()->twoFactorQrCodeSvg()!!}
            </div>

            <br>  

            <div>
              <h3>Recovery Codes</h3>

              <ul>
                @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                  <li class="code">{{$code}}</li>
                @endforeach
              </ul>

            </div>

            <br>
            <div class="field btn">
              <div class="btn-layer-vermelho"></div>
              <input type="submit" style="color: white" value="Retirar a autenticacao">
            </div>
          @else

            <div class="field btn">
              <div class="btn-layer-verde"></div>
              <input type="submit" style="color: green" value="Permitir a autenticacao">
              <br>
            </div>
            <a href="/"><h5 style="margin-left:20ch; margin-top: 1ch">Prefiro não fazer</h5></a>
  
          @endif
          
      </form>
      </div>
    </div>
  </div>

  <script src="../resources/js/registar.js"></script>

</body>
  

</html>