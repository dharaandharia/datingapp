$(document).ready(()=>{

   let x = 0;
   let current = result[x];
   if(!(current === undefined)){
      document.querySelector('.img').style.background = 'url(/storage/profile_pictures/'+current.profile_picture+') center / cover no-repeat';
      document.querySelector('.infos').innerText = current.first_name+' '+current.last_name+', '+getAge(current.b_day);
      document.querySelector('.info').classList.remove('d-none');
      document.querySelector('.btn-wrapper').classList.remove('d-none');
   }else{
      document.querySelector('.img').classList.replace('d-flex','d-none');
      document.querySelector('.noMatch').classList.replace('d-none','d-flex');
   }

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
 
})