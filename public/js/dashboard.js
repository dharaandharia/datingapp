$(document).ready(()=>{
   let x = 0;
   let current = result[x];

   // SWiPING

   if(!(current === undefined)){
      document.querySelector('.img').style.background = `url('/storage/profile_pictures/${current.profile_picture}') center / cover no-repeat`;
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
               result.splice(x,1);
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

   // BACK ACTION

   document.querySelector('#back').addEventListener('click',()=>{
      document.querySelector('.spinner').classList.add('show');
      document.querySelector('.disable-like').classList.remove('d-none');
      document.querySelector('.disable-dislike').classList.remove('d-none');
      setTimeout(()=>{
         x--;
         current = result[x];
         if(!(current === undefined)){
            document.querySelector('.img').style.background = 'url(/storage/profile_pictures/'+current.profile_picture+') center / cover no-repeat';
            document.querySelector('.infos').innerText = current.first_name+' '+current.last_name+', '+getAge(current.b_day);
            document.querySelector('.spinner').classList.remove('show');
            document.querySelector('.disable-like').classList.add('d-none');
            document.querySelector('.disable-dislike').classList.add('d-none');
         }else{
            document.querySelector('.spinner').classList.remove('show');
            document.querySelector('.disable-like').classList.add('d-none');
            document.querySelector('.disable-dislike').classList.add('d-none');
         }
      },500)
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

   // CHAT BANNER EVENT LISTENER AND RECIVING NEW MESSAGE
   chats.map((chat)=>{

      // *****************************************************************
      // ******************* recieve new message *************************
      // *****************************************************************

      Echo.private('chat.'+chat.chat_id).listen('NewMessage',(e)=>{
         // adding the message to the chat
         let message = document.createElement('div');
         message.className='row m-0 single-message py-1';

         let contentWrapper  = document.createElement('div');
         contentWrapper.className = 'col p-0 limit';
         
         let content = document.createElement('div');
         content.className = 'px-3 message-content p-0';
         content.innerText= e.content;
         
         let img = document.createElement('div');
         img.className= 'message-pic align-self-end';
         img.style.background = 'url(/storage/profile_pictures/'+e.profile_picture+') center / cover no-repeat';

         contentWrapper.appendChild(content);
         message.appendChild(img);
         message.appendChild(contentWrapper);
         
         document.querySelector('#chat_'+e.chat_id+' .chat-messages').insertAdjacentElement('afterbegin',message);

         
         // customizing the chat banner
         
         let banner = document.querySelector('#chatBanner_'+e.chat_id);
            // banner message number
         if(!banner.classList.contains('active')){
               // if not active
            let seen = document.querySelector('#chatBanner_'+e.chat_id+' .chat-info > span');
            seen.classList.remove('d-none');
            if(seen.innerText.length == 0){
               seen.innerText = 1;
            }else{
               seen.innerText ++;
            }
         }else{
               // if active
            $.ajax({
               type:'POST',
               url:'/seen',
               data:{_token : csrf_token,chat_id: e.chat_id},
               success:function(data){
               }
            });
         }
            // banner message
         let bannerMessage;
         if(e.content.length >27){
           bannerMessage = e.content.substring(0,26)+'...';
         }else{
            bannerMessage = e.content;
         }
         let messageWrapper = document.querySelector('#chatBanner_'+e.chat_id+' .chat-info p');
         messageWrapper.innerHTML= `<p>${bannerMessage}</p>`;

            // moving the banner to the begining

         $('#chatBanner_'+e.chat_id).remove();
         document.querySelector('.contacts').insertAdjacentElement("afterbegin",banner);

         // SM CHAT ICON NUMBER

         if(document.querySelector('.chat-wrapper').classList.contains('d-none') && document.querySelector('#chat_'+e.chat_id).classList.contains('d-none')){
            if(document.querySelector('.sm-msg-num').innerText.length == 0){
               document.querySelector('.sm-msg-num').innerText = 1;
            }else{
               document.querySelector('.sm-msg-num').innerText ++;
            }
            document.querySelector('.sm-msg-num').classList.remove('d-none');
         }

      })



      // event listener
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

         if(!document.querySelector('.chat-wrapper').classList.contains('d-none')){
            document.querySelector('.chat-wrapper').classList.add('d-none');
            document.querySelector('.app').classList.remove('d-none');
         };

         document.querySelector('#chatBanner_'+chat.chat_id).classList.add('active');
         document.querySelector('#chat_'+chat.chat_id).classList.replace('d-none','active');

         let seen = document.querySelector('#chatBanner_'+chat.chat_id+' .chat-info > span');

         if(!seen.classList.contains('d-none')){
            seen.innerText= '';
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

   // SM CHAT LIST ICON

   document.querySelector('.fa-paper-plane').addEventListener('click',()=>{
      if(!(document.querySelector('.fa-times').classList.contains('d-none'))){
        document.querySelector('.fa-times').classList.add('d-none');
        document.querySelector('.fa-bars').classList.remove('d-none');
        document.querySelector('.nav-rest').classList.add('d-none');
        document.querySelector('.content').classList.remove('d-none');
      }

      if(!(document.querySelector('.app').classList.contains('d-none')))
      document.querySelector('.chat-wrapper').classList.remove('d-none');
      document.querySelector('.app').classList.add('d-none');
      document.querySelector('.sm-msg-num').innerText = '';
      document.querySelector('.sm-msg-num').classList.add('d-none');

   });

   // SM CHAT LIST NUMBER

   let num = 0;
   chats.forEach((one)=>{
      if(!(one.last_message_by == user.id))
      num  = num + one.number_of_messages;
   });

   if(!(num === 0)){
     document.querySelector('.sm-msg-num').classList.remove('d-none');
     document.querySelector('.sm-msg-num').innerText = num;
   }

   // SM CHAT LIST CLOSE

   document.querySelector('#chatListClose').addEventListener('click',()=>{
      document.querySelector('.chat-wrapper').classList.add('d-none');
      document.querySelector('.app').classList.remove('d-none');
   });

   // SM CHAT BACK
   document.querySelectorAll('.fa-angle-left').forEach((back)=>{
      back.addEventListener('click',()=>{
         document.querySelector('.contact-chat.active').classList.replace('active','d-none');
         document.querySelector('.contact.active').classList.remove('active');
         if(current === undefined){
            document.querySelector('.noMatch').classList.replace('d-none','d-flex');
         }else{
            document.querySelector('#app').classList.replace('d-none','d-flex');
         }
         document.querySelector('.chat-wrapper').classList.remove('d-none');
         document.querySelector('.app').classList.add('d-none');
      })
   })

   // AJAX SENDING MESSAGE

   document.querySelectorAll('#sendMsg').forEach((form)=>{
      form.addEventListener('submit', (e)=>{
         submitForm(e,form);
      });

       // textarea on ENTER key event
      form.elements[0].addEventListener('keypress',(e)=>{
         if(e.key === "Enter"){
            submitForm(e,form);
         }
      })
   })


   // SUBMITTING SEND MESSAGE FORM

   function submitForm(e,form){
      e.preventDefault();
      let chat_id = form.elements[1].value;
      let msg = form.elements[0].value;
      form.elements[0].value = '';
      if(!msg.trim().length == 0){

         // AJAX SENDING MESSAGE
         $.ajax({
            type:'POST',
            url:'/sendmessage',
            data:{_token : csrf_token, chat_id : chat_id, message : msg},
            success:function(data){
            }
         });

         // -- MODIFING UI --
         
         // chat message update

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

         // chat banner message

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

         // chat banner order

         let banner = document.querySelector('#chatBanner_'+chat_id);
         $('#chatBanner_'+chat_id).remove();
         document.querySelector('.contacts').insertAdjacentElement("afterbegin",banner);

      }
   }

      // *****************************************************************
      // ******************* recieve new match ***************************
      // *****************************************************************


      
   Echo.private('match.'+user.id).listen('NewMatch',(e)=>{
         
      let checkNoContacts = document.querySelector('.no-contacts');
      if(checkNoContacts){
         checkNoContacts.classList.replace('d-flex','d-none');
      }

      // adding new match to contact list
      let contact = document.createElement('div');
      contact.className='contact d-flex align-items-center px-3';
      contact.id = 'chatBanner_'+e.chat_id;

      let img = document.createElement('div');
      img.className = 'chat-img';
      img.style.background = 'url(/storage/profile_pictures/'+e.profile_picture+') center / cover no-repeat';

      let chatInfo = document.createElement('div');
      chatInfo.className = 'chat-info pl-3';

      let name = document.createElement('b');
      name.innerText = e.first_name+' '+e.last_name;

      let content = document.createElement('p');
      content.innerText = e.last_message;

      let msgNum = document.createElement('span');
      msgNum.className = "msg-num text-center";



      chatInfo.appendChild(name);
      chatInfo.appendChild(content);
      chatInfo.appendChild(msgNum);

      contact.appendChild(img);
      contact.appendChild(chatInfo);

      document.querySelector('.contacts').insertAdjacentElement("afterbegin",contact);

      // creating its own chat

      let contactChat = document.createElement('div');
      contactChat.className = 'contact-chat d-none';
      contactChat.id = 'chat_'+e.chat_id;

      let contactChatTop = document.createElement('div');
      contactChatTop.className = 'contact-chat-top m-0 p-3 row';

         let chatBack = document.createElement('div');
         chatBack.className = 'd-flex align-items-center';

            let chatBackIcon = document.createElement('i');
            chatBackIcon.className = 'fas fa-lg fa-angle-left px-3 d-lg-none';
            chatBackIcon.addEventListener('click',()=>{
               document.querySelector('.contact-chat.active').classList.replace('active','d-none');
               document.querySelector('.contact.active').classList.remove('active');
               if(current === undefined){
                  document.querySelector('.noMatch').classList.replace('d-none','d-flex');
               }else{
                  document.querySelector('#app').classList.replace('d-none','d-flex');
               }
               document.querySelector('.chat-wrapper').classList.remove('d-none');
               document.querySelector('.app').classList.add('d-none');
            });

            chatBack.appendChild(chatBackIcon);

         let contactChatImg = document.createElement('div');
         contactChatImg.className = 'contact-chat-img ml-2';
         contactChatImg.style.background = 'url(/storage/profile_pictures/'+e.profile_picture+') center / cover no-repeat';

         let nameWrapper = document.createElement('div');
         nameWrapper.className = 'd-flex align-items-center';

            let nameTitle = document.createElement('span');
            nameTitle.className = 'ml-4';
               let link = document.createElement('a');
               link.href = `/profile/${e.match_with}`;
               link.innerText = e.first_name+' '+e.last_name;

               nameTitle.appendChild(link);

            nameWrapper.appendChild(nameTitle);
         
         let close = document.createElement('div');
         close.className = 'col d-flex align-items-center flex-row-reverse';

            let closeButton = document.createElement('i');
            closeButton.classList = 'fas fa-times p-1 d-none d-lg-block';
            closeButton.id = 'chatClose';
            closeButton.addEventListener('click',()=>{
               document.querySelector('.contact-chat.active').classList.replace('active','d-none');
               document.querySelector('.contact.active').classList.remove('active');
               if(current === undefined){
                  document.querySelector('.noMatch').classList.replace('d-none','d-flex');
               }else{
                  document.querySelector('#app').classList.replace('d-none','d-flex');
               }
            });

            close.appendChild(closeButton);
         
         contactChatTop.appendChild(chatBack);
         contactChatTop.appendChild(contactChatImg);
         contactChatTop.appendChild(nameWrapper);
         contactChatTop.appendChild(close);
      
      let chatWrapper = document.createElement('div');
      chatWrapper.className = 'chat-messages-wrapper p-3';

         let chat = document.createElement('div');
         chat.className = 'chat-messages d-flex flex-column-reverse p-1';
         
         chatWrapper.appendChild(chat);

      let chatForm = document.createElement('div');
      chatForm.className = 'chat-form m-0';

            let form = document.createElement('form');
            form.className = 'row m-0 p-2';
            form.id = 'sendMsg';

               let textareaWrapper = document.createElement('div');
               textareaWrapper.className = 'col-9 p-0';

                  let formTextarea = document.createElement('textarea');
                  formTextarea.name = 'message';
                  formTextarea.className = 'col';

                  textareaWrapper.appendChild(formTextarea);

               let chatIDinput = document.createElement('input');
               chatIDinput.name = 'chat_id';
               chatIDinput.type = 'number';
               chatIDinput.value = e.chat_id;
               chatIDinput.hidden = true;

               let btnWrapper = document.createElement('div');
               btnWrapper.className = 'col-3 p-0 pl-2 send-btn';

                  let btn = document.createElement('button');
                  btn.className = ' btn btn-primary btn-block';
                  btn.type = 'submit';
                  btn.id = 'seed';
                  btn.innerHTML = '<b>send</b>';

                  btnWrapper.appendChild(btn);
               
            form.appendChild(textareaWrapper);
            form.appendChild(chatIDinput);
            form.appendChild(btnWrapper);

         chatForm.appendChild(form);

      
      contactChat.appendChild(contactChatTop);
      contactChat.appendChild(chatWrapper);
      contactChat.appendChild(chatForm);

      document.querySelector('.app').appendChild(contactChat);

      contact.addEventListener('click',()=>{
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

         if(!document.querySelector('.chat-wrapper').classList.contains('d-none')){
            document.querySelector('.chat-wrapper').classList.add('d-none');
            document.querySelector('.app').classList.remove('d-none');
         };

         document.querySelector('#chatBanner_'+e.chat_id).classList.add('active');
         document.querySelector('#chat_'+e.chat_id).classList.replace('d-none','active');

         let seen = document.querySelector('#chatBanner_'+e.chat_id+' .chat-info > span');

         if(!seen.classList.contains('d-none')){
            seen.innerText= '';
            seen.classList.add('d-none');

            // AJAX SEEN

            $.ajax({
               type:'POST',
               url:'/seen',
               data:{_token : csrf_token,chat_id: e.chat_id},
               success:function(data){
               }
            });
         }
   
      })

      form.addEventListener('submit', (e)=>{
         submitForm(e,form);
      });

      formTextarea.addEventListener('keypress',(e)=>{
         if(e.key === "Enter"){
            submitForm(e,form);
         }
      });

      Echo.private('chat.'+e.chat_id).listen('NewMessage',(e)=>{
         // adding the message to the chat
         let message = document.createElement('div');
         message.className='row m-0 single-message py-1';

         let contentWrapper  = document.createElement('div');
         contentWrapper.className = 'col p-0 limit';
         
         let content = document.createElement('div');
         content.className = 'px-3 message-content p-0';
         content.innerText= e.content;
         
         let img = document.createElement('div');
         img.className= 'message-pic align-self-end';
         img.style.background = 'url(/storage/profile_pictures/'+e.profile_picture+') center / cover no-repeat';

         contentWrapper.appendChild(content);
         message.appendChild(img);
         message.appendChild(contentWrapper);
         
         document.querySelector('#chat_'+e.chat_id+' .chat-messages').insertAdjacentElement('afterbegin',message);

         
         // customizing the chat banner
         
         let banner = document.querySelector('#chatBanner_'+e.chat_id);
            // banner message number
         if(!banner.classList.contains('active')){
               // if not active
            let seen = document.querySelector('#chatBanner_'+e.chat_id+' .chat-info > span');
            seen.classList.remove('d-none');
            if(seen.innerText.length == 0){
               seen.innerText = 1;
            }else{
               seen.innerText ++;
            }
         }else{
               // if active
            $.ajax({
               type:'POST',
               url:'/seen',
               data:{_token : csrf_token,chat_id: e.chat_id},
               success:function(data){
               }
            });
         }
            // banner message
         let bannerMessage;
         if(e.content.length >27){
           bannerMessage = e.content.substring(0,26)+'...';
         }else{
            bannerMessage = e.content;
         }
         let messageWrapper = document.querySelector('#chatBanner_'+e.chat_id+' .chat-info p');
         messageWrapper.innerHTML= `<p>${bannerMessage}</p>`;

            // moving the banner to the begining

         $('#chatBanner_'+e.chat_id).remove();
         document.querySelector('.contacts').insertAdjacentElement("afterbegin",banner);

         // SM CHAT ICON NUMBER

         if(document.querySelector('.chat-wrapper').classList.contains('d-none')){
            if(document.querySelector('.sm-msg-num').innerText.length == 0){
               document.querySelector('.sm-msg-num').innerText = 1;
            }else{
               document.querySelector('.sm-msg-num').innerText ++;
            }
            document.querySelector('.sm-msg-num').classList.remove('d-none');
         }

      })

      // NOTIFY A NEW MATCH

      if(document.querySelector('.chat-wrapper').classList.contains('d-none')){
         if(document.querySelector('.sm-msg-num').innerText.length == 0){
            document.querySelector('.sm-msg-num').innerText = 1;
         }else{
            document.querySelector('.sm-msg-num').innerText ++;
         }
         document.querySelector('.sm-msg-num').classList.remove('d-none');
      }
   })
})