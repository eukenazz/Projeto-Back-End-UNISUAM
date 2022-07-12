<?php

    if ($_SESSION['usuario']['nome_usuario'] != 'admin' ) {
        return header('location: ../../Páginas HTML/Error-session.html');
    }

    require_once '../Connections BD/init-BD.php';

    $PDO = connect_bd();

    $sql = $PDO->prepare("SELECT * FROM usuario");
    $sql->execute();

    $logs = $PDO->prepare("SELECT * FROM logs");
    $logs->execute();
?>