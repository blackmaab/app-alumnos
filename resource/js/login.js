$(document).ready(function(){
    $('#buttonEntrar').click(function(){
        user=$('#txtUsuario').val();
        pass=$('#txtPassword').val();
        
        
        if(user=="admin" && pass=="admin"){
            alert("Bienvenido administrador");
            $(location).attr('href','?mod=admin');
        }else if(user=="secretaria" && pass=="secreteria"){
            
        }else if(user=="alumno" && pass=="alumno"){
            
        }else if(user=="profesor" && pass=="profesor"){
            
        }
    });
    
    
});

