const loginText = document.querySelector(".title-text .login");
      /*Declaracao de variaveis */
      const loginForm = document.querySelector("form.login");
      const loginBtn = document.querySelector("label.login");
      const signupBtn = document.querySelector("label.signup");
      const signupLink = document.querySelector("form .signup-link a");

      /**
       * Ao clicar no botao de registar vai para pagina do registo
       */
      signupBtn.onclick = (()=>{
        // loginForm.style.marginLeft = "-50%";
        // loginText.style.marginLeft = "-50%";

        // Simulate a mouse click:
        window.location.href = "register";
        var showloginpw1 = document.getElementById("loginPw1");
        var showloginpw2 = document.getElementById("loginPw2");
        var showHide2 = document.getElementById("hide2");
        var showConfHide2 = document.getElementById("confHide2");

        showloginpw1.style.display = "none";
        showloginpw2.style.display = "none";

        /*Faz um Timeout para os icons aparecerem quando o utilizador mudar de pagina*/
        setTimeout(function() {
          showHide2.style.display = "block";
          showConfHide2.style.display = "block";
        }, 400) 

        
      });

      /**
       * Ao clicar no botao de login volta a fazer animacao
       */
      loginBtn.onclick = (()=>{
        // loginForm.style.marginLeft = "0%";
        // loginText.style.marginLeft = "0%";
        
        // Simulate a mouse click:
        window.location.href = "login";

        /**
         *  Declaracao das variaveis
         */
        var showloginpw1 = document.getElementById("loginPw1");
        var showloginpw2 = document.getElementById("loginPw2");
        var showHide1 = document.getElementById("hide1");
        var showHide2 = document.getElementById("hide2");
        var showConfHide1 = document.getElementById("confHide1");
        var showConfHide2 = document.getElementById("confHide2");
        

        /**
         * Esconde os icons de ver a password
         */
        showHide1.style.display = "none";
        showHide2.style.display = "none";
        showConfHide1.style.display = "none";
        showConfHide2.style.display = "none";
        
        /**
         * Faz um timeout para o icon do visualizar password 
         * aparecer em um determinado tempo
         */
        setTimeout(function(){
          showloginpw1.style.display = "none";
          showloginpw2.style.display = "block";
        }, 430)

     
        /**
         * Ao clicar no botao para ir para a pagina de login
         * vai apagar as informacoes postas pelo o utilizador nas textboxs
         */
         document.getElementById("pwLogin").value = "";
         document.getElementById("myInput").value = "";
         document.getElementById("ConfPw").value = "";
         document.getElementById("emailLogin").value = "";
         document.getElementById("emailRegister").value = "";

      });

     /**
      * Ao clicar no link faz animacao para a pagina do registo
      */ 
      // signupLink.onclick = (()=>{
      //   signupBtn.click();
      //   return false;
      // });



/**
 * Vai mostrar a password que o utilizador esta a inserir no registo
 * Mais especificamente na textbox da password
 */
function showpw(){
  var x = document.getElementById("password");
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

/**
 * Vai mostrar a password que o utilizador esta a inserir na pagina do login
 */
function showLoginPw(){
  var pwbox = document.getElementById("password");
  var hide1 = document.getElementById("loginPw1");
  var hide2 = document.getElementById("loginPw2");

  /**
   * Valida se a pwbox pertence a uma textbox propria para a password
   */
  if (pwbox.type === 'password') {
    pwbox.type = "text";
    hide1.style.display = "block";
    hide2.style.display = "none";   
  }else{
    pwbox.type = "password";
    hide1.style.display = "none";
    hide2.style.display = "block";
  }
}


/**
 * Vai mostrar a password que o utilizador esta a inserir no registo
 * Mais especificamente na textbox da confirmacao da password
 */
function showConfpw(){
  var x = document.getElementById("password-confirm");
  var y = document.getElementById("confHide1");
  var z = document.getElementById("confHide2");

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


const termosLink = document.querySelector('#termos-link');
		const termosPopup = document.querySelector('.termos-popup');

		termosLink.addEventListener('click', function(event) {
			event.preventDefault();
			termosPopup.style.display = 'block';
		});

		const termosContent = document.querySelector('.termos-content');
		termosContent.addEventListener('click', function(event) {
			event.stopPropagation();
		});
		termosPopup.addEventListener('click', function() {
			termosPopup.style.display = 'none';
		});


    
