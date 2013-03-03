$(document).ready(function(){
    $('input[type=button]').button();
    //    $('textarea').wysihtml5();

    $('#buttonLogout').click(function(){
        $(location).attr('href','?mod=index');
    });
});

