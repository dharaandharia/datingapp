$(document).ready(()=>{

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
    
  document.querySelector('#name').addEventListener('focus',()=>{
    let msg = document.querySelector('#nameMsg');
    if(msg){
      if(!msg.classList.contains('ease')){
        msg.classList.add('ease');
      }
    }
  });

});