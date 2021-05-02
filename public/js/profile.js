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

    function editState(e){
        e.target.classList.add('d-none');
        let id = e.target.parentElement.parentElement.parentElement.id;
        document.querySelector(`#${id} .showState`).classList.add('d-none');
        document.querySelector(`#${id} .editState`).classList.remove('d-none');
        e.target.nextElementSibling.classList.remove('d-none');
    }

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

    document.querySelectorAll('#favoriteDrink .editState .fa-times').forEach((time)=>{
        time.addEventListener('click',(e)=>{
            let id = e.target.parentElement.id;
            $.ajax({
                type:'POST',
                url:'/removefavoritedrink',
                data:{_token : csrf_token, id : id},
                success:function(){
                    e.target.parentElement.remove();
                    document.querySelector(`#favorite_d${id}`).remove();
                },
            });
        })
    });
})