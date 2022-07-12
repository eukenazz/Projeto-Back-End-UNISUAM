<?php
    require_once 'init-BD.php';
    session_start();

    $s_twofa = $_POST['twofa'];

    function RemoveSpecialChar($str){
  
        $res = preg_replace('/[^a-zA-Z0-9_]/s','',$str);
    
        return $res;
    }
    $twofa = RemoveSpecialChar($s_twofa);

    $PDO = connect_bd();

    $tipo_evento = '';
    $tipo_autenticacao = '';
    $stats = '';

    if($_SESSION['random'] == 1){
        $tipo_evento = 'Login';
        $tipo_autenticacao = '3 Primeiros Numeros CPF';
        $stats = 'Sucesso';

        $sql = $PDO->prepare("SELECT cpf, LEFT(cpf, 3), nome_usuario FROM usuario WHERE LEFT(cpf, 3) = :twofa 
        AND nome_usuario = :nome_usuario");
        $sql->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
        $sql->bindParam(':twofa', $twofa);
        $sql->execute();
        $verify_2fa = $sql->fetch(PDO::FETCH_ASSOC);

        if(!empty($verify_2fa)){
            if($_SESSION['usuario']['tipo_usuario'] == 'admin'){
                $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
                :tipo_autenticacao, :stats, NOW())");
                $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
                $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
                $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
                $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
                $insert_log_success->bindParam(':stats', $stats);
                $insert_log_success->execute();
                header('Location:../Admin/Home Admin.php');
            }
            else{
                $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
                :tipo_autenticacao, :stats, NOW())");
                $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
                $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
                $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
                $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
                $insert_log_success->bindParam(':stats', $stats);
                $insert_log_success->execute();
                header('Location:../Usuário Comum/Home.php');
            }
        }
        else{
            $tipo_evento = 'Login';
            $tipo_autenticacao = '3 Primeiros Numeros CPF';
            $stats = 'Falha';

            $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
            :tipo_autenticacao, :stats, NOW())");
            $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
            $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
            $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
            $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
            $insert_log_success->bindParam(':stats', $stats);
            $insert_log_success->execute();
            
            session_unset();
            session_destroy();
            header('Location:../../Páginas HTML/Alertas/Error-2FA.html');
        }
    }
    else if($_SESSION['random'] == 2){
        $tipo_evento = 'Login';
        $tipo_autenticacao = '3 Ultimos Numeros CPF';
        $stats = 'Sucesso';

        $sql = $PDO->prepare("SELECT cpf, RIGHT(cpf, 3), nome_usuario FROM usuario WHERE RIGHT(cpf, 3) = :twofa 
        AND nome_usuario = :nome_usuario");
        $sql->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
        $sql->bindParam(':twofa', $twofa);
        $sql->execute();
        $verify_2fa = $sql->fetch(PDO::FETCH_ASSOC);

        if(!empty($verify_2fa)){
            if($_SESSION['usuario']['tipo_usuario'] == 'admin'){
                $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
                :tipo_autenticacao, :stats, NOW())");
                $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
                $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
                $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
                $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
                $insert_log_success->bindParam(':stats', $stats);
                $insert_log_success->execute();
                header('Location:../Admin/Home Admin.php');    
            }
            else{
                $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
                :tipo_autenticacao, :stats, NOW())");
                $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
                $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
                $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
                $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
                $insert_log_success->bindParam(':stats', $stats);
                $insert_log_success->execute();
                header('Location:../Usuário Comum/Home.php');
            }
        }
        else{
            $tipo_evento = 'Login';
            $tipo_autenticacao = '3 Ultimos Numeros CPF';
            $stats = 'Falha';

            $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
            :tipo_autenticacao, :stats, NOW())");
            $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
            $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
            $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
            $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
            $insert_log_success->bindParam(':stats', $stats);
            $insert_log_success->execute();

            session_unset();
            session_destroy();
            header('Location:../../Páginas HTML/Alertas/Error-2FA.html');
        }
    }
    else if($_SESSION['random'] == 3){
        $tipo_evento = 'Login';
        $tipo_autenticacao = 'Numero Celular';
        $stats = 'Sucesso';

        $sql = $PDO->prepare("SELECT celular FROM usuario WHERE nome_usuario = :nome_usuario 
        AND celular = :twofa");
        $sql->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
        $sql->bindParam(':twofa', $twofa);
        $sql->execute();
        $verify_2fa = $sql->fetch(PDO::FETCH_ASSOC);

        if(!empty($verify_2fa)){
            if($_SESSION['usuario']['tipo_usuario'] == 'admin'){
                $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
                :tipo_autenticacao, :stats, NOW())");
                $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
                $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
                $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
                $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
                $insert_log_success->bindParam(':stats', $stats);
                $insert_log_success->execute();
                header('Location:../Admin/Home Admin.php');    
            }
            else{
                $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
                :tipo_autenticacao, :stats, NOW())");
                $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
                $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
                $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
                $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
                $insert_log_success->bindParam(':stats', $stats);
                $insert_log_success->execute();
                header('Location:../Usuário Comum/Home.php');
            }
        }
        else{
            $tipo_evento = 'Login';
            $tipo_autenticacao = 'Numero Celular';
            $stats = 'Falha';

            $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
            :tipo_autenticacao, :stats, NOW())");
            $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
            $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
            $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
            $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
            $insert_log_success->bindParam(':stats', $stats);
            $insert_log_success->execute();

            session_unset();
            session_destroy();
            header('Location:../../Páginas HTML/Alertas/Error-2FA.html');
        }
    }
    else if($_SESSION['random'] == 4){
        $tipo_evento = 'Login';
        $tipo_autenticacao = 'Data Nascimento';
        $stats = 'Sucesso';

        $sql = $PDO->prepare("SELECT nascimento FROM usuario WHERE nome_usuario = :nome_usuario 
        AND nascimento = :twofa");
        $sql->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
        $sql->bindParam(':twofa', $twofa);
        $sql->execute();
        $verify_2fa = $sql->fetch(PDO::FETCH_ASSOC);

        if(!empty($verify_2fa)){
            if($_SESSION['usuario']['tipo_usuario'] == 'admin'){
                $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
                :tipo_autenticacao, :stats, NOW())");
                $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
                $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
                $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
                $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
                $insert_log_success->bindParam(':stats', $stats);
                $insert_log_success->execute();
                header('Location:../Admin/Home Admin.php');    
            }
            else{
                $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
                :tipo_autenticacao, :stats, NOW())");
                $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
                $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
                $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
                $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
                $insert_log_success->bindParam(':stats', $stats);
                $insert_log_success->execute();
                header('Location:../Usuário Comum/Home.php');
            }
        }
        else{
            $tipo_evento = 'Login';
            $tipo_autenticacao = 'Data Nascimento';
            $stats = 'Falha';

            $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
            :tipo_autenticacao, :stats, NOW())");
            $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
            $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
            $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
            $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
            $insert_log_success->bindParam(':stats', $stats);
            $insert_log_success->execute();

            session_unset();
            session_destroy();
            header('Location:../../Páginas HTML/Alertas/Error-2FA.html');
        }
    }
    else if($_SESSION['random'] == 5){
        $tipo_evento = 'Login';
        $tipo_autenticacao = 'Nome da Mãe';
        $stats = 'Sucesso';

        $sql = $PDO->prepare("SELECT nome_mãe FROM usuario WHERE nome_usuario = :nome_usuario AND nome_mãe = :twofa");
        $sql->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
        $sql->bindParam(':twofa', $twofa);
        $sql->execute();
        $verify_2fa = $sql->fetch(PDO::FETCH_ASSOC);

        if(!empty($verify_2fa)){
            if($_SESSION['usuario']['tipo_usuario'] == 'admin'){
                $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
                :tipo_autenticacao, :stats, NOW())");
                $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
                $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
                $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
                $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
                $insert_log_success->bindParam(':stats', $stats);
                $insert_log_success->execute();
                header('Location:../Admin/Home Admin.php');    
            }
            else{
                $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
                :tipo_autenticacao, :stats, NOW())");
                $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
                $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
                $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
                $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
                $insert_log_success->bindParam(':stats', $stats);
                $insert_log_success->execute();
                header('Location:../Usuário Comum/Home.php');
            }
        }
        else{
            $tipo_evento = 'Login';
            $tipo_autenticacao = 'Nome da Mãe';
            $stats = 'Falha';

            $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
            :tipo_autenticacao, :stats, NOW())");
            $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
            $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
            $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
            $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
            $insert_log_success->bindParam(':stats', $stats);
            $insert_log_success->execute();

            session_unset();
            session_destroy();
            header('Location:../../Páginas HTML/Alertas/Error-2FA.html');
        }
    }
?>