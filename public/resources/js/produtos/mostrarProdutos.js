$(document).ready(function() {
    var currentIndex = 0;
    var slides = $('.slide');
    var slideCount = slides.length;

    function showSlide(index) {
        if (index === currentIndex) {
            return;
        }
    
        slides.eq(currentIndex).fadeOut(500);
        setTimeout(function() {
            slides.eq(index).fadeIn(500);
        }, 500);
        $('#radio' + (currentIndex + 1)).prop('checked', false);
        $('#radio' + (index + 1)).prop('checked', true);
        currentIndex = index;
        updateControls();
    }

    function nextSlide() {
        var nextIndex = (currentIndex + 1) % slideCount;
        showSlide(nextIndex);
    }

    function prevSlide() {
        var prevIndex = (currentIndex - 1 + slideCount) % slideCount;
        showSlide(prevIndex);
    }

    function updateControls() {
        $('.prev').toggleClass('disabled', currentIndex === 0);
        $('.next').toggleClass('disabled', currentIndex === slideCount - 1);
    }

    updateControls();

    $('.prev').click(function() {
        if (currentIndex > 0) {
            prevSlide();
        }
    });

    $('.next').click(function() {
        if (currentIndex < slideCount - 1) {
            nextSlide();
        }
    });
});


var envelope = document.querySelector('.fa-envelope');

envelope.addEventListener('click', function() {
  var email = this.dataset.email; // Substitua isto com o endereço de e-mail do usuário
  var phone = this.dataset.phone; // Substitua isto com o número de telefone do usuário

  var popup = document.createElement('div');
  popup.classList.add('popup');

  var emailLabel = document.createElement('label');
  emailLabel.textContent = 'E-mail: ';

  var emailText = document.createElement('span');
  emailText.textContent = email;

  var phoneLabel = document.createElement('label');
  phoneLabel.textContent = 'Telemovel: ';

  var phoneText = document.createElement('span');
  phoneText.textContent = phone;

  var closeButton = document.createElement('button');
  closeButton.textContent = 'Fechar';
  closeButton.classList.add('closeButton');

  popup.appendChild(emailLabel);
  popup.appendChild(emailText);
  popup.appendChild(document.createElement('br'));
  popup.appendChild(phoneLabel);
  popup.appendChild(phoneText);
  popup.appendChild(document.createElement('br'));
  popup.appendChild(closeButton);

  document.body.appendChild(popup);

  closeButton.addEventListener('click', function() {
    document.body.removeChild(popup);
  });
});


