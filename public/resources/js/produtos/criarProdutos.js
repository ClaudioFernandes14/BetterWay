// Adicionar nova imagem à caixa de seleção de imagens
function adicionarImagem(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
  
      reader.onload = function(e) {
        $('.imagem-box').append('<div class="imagem-item" style="background-image: url(' + e.target.result + ')"></div>');
        $('.imagem-box').slick('unslick');
        $('.imagem-box').slick({
          dots: true,
          infinite: true,
          speed: 300,
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          prevArrow: '<button type="button" class="slick-prev"></button>',
          nextArrow: '<button type="button" class="slick-next"></button>'
        });
      }
  
      reader.readAsDataURL(input.files[0]);
    }
  }