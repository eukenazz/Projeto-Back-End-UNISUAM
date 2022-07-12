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

    <title>Home</title>
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
                    <a href="Dados Cadastrados.php" class="bot-nav_links right">Dados Cadastrados</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="row">
            <div class="container">
                <div class="col l12 m12 s12 content white z-depth-1 center-align">
                    <h4>Bem vindo,  <?php echo $_SESSION['usuario']['nome']?>!</h4><br>
                    <p class="body-text">Acompanhe seus dados cadastrados <a href="Dados Cadastrados.php">aqui</a>.</p>
                </div>
            </div>
        </div>
    </main>

    <script src="../../Javascript/jquery-3.6.0.min.js"></script>
    <script src="../../Javascript/materialize.min.js"></script>
    <script src="../../Javascript/javascript-principal.js"></script>
    <script src="../../Javascript/sweetalert.min.js"></script>

    <script>
        swal({
            title: "Olá!", 
            text: "Bem vindo, <?php echo $_SESSION['usuario']['nome']?>",
            icon: "success", 
            button: "Ir para Home"});
    </script>
</body>
</html>