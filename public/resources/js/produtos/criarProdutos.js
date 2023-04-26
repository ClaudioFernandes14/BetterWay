var maxImagens = 3;
var contadorImagens = 0;

function adicionarImagem() {
  var input = document.querySelector('#imagem');
  
  if (input.files && input.files[0] && contadorImagens < maxImagens) {
    var reader = new FileReader();
    reader.onload = function(e) {
      var imagemBox = document.querySelector('.imagem-box');
      var newImagemItem = document.createElement('div');
      newImagemItem.className = 'imagem-item';
      newImagemItem.style.backgroundImage = 'url(' + e.target.result + ')';
      imagemBox.appendChild(newImagemItem);
      
      // Incrementa o contador de imagens após adicionar uma nova imagem
      contadorImagens++;
      
      // Desabilita o botão de adicionar imagens se o número máximo de imagens for atingido
      if (contadorImagens === maxImagens) {
        document.querySelector('#imagem').disabled = true;
      }
      
      // Inicializa o slide de imagens após adicionar a primeira imagem
      if (imagemBox.children.length === 1) {
        $('.imagem-slide').slick({
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
          autoplaySpeed: 2000,
          arrows: true,
          prevArrow: '.slick-prev',
          nextArrow: '.slick-next',
          speed: 500
        });
      }
    }
    reader.readAsDataURL(input.files[0]);
  }
}



function openPopup() {
  document.getElementById('confirm-popup').style.display = 'block';
}

// Fecha o popup
function closePopup() {
  document.getElementById('confirm-popup').style.display = 'none';
}

// Confirma a senha antes de enviar o formulário
document.getElementById('delete-form').addEventListener('submit', function(e) {
  e.preventDefault();
  var password = document.getElementById('password').value;
  if (password === '') {
      alert('Por favor, insira a sua senha para excluir a conta.');
  } else {
      document.getElementById('delete-form').submit();
  }
});