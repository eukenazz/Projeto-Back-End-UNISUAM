<?php
    require_once 'init-BD.php';
    session_start();

    $nome_usuario = $_POST['user'];
    $senha = sha1($_POST['user-password']);

    $PDO = connect_bd();

    $sql = $PDO->prepare("SELECT * FROM usuario WHERE nome_usuario = :nome_usuario AND senha = :senha");
    $sql->bindParam(':nome_usuario', $nome_usuario);
    $sql->bindParam(':senha', $senha);
    $sql->execute();
    $dados_usuario = $sql->fetch(PDO::FETCH_ASSOC);

    if(!empty($dados_usuario)){

        $_SESSION['usuario'] = $dados_usuario;

        $type_insert = '';
        $msg = '';
        $random = rand(1,5);

        switch($random){
            case 1:
                $type_insert = 'type="text"';
                $msg = 'Digite os 3 primeiros números do seu CPF';
                $_SESSION['type_insert'] = $type_insert;
                $_SESSION['msg'] = $msg;
                $_SESSION['random'] = $random;

                $tipo_evento = 'Tentativa de Login';
                $tipo_autenticacao = '3 Primeiros Numeros CPF';
                $stats = 'Autenticando';

                $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
                :tipo_autenticacao, :stats, NOW())");
                $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
                $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
                $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
                $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
                $insert_log_success->bindParam(':stats', $stats);
                $insert_log_success->execute();

                header("Location:../2FA-login.php");
                break;
            case 2:
                $type_insert = 'type="text"';
                $msg = 'Digite os 3 últimos números do seu CPF';
                $_SESSION['type_insert'] = $type_insert;
                $_SESSION['msg'] = $msg;
                $_SESSION['random'] = $random;

                $tipo_evento = 'Tentativa de Login';
                $tipo_autenticacao = '3 Ultimos Numeros CPF';
                $stats = 'Autenticando';

                $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
                :tipo_autenticacao, :stats, NOW())");
                $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
                $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
                $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
                $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
                $insert_log_success->bindParam(':stats', $stats);
                $insert_log_success->execute();

                header("Location:../2FA-login.php");
                break;
            case 3:
                $type_insert = 'type="text"';
                $msg = 'Digite o número do seu celular';
                $_SESSION['type_insert'] = $type_insert;
                $_SESSION['msg'] = $msg;
                $_SESSION['random'] = $random;

                $tipo_evento = 'Tentativa de Login';
                $tipo_autenticacao = 'Numero Celular';
                $stats = 'Autenticando';

                $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
                :tipo_autenticacao, :stats, NOW())");
                $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
                $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
                $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
                $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
                $insert_log_success->bindParam(':stats', $stats);
                $insert_log_success->execute();

                header("Location:../2FA-login.php");
                break;
            case 4:
                $type_insert = 'type="date"';
                $msg = 'Digite sua data de nascimento';
                $_SESSION['type_insert'] = $type_insert;
                $_SESSION['msg'] = $msg;
                $_SESSION['random'] = $random;

                $tipo_evento = 'Tentativa de Login';
                $tipo_autenticacao = 'Data Nascimento';
                $stats = 'Autenticando';

                $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
                :tipo_autenticacao, :stats, NOW())");
                $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
                $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
                $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
                $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
                $insert_log_success->bindParam(':stats', $stats);
                $insert_log_success->execute();

                header("Location:../2FA-login.php");
                break;
            case 5:
                $type_insert = 'type="text"';
                $msg = 'Digite o nome da sua mãe';
                $_SESSION['type_insert'] = $type_insert;
                $_SESSION['msg'] = $msg;
                $_SESSION['random'] = $random;

                $tipo_evento = 'Tentativa de Login';
                $tipo_autenticacao = 'Nome da Mãe';
                $stats = 'Autenticando';

                $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
                :tipo_autenticacao, :stats, NOW())");
                $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
                $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
                $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
                $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
                $insert_log_success->bindParam(':stats', $stats);
                $insert_log_success->execute();

                header("Location:../2FA-login.php");
                break;
        }
        
        header("Location:../2FA-login.php");
    }
    else {
        header('Location:../../Páginas HTML/Alertas/Error-User-Dont-Exists.html');
    }
?>