
/**
 * Faz um PoP - UP para o utilizador inserir a password
 * Para poder eliminar a sua conta
 */
// Abre o popup
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
