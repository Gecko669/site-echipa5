document.addEventListener('DOMContentLoaded', function () {
  
    // Smooth scroll pentru butonul "Totop"
    const totopButton = document.querySelector('.uk-totop');
    
    window.addEventListener('scroll', function () {
      if (window.scrollY > 200) {
        totopButton.style.display = 'block';
      } else {
        totopButton.style.display = 'none';
      }
    });
    
    totopButton.addEventListener('click', function (e) {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
    
    // Validare formular
    const form = document.getElementById('contact-form');
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      alert('Mesajul a fost trimis!');
    });
  });
  