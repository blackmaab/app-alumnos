$(document).ready(function(){
   
    function editorTextarea(idt){
        if($("#"+idt).length){
            var editor = new TINY.editor.edit('editor', {
                id: idt,
                width: 584,
                height: 175,
                cssclass: 'tinyeditor',
                controlclass: 'tinyeditor-control',
                rowclass: 'tinyeditor-header',
                dividerclass: 'tinyeditor-divider',
                controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
                'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
                'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'n',
                'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'],
                //footer: true,
                fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
                xhtml: true,            
                bodyid: 'editor',
                footerclass: 'tinyeditor-footer',
                toggle: {
                    text: 'Ver HTML', 
                    activetext: 'Ocultar HTML', 
                    cssclass: 'toggle'
                },
                resize: {
                    cssclass: 'none'
                }
            });
        }
    }
    
    
    function rangeDate(idStart,idEnd){
        $( idStart).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            showOn: "button",
            buttonImage: "resource/images/calendar.png",
            buttonImageOnly: true,
            numberOfMonths: 1,
            onClose: function( selectedDate ) {
                $( idEnd ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( idEnd ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            showOn: "button",
            buttonImage: "resource/images/calendar.png",
            buttonImageOnly: true,
            numberOfMonths: 1,
            onClose: function( selectedDate ) {
                $( idStart ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    }
    
    function date(id){
        $( id ).datepicker({
            showOn: "button",
            buttonImage: "resource/images/calendar.png",
            buttonImageOnly: true
        });
    }
    
    $('input[type=button]').button();
    $(document).tooltip(); 

    $('#buttonLogout').click(function(){
        $(location).attr('href','?mod=index');
    });
    

    editorTextarea('txtContenido');
    editorTextarea('txtDireccionPer');
    editorTextarea('txtLugarEstudioPer');
    editorTextarea('txtExperienciaLaboralPer');
    rangeDate('#txtFechaInicio', '#txtFechaFin');
    
    date('#txtFechaNacimientoPer');
   
    /*FORMULARIO PERSONAS*/
    $('#cmbTipoPer').change(function(){
        if($(this).val()!=3){
            $('#divAcademico').hide();
            $('#divLaboral').show();
        }else{
            $('#divAcademico').show();
            $('#divLaboral').hide();
        }
    });
    
    $('#btnBuscarAlum').click(function(){        
        $('#divResultado').show();
    });
    
    $('#btnSeleccionar').click(function(){
        $('#divPagos').show();
    });
    
    $('#btnBuscarAlumCur').click(function(){
        $('#divResultado').show();
    });
    
    $('#btnSeleccionar0').click(function(){
        $('#divPagos').show();
    });
    
    $('#lstCurso').click(function(){
        $('#divAgregarCurso').show();
    });
    
    $('#btnRegistrarsePer').click(function(){
        $(location).attr('href','?mod=alum');
    });
    
    $('#buttonCredencialesAlumno').click(function(){
        $(location).attr('href','?mod=alumCredenciales');
    });
    
    $('#buttonCredencialesProfesor').click(function(){
        $(location).attr('href','?mod=profCredenciales');
    });
    
    $('#buttonCredencialesSecretaria').click(function(){
        $(location).attr('href','?mod=secreCredenciales');
    });
    
    $('#buttonCredencialesAdmin').click(function(){
        $(location).attr('href','?mod=adminCredenciales');
    });
    
    $('#btnBuscarUsu').click(function(){
        $('#divResultado').show();
    });
    
    /*BUSQUEDA DE CURSOS*/
    $('#btnBuscarCur').click(function(){        
        $('.divFormBuscarCurso').dialog({
            title:'Busqueda de Cursos',
            show:'slow',
            width:700,
            height:400,
            resizable: false,
            modal: true
        });
    });
    
    $('#btnBuscarCursos').click(function(){
        $('#divResultadoBusquedaCurso').show();
    });
    
    $('.btnSeleccionarCurso').click(function(){
        row=$(this).parents().map(function(){          
            return this.id;
        });
        
        $('#'+row[1]).children("td").each(function (index) {
            console.log($(this).text());
            if(index==1){
                $('#txtTitulo').attr('value',$(this).text());
            }
            if(index==2){
                $('#txtFechaInicio').attr('value',$(this).text());
            }
            if(index==3){
                $('#txtFechaFin').attr('value',$(this).text());
            }
        });
        $('#txtContenido').text('TEXTO DE PRUEBA');        
                
        $( '.divFormBuscarCurso' ).dialog( 'destroy' );
    })
    
    
    /*GENERAR REPORTES DEL MODULO DE LA SECRETARIA*/
    $('#btnMostrarReportSecre').click(function(){
        filter=$('#cmbFiltroReporte').val();
        $('#divResultadoFicha').hide();
        $("#divResultado").hide();
        if(filter==1){
            pdf='<object height="550px" width="100%" type="application/pdf" data="resource/docs/alumnos_inscritos_curso.pdf">';
            pdf+='<param value="alumnos_inscritos_curso.pdf" name="src"/>';
            pdf+='<param value="transparent" name="wmode"/>';
            pdf+='</object>';            
            $("#divResultado").html(pdf);
            $("#divResultado").show();
        }else if(filter==2){            
            $('#divResultadoFicha').show();
        }else if(filter==3){
            pdf='<object height="550px" width="100%" type="application/pdf" data="resource/docs/cuadro_calificaciones.pdf">';
            pdf+='<param value="alumnos_inscritos_curso.pdf" name="src"/>';
            pdf+='<param value="transparent" name="wmode"/>';
            pdf+='</object>';            
            $("#divResultado").html(pdf);
            $("#divResultado").show();
        }else{
            pdf='<object height="550px" width="100%" type="application/pdf" data="resource/docs/total_ingresos.pdf">';
            pdf+='<param value="alumnos_inscritos_curso.pdf" name="src"/>';
            pdf+='<param value="transparent" name="wmode"/>';
            pdf+='</object>';            
            $("#divResultado").html(pdf);
            $("#divResultado").show();
        }
    });
    
    $('#cmbFiltroReporte').change(function(){
        val=$(this).val();
        if(val==1 || val==3){            
            $('#cmbFiltroCurso').show();
            $('#tdAlumno').hide();
            $('#tdTexto').text('Seleccione el curso:');
        }else if(val==2){
            $('#tdTexto').text('Digite el carnet del alumno:');
            $('#tdAlumno').show();
            $('#cmbFiltroCurso').hide();
        }else{
            $('#tdTexto').hide();
            $('#tdAlumno').hide();
            $('#cmbFiltroCurso').hide();
        }
    });
});

