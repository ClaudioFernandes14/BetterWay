

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


document.getElementById('edit-form').addEventListener('submit', function(e) {
  e.preventDefault();
  var password = document.getElementById('password').value;
  if (password === '') {
      h3('Por favor, insira a sua senha para editar a sua conta.');
  } else {
      document.getElementById('edit-form').submit();
  }
});


