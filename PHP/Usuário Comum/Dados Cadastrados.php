<?php
    require_once '../Connections BD/verify-session.php';
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto Mono' rel='stylesheet'>
    <link rel="stylesheet" href="../../CSS/materialize.min.css">
    <link rel="stylesheet" href="../../CSS/css-principal.css">

    <title>Dados Cadastrados</title>
</head>
<body class="grey lighten-5">
    <header>
        <div class="row">
            <div id="top-nav" class="col l12 m12 s12 red darken-2">
                <div class="container">
                    <a href="../Sair.php" class="right">Sair</a> 
                </div>
            </div>

            <div id="bot-nav" class="col l12 m12 s12 white z-depth-2">
                <div class="container">
                    <a href="Home.php"><img id="brand-logo" class="left" src="../../Images/telecall-logo.png"></a>
                    <a href="Home.php" class="bot-nav_links right">Home</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div id="sign-up-principal" class="row">
            <div class="container content white z-depth-1">
                <div class="row">
                    <form id="form-update" method="POST" action="../Connections BD/update-BD.php" class="col l12 m12 s12">
                        <div class="row">
                            <div id="required-text" class="col l12 m12 s12"><p>*Campos obrigatórios</p></div>
    
                            <div class="input-field col l4 m6 s12">
                                <input placeholder="Digite seu nome" id="first-name" name="first-name" type="text" class="validate input-form required form-update" value="<?php echo $_SESSION['usuario']['nome']?>" disabled>
                                <label for="first-name">*Nome</label>
                            </div>
    
                            <div class="input-field col l4 m6 s12">
                                <input id="last-name" name="last-name" type="text" class="validate input-form required form-update" value="<?php echo $_SESSION['usuario']['sobrenome']?>" disabled>
                                <label for="last-name">*Sobrenome</label>
                            </div>
    
                            <div class="input-field col l4 m6 s12">
                                <input id="birth-date" name="birth-date" type="date" class="validate input-form form-update" min="1900-01-01" max="2022-12-31" value="<?php echo $_SESSION['usuario']['nascimento']?>" disabled>
                                <label for="birth-date">*Data de Nascimento</label>
                            </div>
    
                            <div class="input-field col l3 m6 s12">
                                <input placeholder="000.000.000 00" id="cpf" name="cpf" type="text" class="validate input-form required form-update" value="<?php echo $_SESSION['usuario']['cpf']?>" disabled>
                                <label for="cpf">*CPF</label>
                            </div>
    
                            <div class="input-field col l4 m6 s12">
                                <input id="email" name="email" type="email" class="validate input-form required form-update" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $_SESSION['usuario']['email']?>" disabled>
                                <label for="email" data-position="bottom" data-tooltip="O email deve conter '@' e um domínio válido" class="tooltipped">*E-mail</label>
                            </div>
    
                            <div class="input-field col l3 m6 s12">
                                <input id="mothers-name" name="mothers-name" type="text" class="validate input-form required form-update" value="<?php echo $_SESSION['usuario']['nome_mãe']?>" disabled>
                                <label for="mothers-name">*Nome da mãe</label>
                            </div>
    
                            <div class="input-field col l2 m6 s12">
                                <input id="cep" name="cep" type="text" class="validate input-form required form-update" value="<?php echo $_SESSION['usuario']['cep']?>" disabled>
                                <label for="cep">*CEP</label>
                            </div>
    
                            <div class="input-field col l3 m6 s12">
                                <input placeholder="Rua" id="street" name="street" type="text" class="validate input-form form-update" value="<?php echo $_SESSION['usuario']['rua']?>" disabled>
                            </div>
    
                            <div class="input-field col l2 m6 s12">
                                <input id="address-number" name="address-number" type="text" class="validate input-form form-update" value="<?php echo $_SESSION['usuario']['numero']?>" disabled>
                                <label for="address-number">Número</label>
                            </div>
    
                            <div class="input-field col l5 m6 s12">
                                <input id="address2" name="address2" type="text" class="validate input-form form-update" value="<?php echo $_SESSION['usuario']['complemento']?>" disabled>
                                <label for="address2">Complemento</label>
                            </div>
    
                            <div class="input-field col l2 m6 s12">
                                <input placeholder="Bairro" id="district" name="district" type="text" class="validate input-form form-update" value="<?php echo $_SESSION['usuario']['bairro']?>" disabled>
                            </div>
    
                            <div class="input-field col l3 m6 s12">
                                <input placeholder="Cidade" id="city" name="city" type="text" class="validate input-form form-update" value="<?php echo $_SESSION['usuario']['cidade']?>" disabled>
                            </div>
    
                            <div class="input-field col l1 m6 s12">
                                <input placeholder="UF" id="uf" name="uf" type="text" class="validate input-form form-update" value="<?php echo $_SESSION['usuario']['uf']?>" disabled>
                            </div>
    
                            <div class="input-field col l4 m6 s12">
                                <input placeholder="(00) 00000 0000" id="cellphone" name="cellphone" type="tel" class="validate input-form form-update" value="<?php echo $_SESSION['usuario']['celular']?>" disabled>
                                <label for="cellphone">*Celular</label>
                            </div>
    
                            <div class="input-field col l4 m6 s12">
                                <input placeholder="(00) 0000 0000" id="phone" name="phone" type="text" class="validate input-form form-update" value="<?php echo $_SESSION['usuario']['telefone_fixo']?>" disabled>
                                <label for="phone">Telefone Fixo</label>
                            </div>
    
                            <div class="input-field col l3 m6 s12">
                                <input id="user-name" name="user-name" type="text" class="validate input-form required form-update" value="<?php echo $_SESSION['usuario']['nome_usuario']?>" disabled>
                                <label for="user-name" data-position="bottom" data-tooltip="Apenas os caracteres especiais - e _ são permitidos" class="tooltipped">*Nome de Usuário</label>
                            </div>
    
                            <div class="input-field col l4 m6 s12">
                                <input id="password" name="password" type="password" class="validate input-form required form-update" minlength="6" disabled>
                                <label for="password" data-position="bottom" data-tooltip="A senha deve conter no mínimo 6 caracteres" class="tooltipped">*Senha</label>
                            </div>
    
                            <div class="input-field col l4 m6 s12">
                                <input id="repeat-password" name="repeat-password" type="password" class="validate input-form required form-update" disabled>
                                <label for="repeat-password" data-position="bottom" data-tooltip="A senha deve ser a mesma" class="tooltipped">*Confirmar Senha</label>
                            </div>
                        </div>
                    </form>
                    <div id="buttons-div" class="col l12 m12 s12">
                        <button id="cancel-update" class="waves-effect waves-black btn-flat red white-text col s3" disabled>Cancelar</button>
                        <button id="form-edit" class="waves-effect waves-black btn-flat yellow black-text col s3">Editar Dados</button>
                        <button type="submit" form="form-update" id="confirm-form-update" class="waves-effect waves-black btn-flat green white-text col s3" disabled>Atualizar dados</button>
                        <button id="exclude" class="waves-effect waves-black btn-flat red white-text col s3">Excluir Cadastro</button>
                        <button id="confirm-exclude" class="waves-effect waves-black btn-flat red white-text col s3"><a id="exclude-confirm-link" class="white-text" href="../Connections BD/exclude-BD.php">Confirmar Exclusão</a></button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../../Javascript/jquery-3.6.0.min.js"></script>
    <script src="../../Javascript/materialize.min.js"></script>
    <script src="../../Javascript/javascript-principal.js"></script>
    <script src="../../Javascript/form-validate.js"></script>

    <script>
        $('#form-edit').click(function(){
            $('.form-update').prop("disabled", false);
            $(this).prop("disabled", true);
            $('#cancel-update').prop("disabled", false);
            $('#confirm-form-update').prop("disabled", false);
        });

        $('#cancel-update').click(function(){
            $(this).prop("disabled", true);
            $('.form-update').prop("disabled", true);
            $('#form-edit').prop("disabled", false);
            $('#confirm-form-update').prop("disabled", true);
        });

        $('#exclude').click(function(){
            $(this).hide();
            $('#confirm-exclude, #exclude-confirm-link').show();
        });

        $('#repeat-password').blur(function(){
        if($(this).val() != $('#password').val()){
            $('#confirm-form-update').prop("disabled", true);
            M.toast({html: 'As senhas não correspondem', classes: 'rounded'});
        } else{
            $('#confirm-form-update').prop("disabled", false);
        }
        }); 
    </script>
</body>
</html>