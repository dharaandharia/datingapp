$(document).ready(()=>{

    document.addEventListener('click', (e)=>{
        list = document.querySelector('#pMenu').classList;
        if(list.contains('show')){
            list.remove('show');
        }
    })

    document.querySelector('.fa-bars').addEventListener('click',(e)=>{
        e.target.classList.add('d-none');
        document.querySelector('.fa-times').classList.remove('d-none');
        document.querySelector('.nav-rest').classList.remove('d-none');
        document.querySelector('.content').classList.add('d-none');
    })
    
    document.querySelector('.fa-times').addEventListener('click',(e)=>{
        e.target.classList.add('d-none');
        document.querySelector('.fa-bars').classList.remove('d-none');
        document.querySelector('.nav-rest').classList.add('d-none');
        document.querySelector('.content').classList.remove('d-none');
    })
})