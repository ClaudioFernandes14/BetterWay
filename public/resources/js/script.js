let lgpdHtml = `
<div class="lgpd">
    <div class="lgpd--left">
        <p>Este site usa cookies para garantir que você obtenha a melhor experiência em nosso site.</p>
        <p>Tenha atenção pois os cookies são necessarios para algumas funcionalidades.</p>
    </div>

    <div class="lgpd--right">
        <button>OK</button>
    </div>
</div>

<link rel="stylesheet" href="/resources/css/style-home.css">

`;

let lsContent = localStorage.getItem('lgpd');
if (!lsContent) {
  document.body.innerHTML += lgpdHtml;

  let lgpdArea = document.querySelector('.lgpd');
  let lgpdButton = lgpdArea.querySelector('button'); 

  lgpdButton.addEventListener('click', ()=> {
    lgpdArea.remove();

    // Cria um objeto com as informações do usuário
    let userInformation = {
      ip: '',
      userAgent: '',
      date: ''
    };

    // Faz uma requisição para obter o endereço IP do usuário
    fetch('https://api.ipify.org?format=json')
      .then(response => response.json())
      .then(data => {
        userInformation.ip = data.ip;
        userInformation.userAgent = navigator.userAgent;
        userInformation.date = new Date().toString();

        // Armazena as informações do usuário em um cookie com expiração de 30 dias
        let expirationDate = new Date();
        expirationDate.setTime(expirationDate.getTime() + (30 * 24 * 60 * 60 * 1000)); // 30 dias
        setCookie('user_information', JSON.stringify(userInformation), expirationDate);
      });

    localStorage.setItem('lgpd', '123');
  });
}

function setCookie(name, value, expirationDate) {
  var expires = "";
  if (expirationDate) {
    expires = "; expires=" + expirationDate.toUTCString();
  }
  document.cookie = name + "=" + (value || "") + expires + "; path=/";
}



let searchForm = document.querySelector('.search-form');


document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

let shoppingCart = document.querySelector('.shopipng-cart');

document.querySelector('#cart-btn').onclick = () =>{
  window.location.href = '/produtos/criar';
}

let loginForm = document.querySelector('.login-form');


document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    navbar.classList.remove('active');
    
}

let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
}

window.onscroll = () =>{
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

var swiper = new Swiper(".product-slider", {
  loop:true,
  spaceBetween: 20,
  autoplay: {
      delay: 7500,
      disableOnInteraction: false,
  },
  centeredSlides: true,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1020: {
      slidesPerView: 3,
    },
  },
});

var swiper = new Swiper(".review-slider", {
  loop:true,
  spaceBetween: 20,
  autoplay: {
      delay: 7500,
      disableOnInteraction: false,
  },
  centeredSlides: true,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1020: {
      slidesPerView: 3,
    },
  },
});


/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}





