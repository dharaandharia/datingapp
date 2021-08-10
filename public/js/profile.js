$(window).ready(()=>{
    // make Pp responsive
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

    // edit & show state buttons event listeners
    document.querySelectorAll('.fa-edit.openEditState').forEach((target)=>{
        target.addEventListener('click',editState);
    });

    document.querySelectorAll('.fa-times.closeEditState').forEach((target)=>{
        target.addEventListener('click',closeEditState);
    });

    /*function editState(e){
        e.target.classList.add('d-none');
        let id = e.target.parentElement.parentElement.parentElement.id;
        document.querySelector(`#${id} .showState`).classList.add('d-none');
        document.querySelector(`#${id} .editState`).classList.remove('d-none');
        e.target.nextElementSibling.classList.remove('d-none');
    }*/
    function editState(e){
        e.target.classList.add('d-none');
        let id = e.target.parentElement.parentElement.parentElement.id;
        document.querySelector(`#${id} .showState`).classList.add('d-none');
        document.querySelector(`#${id} .editState`).classList.remove('d-none');
        e.target.nextElementSibling.classList.remove('d-none');
    }

    /*function closeEditState(e){
        e.target.classList.add('d-none');
        let id = e.target.parentElement.parentElement.parentElement.id;
        document.querySelector(`#${id} .showState`).classList.remove('d-none');
        document.querySelector(`#${id} .editState`).classList.add('d-none');
        e.target.previousElementSibling.classList.remove('d-none');
    }*/
    function closeEditState(e){
        e.target.classList.add('d-none');
        let id = e.target.parentElement.parentElement.parentElement.id;
        document.querySelector(`#${id} .showState`).classList.remove('d-none');
        document.querySelector(`#${id} .editState`).classList.add('d-none');
        e.target.previousElementSibling.classList.remove('d-none');
    }


    // select2 data
    $('#preferences').select2({data : food_pref, width :'80%'});
    $('#favoriteFoods').select2({data : favoriteFood, width :'80%'});
    $('#favoriteDrinks').select2({data : favoriteDrink, width :'80%'});
    $('#holiday_select').select2({ width :'80%'});
    $('#music_select').select2({ width :'80%'});
    $('#hobbie_select').select2({ width :'80%'});

    // confirming Add forms
    document.querySelector('#prefForm').addEventListener('submit',(e)=>{
        e.preventDefault();
        let value = $('#preferences').val();
        if(value.length > 0){
            $.ajax({
                type:'POST',
                url:'/foodpreferences',
                data:{_token : csrf_token, pref : value},
                success:function() {
                    location.reload();
                },
            });
        }
    })
    
    document.querySelector('#holidayForm').addEventListener('submit',(e)=>{
        e.preventDefault();
        let value = $('#holiday_select').val();
        if(value.length > 0){
            $.ajax({
                type:'POST',
                url:'/userholidays',
                data:{_token : csrf_token, holidays : value},
                success:function(res) {
					console.log(res);
                    location.reload();
                },
            });
        }
    })
    
    document.querySelector('#musicForm').addEventListener('submit',(e)=>{
        e.preventDefault();
        let value = $('#music_select').val();
        if(value.length > 0){
            $.ajax({
                type:'POST',
                url:'/usermusic',
                data:{_token : csrf_token, music : value},
                success:function(res) {
					console.log(res);
                    location.reload();
                },
            });
        }
    })
    
    document.querySelector('#hobbyForm').addEventListener('submit',(e)=>{
        e.preventDefault();
        let value = $('#hobbie_select').val();
        if(value.length > 0){
            $.ajax({
                type:'POST',
                url:'/userhobbie',
                data:{_token : csrf_token, hobbie : value},
                success:function(res) {
					console.log(res);
                    location.reload();
                },
            });
        }
    })

    document.querySelector('#favoriteFoodForm').addEventListener('submit',(e)=>{
        e.preventDefault();
        let value = $('#favoriteFoods').val();
        if(value.length > 0){
            $.ajax({
                type:'POST',
                url:'/favoritefoods',
                data:{_token : csrf_token, favorite : value},
                success:function() {
                    location.reload();
                },
            });
        }
    })

    document.querySelector('#favoriteDrinkForm').addEventListener('submit',(e)=>{
        e.preventDefault();
        let value = $('#favoriteDrinks').val();
        if(value.length > 0){
            $.ajax({
                type:'POST',
                url:'/favoritedrinks',
                data:{_token : csrf_token, favorite : value},
                success:function() {
                    location.reload();
                },
            });
        }
    })
    
    
    document.querySelector('#abt-from-id').addEventListener('submit',(e)=>{
        e.preventDefault();
        let value = $('#about_info_txt').val();
        if(value.length > 0){
            $.ajax({
                type:'POST',
                url:'/aboutinfo',
                data:{_token : csrf_token, about : value},
                success:function() {
                    location.reload();
                },
            });
        }
    })
    
    
    
    
    document.querySelector('#locationForm').addEventListener('submit',(e)=>{
        e.preventDefault();
        let city = $('#city_txt').val();
        let country = $('#country_txt').val();
        if(city.length > 0 || country.length > 0){
            $.ajax({
                type:'POST',
                url:'/updatestatecity',
                data:{_token : csrf_token, city : city,country:country},
                success:function() {
                    location.reload();
                },
            });
        }
    })
    
    document.querySelector('#dobForm').addEventListener('submit',(e)=>{
        e.preventDefault();
        let bday = $('#bDay').val();
        
        if(bday.length > 0){
            $.ajax({
                type:'POST',
                url:'/updatebday',
                data:{_token : csrf_token, bday : bday},
                success:function() {
                    location.reload();
                },
            });
        }
    })

    // AJAX delete item
    document.querySelectorAll('#pref .editState .fa-times').forEach((time)=>{
        time.addEventListener('click',(e)=>{
            let id = e.target.parentElement.id;
            $.ajax({
                type:'POST',
                url:'/removefoodpreference',
                data:{_token : csrf_token, id : id},
                success:function(){
                    e.target.parentElement.remove();
                    document.querySelector(`#foodPref_${id}`).remove();
                },
            });
        })
    });

    document.querySelectorAll('#favoriteFood .editState .fa-times').forEach((time)=>{
        time.addEventListener('click',(e)=>{
            let id = e.target.parentElement.id;
            $.ajax({
                type:'POST',
                url:'/removefavoritefood',
                data:{_token : csrf_token, id : id},
                success:function(){
                    e.target.parentElement.remove();
                    document.querySelector(`#favorite_f${id}`).remove();
                },
            });
        })
    });
    
    document.querySelectorAll('#favoriteFood .editState .fa-times').forEach((time)=>{
        time.addEventListener('click',(e)=>{
            let id = e.target.parentElement.id;
            $.ajax({
                type:'POST',
                url:'/removeholidays',
                data:{_token : csrf_token, id : id},
                success:function(){
                    e.target.parentElement.remove();
                    document.querySelector(`#favorite_f${id}`).remove();
                },
            });
        })
    });

    document.querySelectorAll('#holiday .editState .fa-times').forEach((time)=>{
        time.addEventListener('click',(e)=>{
            let id = e.target.parentElement.id;
            $.ajax({
                type:'POST',
                url:'/removeholidays',
                data:{_token : csrf_token, id : id},
                success:function(){
                    e.target.parentElement.remove();
                    document.querySelector(`#holiday_d${id}`).remove();
                },
            });
        })
    });
    
    document.querySelectorAll('#music .editState .fa-times').forEach((time)=>{
        time.addEventListener('click',(e)=>{
            let id = e.target.parentElement.id;
            $.ajax({
                type:'POST',
                url:'/removemusic',
                data:{_token : csrf_token, id : id},
                success:function(){
                    e.target.parentElement.remove();
                    document.querySelector(`#music_d${id}`).remove();
                },
            });
        })
    });
    
    document.querySelectorAll('#hobbyForm .editState .fa-times').forEach((time)=>{
        time.addEventListener('click',(e)=>{
            let id = e.target.parentElement.id;
            $.ajax({
                type:'POST',
                url:'/removehobbie',
                data:{_token : csrf_token, id : id},
                success:function(){
                    e.target.parentElement.remove();
                    document.querySelector(`#hobby_d${id}`).remove();
                },
            });
        })
    });
    
    
})
