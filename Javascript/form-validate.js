//Constante para validar os caracteres dos inputs
const regex = new RegExp('[^ 0-9a-zA-ZàèìòùáéíóúâêîôûãõñÀÈÌÒÙÁÉÍÓÚÂÊÎÔÛÃÕÑ@._\b]', 'g');

$(document).ready(function(){

    //Funções para busca do CEP utilizando o ViaCEP e para esclusão em caso de erro
    function clear_form_cep() {
        $("#street").val("");
        $("#address2").val("");
        $("#district").val("");
        $("#city").val("");
        $("#uf").val("");
    }

    $("#cep").blur(function() {
        var cep = $(this).val().replace(/\D/g, '');

        if (cep != "") {

            var validacep = /^[0-9]{8}$/;

            if(validacep.test(cep)) {

                $("#street").val("...");
                $("#district").val("...");
                $("#city").val("...");
                $("#uf").val("...");

                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        $("#street").val(dados.logradouro);
                        $("#district").val(dados.bairro);
                        $("#city").val(dados.localidade);
                        $("#uf").val(dados.uf);
                    }
                    else {
                        clear_form_cep();
                        M.toast({html: 'CEP não encontrado', classes: 'rounded'});
                    }
                });
            }
            else {
                clear_form_cep();
                M.toast({html: 'Digite um CEP válido', classes: 'rounded'});
            }
        }
        else {
            clear_form_cep();
        }
    });

    // Apagar os dados preenchidos no formulário ao clicar em cancelar
    $('#cancel_sign-up, #cancel-login').click(function(){
       $('.input-form, .login-form').val("");
    });

    //Impedir digitação de caracteres não permitidos
    $('.required').keyup(function(){
      $(this).val($(this).val().replace(regex, ''));
    });

    //Validação básica para retornar mensagem definindo data mínima e máxima
    $('#birth-date').blur(function(){
        if($(this).val() > "2022-12-31") {
            M.toast({html: 'Digite uma data de nascimento válida', classes: 'rounded'});
            $(this).focus();
        }
        else if($(this).val() < "1900-01-01"){
            M.toast({html: 'Digite uma data de nascimento válida', classes: 'rounded'});
            $(this).focus();
        };
    });

    //Máscaras para pré-digitação de campos
    $('#cpf').mask('000.000.000 00', {reverse: true});
    $('#cep').mask('00.000 000', {reverse: true});
    $('#cellphone').mask('(00) 00000 0000');
    $('#phone').mask('(00) 0000 0000');


    //Impossibilitar o prosseguimento na solicitação de cadastro, caso as senhas informadas não coincidirem
    $('#sign-up').click(function(){
        if($('#password').val() != $('#repeat-password').val()){
            $('#sign-up').prop("disabled", true);
            M.toast({html: 'As senhas não correspondem', classes: 'rounded'});
            $('#repeat-password').focus();
        }
    });
    $('#repeat-password').blur(function(){
        if($(this).val() != $('#password').val()){
            $('#sign-up').prop("disabled", true);
            M.toast({html: 'As senhas não correspondem', classes: 'rounded'});
        } else{
            $('#sign-up').prop("disabled", false);
        }
    }); 

});