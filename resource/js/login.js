$(document).ready(function(){
    $('#buttonEntrar').click(function(){
        user=$('#txtUsuario').val();
        pass=$('#txtPassword').val();
        
        
        if(user=="admin" && pass=="admin"){
            alert("Bienvenido administrador");
            $(location).attr('href','?mod=admin');
        }else if(user=="secretaria" && pass=="secretaria"){
            alert("Bienvenido secretaria");
            $(location).attr('href','?mod=secre');
        }else if(user=="alumno" && pass=="alumno"){
            alert("Bienvenido alumno");
            $(location).attr('href','?mod=alum');
            
        }else if(user=="profesor" && pass=="profesor"){
            alert("Bienvenido profesor");
            $(location).attr('href','?mod=prof');
        }else{
            alert("Usuario no encontrado");            
        }
    });
    $('#txtPassword').keypress(function(e){
        valor=e.which;
        //console.log(e.which + ": " + String.fromCharCode(e.which));
        if(valor==13){
            $('#buttonEntrar').trigger('click');
        }
    });
    
    $('#btnNewRegister').click(function(){
        $(location).attr('href','?mod=newRegister');
    });
    
    
    /*RECUPERAR CONTRASEÑA*/
    $('#btnRecuperarPassword').click(function(){            
        $('.divRecoperarPass').dialog({
            title:'Recuperar Contraseña',
            show:'slow',
            width:570,
            height:120,
            resizable: false,
            modal: true
        });
    });
    $('#btnRecuperarPass').button();
    $('#btnRecuperarPass').click(function(){
        alert('Se ha enviado a su correo una nueva contraseña');
        $( '.divRecoperarPass' ).dialog( 'destroy' );
    });
    
     	

    $(document).tooltip();
});

