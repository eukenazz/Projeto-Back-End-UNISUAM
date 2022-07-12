<?php 
    session_start();
    if ($_SESSION['usuario']['tipo_usuario'] != 'admin' ) {
        session_unset();
        session_destroy();
        return header('location: ../../Páginas HTML/Alertas/Error-session.html');
}
    require_once 'consulta-BD-admin.php';

    $dados_cadastro = $sql;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto Mono' rel='stylesheet'>
    <link rel="stylesheet" href="../../CSS/materialize.min.css">
    <link rel="stylesheet" href="../../CSS/css-principal.css?v=<?php echo time(); ?>">

    <title>Dashboard</title>
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
                    <a href="Logs Admin.php" class="right bot-nav_links hide-on-med-and-down">Logs</a>
                    <a href="#" data-target="slide-out" class="sidenav-trigger right hide-on-large-only"><i class="material-icons">menu</i></a>
                    <div>
                        <ul id="slide-out" class="sidenav hide-on-large-only">
                            <li><a class="center-align" href="Home Admin.php">Home</a></li>
                            <li><a class="center-align" href="Logs Admin.php">Logs</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main id="dashboard-admin">
        <div class="row">
            <div class="container col l12 m12 s12">
                <table class="highlight centered responsive-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Sobrenome</th>
                            <th>Nascimento</th>
                            <th>CPF</th>
                            <th>Email</th>
                            <th>Mãe</th>
                            <th>CEP</th>
                            <th>Rua</th>
                            <th>Número</th>
                            <th>Complemento</th>
                            <th>Bairro</th>
                            <th>Cidade</th>
                            <th>UF</th>
                            <th>Celular</th>
                            <th>Telefone</th>
                            <th>Usuário</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                              while($dados_cadastro = $sql -> fetch(PDO::FETCH_ASSOC)){
                                echo "<tr>";
                                echo "<td>".$dados_cadastro['id']."</td>";
                                echo "<td>".$dados_cadastro['nome']."</td>";
                                echo "<td>".$dados_cadastro['sobrenome']."</td>";
                                echo "<td>".$dados_cadastro['nascimento']."</td>";
                                echo "<td>".$dados_cadastro['cpf']."</td>";
                                echo "<td>".$dados_cadastro['email']."</td>";
                                echo "<td>".$dados_cadastro['nome_mãe']."</td>";
                                echo "<td>".$dados_cadastro['cep']."</td>";
                                echo "<td>".$dados_cadastro['rua']."</td>";
                                echo "<td>".$dados_cadastro['numero']."</td>";
                                echo "<td>".$dados_cadastro['complemento']."</td>";
                                echo "<td>".$dados_cadastro['bairro']."</td>";
                                echo "<td>".$dados_cadastro['cidade']."</td>";
                                echo "<td>".$dados_cadastro['uf']."</td>";
                                echo "<td>".$dados_cadastro['celular']."</td>";
                                echo "<td>".$dados_cadastro['telefone_fixo']."</td>";
                                echo "<td>".$dados_cadastro['nome_usuario']."</td>";
                                echo "</tr>";
                              };
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