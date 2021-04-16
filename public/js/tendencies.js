$(document).ready(()=>{


    document.querySelector('#iam0').addEventListener('click', ()=>{
        select('iam0');
    });
    document.querySelector('#iam1').addEventListener('click', ()=>{
        select('iam1');
    });
    document.querySelector('#iam2').addEventListener('click', ()=>{
        select('iam2');
    });
    document.querySelector('#for0').addEventListener('click', ()=>{
        select('for0');
    });
    document.querySelector('#for1').addEventListener('click', ()=>{
        select('for1');
    });
    document.querySelector('#for2').addEventListener('click', ()=>{
        select('for2');
    });

    document.querySelector('#from').addEventListener('focus',()=>{
        let msg = document.querySelector('#rangeMsg');
        if(msg){
          if(!msg.classList.contains('ease')){
            msg.classList.add('ease');
          }
        }
    });

    document.querySelector('#to').addEventListener('focus',()=>{
        let msg = document.querySelector('#rangeMsg');
        if(msg){
          if(!msg.classList.contains('ease')){
            msg.classList.add('ease');
          }
        }
    });

})


function select(field){
    removeErrorMessage(field);
    if (document.querySelector('.'+field.slice(0,3)+' > div.selected')){
        // if there was already a selected field.
        if(!document.querySelector('#'+field).classList.contains('selected')){
            // if this field is not the selected before, else do nothing.
            document.querySelector('.'+field.slice(0,3)+' > div.selected').classList.remove('selected');
            document.querySelector('#'+field).classList.add('selected');
            if(field.slice(0,3)==='iam'){
                // change form value if iam field.
                document.querySelector('#setForm').elements[1].value= parseInt(field.slice(3,4));
            }else{
                // change form value if for field.
                document.querySelector('#setForm').elements[2].value= parseInt(field.slice(3,4));
            }
        }
    }else{
        removeErrorMessage(field);
        // if there is no selected field .
        document.querySelector('#'+field).classList.add('selected');
        if(field.slice(0,3)==='iam'){
            // change form value if iam field.
            document.querySelector('#setForm').elements[1].value= parseInt(field.slice(3,4));
        }else{
            // change form value if for field.
            document.querySelector('#setForm').elements[2].value= parseInt(field.slice(3,4));
        }
    }

}

function removeErrorMessage(field){
    if(field.slice(0,3)==='iam'){
        // removing iam error message if exist.
        let msg = document.querySelector('#iamMsg');
        if(msg){
            if(!msg.classList.contains('ease')){
                msg.classList.add('ease');
            }
        }
    }else{
        // removing for error message if exist.
        let msg = document.querySelector('#forMsg');
        if(msg){
            if(!msg.classList.contains('ease')){
                msg.classList.add('ease');
            }
        }
    }
}