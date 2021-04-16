$(document).ready(()=>{

  // Get the current year for the copyright
  $('#year').text(new Date().getFullYear());

  // Init Scrollspy
  $('body').scrollspy({ target: '#main-nav' });

  // Smooth Scrolling
  $("#main-nav a").on('click', function (event) {
    if (this.hash !== "") {
      event.preventDefault();

      const hash = this.hash;

      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function () {

        window.location.hash = hash;
      });
    }
  });

  // scroll functions
  $(window).scroll(function(e) {

      // add/remove class to navbar when scrolling to hide/show
      $('.navbar')[$(window).scrollTop() >= 150 ? 'addClass' : 'removeClass']('navbar-hide');
      $('.navbar-collapse')[$(window).scrollTop() >= 150 ? 'removeClass' : 'removeClass']('show');
  });

  // carousel settings

  $('.carousel').carousel({
    interval: 3000,
    keyboard: true,
    pause: 'hover',
    wrap: true
  })

  // error message removal

  document.querySelector('#email').addEventListener('focus',()=>{
    let msg = document.querySelector('#emailMsg');
    if(msg){
      if(!msg.classList.contains('ease')){
        msg.classList.add('ease');
      }
    }
  });

  document.querySelector('#password').addEventListener('focus',()=>{
    let msg = document.querySelector('#passwordMsg');
    if(msg){
      if(!msg.classList.contains('ease')){
        msg.classList.add('ease');
      }
    }
  });
});