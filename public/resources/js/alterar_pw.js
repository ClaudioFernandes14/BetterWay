/**
 * Vai mostrar a password que o utilizador esta a inserir no alterar password
 * Mais especificamente na textbox da nova password
 */
function showpw(){
    var x = document.getElementById("new-password");
    var y = document.getElementById("hide1");
    var z = document.getElementById("hide2");
  
    if (x.type === 'password') {
      x.type = "text";
      y.style.display = "block";
      z.style.display = "none";
    }
    else{
      x.type = "password";
      y.style.display = "none";
      z.style.display = "block";
    }
  }