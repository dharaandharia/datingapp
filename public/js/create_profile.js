$(document).ready(()=>{

  document.querySelector('#firstName').addEventListener('focus',()=>{
      let msg = document.querySelector('#firstNameMsg');
      if(msg){
        if(!msg.classList.contains('ease')){
          msg.classList.add('ease');
        }
      }
    });

  document.querySelector('#lastName').addEventListener('focus',()=>{
    let msg = document.querySelector('#lastNameMsg');
    if(msg){
      if(!msg.classList.contains('ease')){
        msg.classList.add('ease');
      }
    }
  });

  document.querySelector('#sex').addEventListener('focus',()=>{
    let msg = document.querySelector('#sexMsg');
    if(msg){
      if(!msg.classList.contains('ease')){
        msg.classList.add('ease');
      }
    }
  });

  document.querySelector('#bDay').addEventListener('focus',()=>{
    let msg = document.querySelector('#bDayMsg');
    if(msg){
      if(!msg.classList.contains('ease')){
        msg.classList.add('ease');
      }
    }
  });

  document.querySelector('#country').addEventListener('focus',()=>{
    let msg = document.querySelector('#countryMsg');
    if(msg){
      if(!msg.classList.contains('ease')){
        msg.classList.add('ease');
      }
    }
  });

  document.querySelector('#region').addEventListener('focus',()=>{
    let msg = document.querySelector('#regionMsg');
    if(msg){
      if(!msg.classList.contains('ease')){
        msg.classList.add('ease');
      }
    }
  });

  document.querySelector('#city').addEventListener('focus',()=>{
    let msg = document.querySelector('#cityMsg');
    if(msg){
      if(!msg.classList.contains('ease')){
        msg.classList.add('ease');
      }
    }
  });

});