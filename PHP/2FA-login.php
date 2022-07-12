<?php
    require_once 'Connections BD/verify-session.php';
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
    <link rel="stylesheet" href="../CSS/materialize.min.css">
    <link rel="stylesheet" href="../CSS/css-principal.css">

    <title>Login</title>
</head>
<body class="grey lighten-5">
    <header>
        <div class="row">
            <div id="top-nav" class="col l12 m12 s12 red darken-2">
                <div class="container">
                    <a href="../Páginas HTML/Login.html">Login</a>
                    <span>|</span>
                    <a href="../Páginas HTML/Cadastre-se.html">Cadastre-se</a>
                </div>
            </div>

            <div id="bot-nav" class="col l12 m12 s12 white z-depth-2">
                <div class="container">
                    <a href="../index.html"><img id="brand-logo" class="left" src="../Images/telecall-logo.png"></a>
                </div>
            </div>
        </div>
    </header>

    <main>

        <div class="row">
            <div id="login-div" class="container">
                <div class="col l7 m7 s12 offset-l2 offset-m2 content white z-depth-1">
                    <form id="twofa-login" action="Connections BD/2FA-login-BD.php" method="POST" class="col l12" style="padding-bottom: 15px;">
                        <div class="input-field col l12">
                            <input name="twofa" id="twofa" <?php echo $_SESSION['type_insert']?> class="validate login-form required" required>
                            <label for="twofa"><?php echo $_SESSION['msg']?></label>
                        </div>
                        <button type="submit" form="twofa-login" id="twofa-button" class="waves-effect waves-black btn-flat blue darken-1 white-text col l3 right">Confirmar</button>
                        <button type="button" id="twofa-cancel" class="waves-effect waves-black btn-flat red darken-1 white-text col l3 right">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    
    </main>

    <script src="../Javascript/jquery-3.6.0.min.js"></script>
    <script src="../Javascript/materialize.min.js"></script>
    <script src="../Javascript/javascript-principal.js"></script>
    <script src="../Javascript/2fa-validate.js"></script>

    <script>
        $('#twofa-cancel').click(function(){
            window.location.href = "../Páginas HTML/Alertas/Error-2FA.html";
        });
    </script>
</body>
</html>