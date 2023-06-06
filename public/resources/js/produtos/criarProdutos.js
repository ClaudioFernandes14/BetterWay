var imagemBoxes = document.querySelectorAll('.imagem-box');
var input = document.querySelector('#imagem');
var MAX_IMAGENS = 5;
var numImagens = 0;
var numImagensExibidas = 0;
var imagemBoxSelecionada = null;

function adicionarImagem() {
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
      if (imagemBoxSelecionada) {
        // Substitui a imagem existente na caixa de imagem selecionada
        imagemBoxSelecionada.style.backgroundImage = 'url(' + e.target.result + ')';
        imagemBoxSelecionada.classList.add('com-imagem');
        imagemBoxSelecionada.classList.remove('editando');
        imagemBoxSelecionada = null;
      } else {
        // Adiciona uma nova imagem em uma caixa de imagem vazia
        var imagemBox = document.querySelector('.imagem-box:not(.com-imagem)');
        if (!imagemBox) {
          return; //Não há mais caixas de imagem vazias disponíveis
        }
        imagemBox.style.backgroundImage = 'url(' + e.target.result + ')';
        imagemBox.classList.add('com-imagem');
        numImagens++;
        numImagensExibidas++;
      }
    };
    reader.readAsDataURL(inputFiles[i]);
  }
}

for (var i = 0; i < imagemBoxes.length; i++) {
  imagemBoxes[i].addEventListener('click', function() {
    input.click();
    imagemBoxSelecionada = this;
    this.classList.add('editando');
  });

  // Adiciona botão "Editar" em cada caixa de imagem
  var editarBtn = document.createElement('button');
  editarBtn.addEventListener('click', function(e) {
    e.stopPropagation(); // Impede que o evento "click" seja propagado para a caixa de imagem
    // input.value = null;
    input.click();
    imagemBoxSelecionada = this.parentNode; // Armazena a caixa de imagem selecionada
    imagemBoxSelecionada.classList.add('editando');
  });
  imagemBoxes[i].appendChild(editarBtn);
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








// var firebaseConfig = {
//   apiKey: "AIzaSyCXbpcNbC0S8UCVrPyKxu5qOPhKEpfAxpk",
//   authDomain: "betterway-db857.firebaseapp.com",
//   projectId: "betterway-db857",
//   storageBucket: "betterway-db857.appspot.com",
//   messagingSenderId: "394875788452",
//   appId: "1:394875788452:web:c0caf14411541a2da61a31",
//   measurementId: "G-88XDF00ZX6"
// };
// firebase.initializeApp(firebaseConfig);


// // Obtenha uma referência ao Firebase Storage
// var storageRef = firebase.storage().ref();

// // Adicione um listener de evento ao botão "Enviar imagens"
// function uploadImagens() {
//   var input = document.querySelector('#input-imagem');
//   var files = input.files;

//   // Faz o upload de cada imagem selecionada para o Firebase Storage
//   for (var i = 0; i < files.length; i++) {
//     var file = files[i];
//     var imagemBoxVazia = document.querySelector('.imagem-box:not(.com-imagem)');

//     // Se não houver mais caixas de imagem vazias, interrompa o loop
//     if (!imagemBoxVazia) {
//       alert('Você já carregou o número máximo de imagens.');
//       break;
//     }

//     // Cria uma referência para o arquivo no Firebase Storage
//     var fileRef = storageRef.child(file.name);

//     // Faz o upload do arquivo para o Firebase Storage
//     fileRef.put(file).then(function(snapshot) {
//       // Obtém a URL de download do arquivo
//       fileRef.getDownloadURL().then(function(url) {
//         // Exibe a imagem na caixa de imagem vazia
//         imagemBoxVazia.style.backgroundImage = 'url(' + url + ')';
//         imagemBoxVazia.classList.add('com-imagem');
//       });
//     });
//   }
// }