$(document).ready(()=>{

   // CHAT BANNER EVENT LISTENER AND RECIVING NEW MESSAGE
   chats.map((chat)=>{
      // event listener
      document.querySelector('#chatBanner_'+chat.chat_id).addEventListener('click',()=>{
      if(!(document.querySelector('.contact-chat.active') == null)){
         document.querySelector('.contact-chat.active').classList.replace('active','d-none');
         document.querySelector('.contact.active').classList.remove('active');
      }
      
      document.querySelector('#blank').classList.remove('d-lg-block');

      if($( window ).width()<768){
         document.querySelector('.chat-wrapper').classList.add('d-none');
      }

         document.querySelector('#chatBanner_'+chat.chat_id).classList.add('active');
         document.querySelector('#chat_'+chat.chat_id).classList.replace('d-none','active');
   
      })
   });
 
   // SM CHAT BACK
   document.querySelectorAll('.fa-angle-left').forEach((back)=>{
      back.addEventListener('click',()=>{
         document.querySelector('.contact-chat.active').classList.replace('active','d-none');
         document.querySelector('.contact.active').classList.remove('active');
         document.querySelector('.chat-wrapper').classList.remove('d-none');
      })
   })
})