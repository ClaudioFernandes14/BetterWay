<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Verificar a Conta</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../resources/css/register-style.css">
</head>

<link rel="icon" type="image/png" sizes="50x50" href="../resources/images/icon_logo-removebg-preview.png">

<body>

<div class="wrapper">
    <div class="title-text">
      <div class="title login" style="color: blue">Verificar Conta</div>
    </div>
    <br>
    <div class="form-container">
      
      {{-- @if (session('status') == "two-factor-authentication-disabled")
      <h5 style="color: red">A Autenticacao foi desabilitada</h5>
      @endif

      @if (session('status') == "two-factor-authentication-enabled")
        <h5 style="color: green">A Autenticacao foi abilitada</h5>
      @endif --}}

      <div class="form-inner">
        @if (Auth::user()->hasVerifiedEmail())
            <h4>Sua conta já foi verificada!</h4>
        @else
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
            <form action="{{ route('verification.send') }}" method="POST">
                @csrf
                <h4>Enviamos um email para: {{Auth::user()->email}}</h4>
                <br>
                <h4>Se não recebeu o email para verificar a sua conta, clique no botao abaixo para reenviarmos o email de verificacao</h4>
                <div class="field btn">
                  <div class="btn-layer"></div>
                  <input type="submit" value="Reenviar e-mail de verificação">
                </div>
            </form>
            
        @endif
      </div>
      <br>

      <form action="/index" method="POST">
        @csrf
        <div class="field btn">
          <div class="btn-layer"></div>
          <input type="submit" value="Voltar">
        </div>
      </form>
            
    </div>
  </div>

</body>
  

</html>