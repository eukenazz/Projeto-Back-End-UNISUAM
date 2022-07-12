<?php
    require_once 'Connections BD/init-BD.php';
    require_once 'Connections BD/verify-session.php';
    
    $PDO = connect_bd();

    $tipo_evento = 'Logout';
    $tipo_autenticacao = '';
    $stats = 'Sucesso';

    $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
    :tipo_autenticacao, :stats, NOW())");
    $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
    $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
    $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
    $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
    $insert_log_success->bindParam(':stats', $stats);
    $insert_log_success->execute();

    if($insert_log_success){
        session_unset();
        session_destroy();
        header("Location:../Páginas HTML/Alertas/Logout.html");
        exit;
    }
?>