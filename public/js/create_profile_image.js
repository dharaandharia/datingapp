$(document).ready(function(){
  document.querySelector('#profile_image').addEventListener('change',()=>{
      let filePath = document.querySelector('#profile_image').value;
      let fileName = filePath.match(/(?<=\\.*\\).*$/);
      document.querySelector('#fileName').innerText= fileName;
  });
    
  document.querySelector('#profile_image').addEventListener('focus',()=>{
    let msg = document.querySelector('#profileImageMsg');
    if(msg){
      if(!msg.classList.contains('ease')){
        msg.classList.add('ease');
      }
    }
  });
});