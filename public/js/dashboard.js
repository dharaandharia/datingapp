$(document).ready(()=>{

   let x = 0;
   let current = result[x];

   // SWiPING

   if(!(current === undefined)){
      document.querySelector('.img').style.background = 'url(/storage/profile_pictures/'+current.profile_picture+') center / cover no-repeat';
      document.querySelector('.infos').innerText = current.first_name+' '+current.last_name+', '+getAge(current.b_day);
      document.querySelector('.info').classList.remove('d-none');
      document.querySelector('.btn-wrapper').classList.remove('d-none');
   }else{
      document.querySelector('.img').classList.replace('d-flex','d-none');
      document.querySelector('.noMatch').classList.replace('d-none','d-flex');
   }

   // LIKE ACTION

   document.querySelector('#like').addEventListener('click',()=>{            
      document.querySelector('.spinner').classList.add('show');
      document.querySelector('.disable-like').classList.remove('d-none');
      document.querySelector('.disable-dislike').classList.remove('d-none');
      if(!(current === undefined)){
            $.ajax({
               type:'POST',
               url:'/like',
               data:{_token : csrf_token, user_id : current.user_id},
               success:function(data) {
               x++;
               current = result[x];
               if(!(current === undefined)){
                  document.querySelector('.img').style.background = 'url(/storage/profile_pictures/'+current.profile_picture+') center / cover no-repeat';
                  document.querySelector('.infos').innerText = current.first_name+' '+current.last_name+', '+getAge(current.b_day);
                  document.querySelector('.spinner').classList.remove('show');
                  document.querySelector('.disable-like').classList.add('d-none');
                  document.querySelector('.disable-dislike').classList.add('d-none');
               }else{
                  document.querySelector('.img').classList.replace('d-flex','d-none');
                  document.querySelector('.noMatch').classList.replace('d-none','d-flex');
               }
            }
         });
      }
   })

   // DISLIKE ACTION

   document.querySelector('#dislike').addEventListener('click',()=>{
      document.querySelector('.spinner').classList.add('show');
      document.querySelector('.disable-like').classList.remove('d-none');
      document.querySelector('.disable-dislike').classList.remove('d-none');
      if(!(current === undefined)){
            $.ajax({
               type:'POST',
               url:'/dislike',
               data:{_token : csrf_token, user_id : current.user_id},
               success:function(data) {
               x++;
               current = result[x];
               if(!(current === undefined)){
                  document.querySelector('.img').style.background = 'url(/storage/profile_pictures/'+current.profile_picture+') center / cover no-repeat';
                  document.querySelector('.infos').innerText = current.first_name+' '+current.last_name+', '+getAge(current.b_day);
                  document.querySelector('.spinner').classList.remove('show');
                  document.querySelector('.disable-like').classList.add('d-none');
                  document.querySelector('.disable-dislike').classList.add('d-none');
               }else{
                  document.querySelector('.img').classList.replace('d-flex','d-none');
                  document.querySelector('.noMatch').classList.replace('d-none','d-flex');
               }
            }
         });
      }
   })

   // GETTING AGE

   function getAge(dateString) {
      var today = new Date();
      var birthDate = new Date(dateString);
      var age = today.getFullYear() - birthDate.getFullYear();
      var m = today.getMonth() - birthDate.getMonth();
      if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
         age--;
      }
      return age;
   }

   // CHAT BANNER EVERNT LISTENER

   chats.map((chat)=>{
      document.querySelector('#chatBanner_'+chat.chat_id).addEventListener('click',()=>{
         if(!(document.querySelector('.contact-chat.active') == null)){
            document.querySelector('.contact-chat.active').classList.replace('active','d-none');
            document.querySelector('.contact.active').classList.remove('active');
         }
         if(document.querySelector('#app').classList.contains('d-flex')){
            document.querySelector('#app').classList.replace('d-flex','d-none');
         };
         if(document.querySelector('.noMatch').classList.contains('d-flex')){
            document.querySelector('.noMatch').classList.replace('d-flex','d-none');
         };

         document.querySelector('#chatBanner_'+chat.chat_id).classList.add('active');
         document.querySelector('#chat_'+chat.chat_id).classList.replace('d-none','active');

         let seen = document.querySelector('#chatBanner_'+chat.chat_id+' .chat-info > span');

         if(!seen.classList.contains('d-none')){
            seen.classList.add('d-none');

            // AJAX SEEN

            $.ajax({
               type:'POST',
               url:'/seen',
               data:{_token : csrf_token,chat_id: chat.chat_id},
               success:function(data){
               }
            });
         }
   
      })
   });

   // CLOSE CHAT

   document.querySelectorAll('#chatClose').forEach((close)=>{
      close.addEventListener('click',()=>{
         document.querySelector('.contact-chat.active').classList.replace('active','d-none');
         document.querySelector('.contact.active').classList.remove('active');
         if(current === undefined){
            document.querySelector('.noMatch').classList.replace('d-none','d-flex');
         }else{
            document.querySelector('#app').classList.replace('d-none','d-flex');
         }
      })
   })

   // AJAX SENDING MESSAGE

   document.querySelectorAll('#sendMsg').forEach((form)=>{
      form.addEventListener('submit', (e)=>{
         submitForm(e,form);
      });

      form.elements[0].addEventListener('keypress',(e)=>{
         if(e.key === "Enter"){
            submitForm(e,form);
         }
      })
   })


   function submitForm(e,form){
      e.preventDefault();
      if(!form.elements[0].value == 0){
         let chat_id = form.elements[1].value;
         let msg = form.elements[0].value;
         form.elements[0].value = '';
         // AJAX SENDING MESSAGE
         $.ajax({
            type:'POST',
            url:'/sendmessage',
            data:{_token : csrf_token, chat_id : chat_id, message : msg},
            success:function(data){
            }
         });

         // -- MODIFING UI --
         
         // chat message
         let message = document.createElement('div');
         message.className='row m-0 single-message mine py-1';

         
         let contentWrapper  = document.createElement('div');
         contentWrapper.className = 'col p-0 limit';
         
         let content = document.createElement('div');
         content.className = 'px-3 message-content p-0';
         content.innerText= msg;
         
         let img = document.createElement('div');
         img.className= 'message-pic align-self-end';
         img.style.background = 'url(/storage/profile_pictures/'+user.information.profile_picture+') center / cover no-repeat';

         contentWrapper.appendChild(content);
         message.appendChild(contentWrapper);
         message.appendChild(img);
         
         document.querySelector('#chat_'+chat_id+' .chat-messages').insertAdjacentElement('afterbegin',message);

         // chat banner


         let span = document.createElement('span');
         span.innerText= 'You: ';

         let text;
         if(msg.length >25){
            text = document.createTextNode(msg.substring(0,24)+'...');
         }else{
            text = document.createTextNode(msg);
         }

         let p = document.createElement('p');
         p.className='m-0';

         p.appendChild(span);
         p.appendChild(text);

         let oldP = document.querySelector('#chatBanner_'+chat_id+' p');
         OldPParent = document.querySelector('#chatBanner_'+chat_id+' .chat-info');
         OldPParent.replaceChild(p,oldP);
      }
   }
})