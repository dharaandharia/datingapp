function responsive(){
    var w = $('.pp').width();
    $('.pp').css({'height': w });
    x = Math.sqrt(2)*(((Math.sqrt(2)*w)-w)/4);
    $('.ppEdit').css({'bottom': x-16.5});
    $('.ppEdit').css({'right': x-16.5});
    
}

window.addEventListener('DOMContentLoaded',responsive());

$(window).resize(function(){
    responsive();
  });