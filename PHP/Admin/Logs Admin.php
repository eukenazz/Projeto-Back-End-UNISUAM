<?php 
    session_start();
    if ($_SESSION['usuario']['tipo_usuario'] != 'admin' ) {
        session_unset();
        session_destroy();
        return header('location: ../../Páginas HTML/Alertas/Error-session.html');
}
    require_once 'consulta-BD-admin.php';

    $dados_logs = $logs;
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

    <title>Logs</title>
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
                    <a href="Home Admin.php"><img id="brand-logo" class="left" src="../../Images/telecall-logo.png"></a>
                    <a href="Home Admin.php" class="right bot-nav_links hide-on-med-and-down">Home</a>
                    <a href="Dashboard Admin.php" class="right bot-nav_links hide-on-med-and-down">Dashboard</a>
                    <a href="#" data-target="slide-out" class="sidenav-trigger right hide-on-large-only"><i class="material-icons">menu</i></a>
                    <div>
                        <ul id="slide-out" class="sidenav hide-on-large-only">
                            <li><a class="center-align" href="Home Admin.php">Home</a></li>
                            <li><a class="center-align" href="Dashboard Admin.php">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="row">
            <div class="container col l12 m12 s12">
                <table class="highlight centered responsive-table">
                    <thead>
                        <tr>
                            <th>id_usuario</th>
                            <th>nome_usuario</th>
                            <th>tipo_evento</th>
                            <th>tipo_autenticacao</th>
                            <th>status</th>
                            <th>data do evento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($dados_logs = $logs -> fetch(PDO::FETCH_ASSOC)){
                            echo "<tr>";
                            echo "<td>".$dados_logs['id_usuario']."</td>";
                            echo "<td>".$dados_logs['nome_usuario']."</td>";
                            echo "<td>".$dados_logs['tipo_evento']."</td>";
                            echo "<td>".$dados_logs['tipo_autenticacao']."</td>";
                            echo "<td>".$dados_logs['stats']."</td>";
                            echo "<td>".$dados_logs['data_evento']."</td>";
                            echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    
    </main>

    <script src="../../Javascript/jquery-3.6.0.min.js"></script>
    <script src="../../Javascript/materialize.min.js"></script>
    <script src="../../Javascript/javascript-principal.js"></script>
    <script src="../../Javascript/sweetalert.min.js"></script>
</body>
</html>