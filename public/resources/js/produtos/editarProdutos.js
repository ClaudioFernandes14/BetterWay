var imagemBoxes = document.querySelectorAll('.imagem-box');
var input = document.querySelector('#imagem');
var MAX_IMAGENS = 5;
var numImagens = 0;
var numImagensExibidas = 0;
var imagemBoxSelecionada = null;

var imagemPreview = document.querySelector('.imagem-preview');

input.addEventListener('change', function() {
  var inputFiles = input.files;

  if (numImagensExibidas + inputFiles.length > MAX_IMAGENS) {
    alert('Você só pode carregar no máximo ' + MAX_IMAGENS + ' imagens.');
    return;
  }

  for (var i = 0; i < inputFiles.length; i++) {
    var file = inputFiles[i];
    if (file.type === 'image/gif') {
      alert('Arquivos GIF não são permitidos.');
      continue; // Pula para o próximo arquivo
    }
    var reader = new FileReader();
    reader.onload = function(e) {
      // Exibe o preview da imagem selecionada
      imagemPreview.style.backgroundImage = 'url(' + e.target.result + ')';
    };
    reader.readAsDataURL(inputFiles[i]);
  }
});

for (var i = 0; i < imagemBoxes.length; i++) {
  imagemBoxes[i].addEventListener('click', function() {
    input.click();
    imagemBoxSelecionada = this;
    this.classList.add('editando');
  });
  // ...
}


function openPopup() {
  document.getElementById('confirm-popup').style.display = 'block';
}

function openPopupEdit() {
  document.getElementById('confirm-popup1').style.display = 'block';
}


// Fecha o popup
function closePopupEdit() {
  document.getElementById('confirm-popup1').style.display = 'none';
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


document.querySelector('#edit-form').addEventListener('submit', function(e) {
  e.preventDefault();
  var password = document.querySelector('#password').value;
  if (password === '') {
      h3('Por favor, insira a sua senha para editar o seu produto.');
  } else {
      e.target.submit();
  }
});

