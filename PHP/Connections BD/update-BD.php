<?php
    require_once 'init-BD.php';
    require_once '../Connections BD/verify-session.php';

    $nome = $_POST['first-name'];
    $sobrenome = $_POST['last-name'];
    $nascimento = $_POST['birth-date'];
    $s_cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $nome_mae = $_POST['mothers-name'];
    $s_cep = $_POST['cep'];
    $rua = $_POST['street'];
    $numero = $_POST['address-number'];
    $complemento = $_POST['address2'];
    $bairro = $_POST['district'];
    $cidade = $_POST['city'];
    $uf = $_POST['uf'];
    $s_celular = $_POST['cellphone'];
    $s_telefone_fixo = $_POST['phone'];
    $nome_usuario = $_POST['user-name'];
    $senha = sha1($_POST['password']);

    function RemoveSpecialChar($str){
  
        $res = preg_replace('/[^a-zA-Z0-9_]/s','',$str);
    
        return $res;
    }
    $cpf = RemoveSpecialChar($s_cpf);
    $cep = RemoveSpecialChar($s_cep);
    $celular = RemoveSpecialChar($s_celular);
    $telefone_fixo = RemoveSpecialChar($s_telefone_fixo);

    $PDO = connect_bd();

    $sql = $PDO->prepare("UPDATE usuario SET id = :id, nome = :nome, sobrenome = :sobrenome, nascimento = :nascimento, cpf = :cpf, email = :email, 
     nome_mãe = :nome_mae, cep = :cep, rua = :rua, numero = :numero, complemento = :complemento, bairro = :bairro, cidade = :cidade, uf = :uf,
     celular = :celular, telefone_fixo = :telefone_fixo, nome_usuario = :nome_usuario, senha = :senha, tipo_usuario = :tipo_usuario
      WHERE id = :id");

    $sql->bindParam(':id', $_SESSION['usuario']['id']);
    $sql->bindParam(':nome', $nome);
    $sql->bindParam(':sobrenome', $sobrenome);
    $sql->bindParam(':nascimento', $nascimento);
    $sql->bindParam(':cpf', $cpf);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':nome_mae', $nome_mae);
    $sql->bindParam(':cep', $cep);
    $sql->bindParam(':rua', $rua);
    $sql->bindParam(':numero', $numero);
    $sql->bindParam(':complemento', $complemento);
    $sql->bindParam(':bairro', $bairro);
    $sql->bindParam(':cidade', $cidade);
    $sql->bindParam(':uf', $uf);
    $sql->bindParam(':celular', $celular);
    $sql->bindParam(':telefone_fixo', $telefone_fixo);
    $sql->bindParam(':nome_usuario', $nome_usuario);
    $sql->bindParam(':senha', $senha);
    $sql->bindParam(':tipo_usuario', $_SESSION['usuario']['tipo_usuario']);

    $sql->execute();

    if($sql->execute()){
        $tipo_evento = 'Atualização de Dados';
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
        header('Location:../../Páginas HTML/Alertas/Update-Success.html');
    }
    else{
        $tipo_evento = 'Atualização de Dados';
        $tipo_autenticacao = '';
        $stats = 'Falha';
    
        $insert_log_success = $PDO->prepare("INSERT INTO logs VALUES(:id_usuario, :nome_usuario, :tipo_evento, 
        :tipo_autenticacao, :stats, NOW())");
        $insert_log_success->bindParam(':id_usuario', $_SESSION['usuario']['id']);
        $insert_log_success->bindParam(':nome_usuario', $_SESSION['usuario']['nome_usuario']);
        $insert_log_success->bindParam(':tipo_evento', $tipo_evento);
        $insert_log_success->bindParam(':tipo_autenticacao', $tipo_autenticacao);
        $insert_log_success->bindParam(':stats', $stats);
        $insert_log_success->execute();
        header('Location:../../Páginas HTML/Alertas/Update-Error.html');
    }
?>