const regex = new RegExp('[^ 0-9a-zA-ZàèìòùáéíóúâêîôûãõñÀÈÌÒÙÁÉÍÓÚÂÊÎÔÛÃÕÑ@._\b]', 'g');

$(document).ready(function(){
    //Tratar os dados digitados no 2FA apenas se o campo for texto
    if($('#twofa').attr('type') == 'text'){
        $('.required').keyup(function(){
            $(this).val($(this).val().replace(regex, ''));
        });
    }
});