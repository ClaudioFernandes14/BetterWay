<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Bem Vindo</title>
    <link rel="stylesheet" href="../resources/css/register-style.css">
</head>
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
        <form action="" class="login">
          <div class="field">
            <input type="text" placeholder="Email" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Password" required>
          </div>
          <div class="pass-link"><a href="#">Esqueceu-se a password?</a></div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Login">
          </div>
          <div class="signup-link">És novo aqui? <a href="">Regista-te agora!</a></div>
        </form>
        <form action="#" class="signup">
          <div class="field">
            <input type="text" placeholder="Email" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Password" required>
          </div>
          <div class="field">
            <input type="password" placeholder="Confirmar a password" required>
          </div>
          <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" value="Registar">
          </div>
          <div class="termos-link">Ao se registar vai aceitar os nossos termos e condicoes <a href="">Termos e Condições</a></div>
        </form>
      </div>
    </div>
  </div>

  <script src="../resources/js/registar.js"></script>

</body>
  

</html>