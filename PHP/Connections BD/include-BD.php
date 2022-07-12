<?php
    require_once 'init-BD.php';

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
    $tipo_usuario = 'comum';

    function RemoveSpecialChar($str){
  
        $res = preg_replace('/[^a-zA-Z0-9_]/s','',$str);
    
        return $res;
    }
    $cpf = RemoveSpecialChar($s_cpf);
    $cep = RemoveSpecialChar($s_cep);
    $celular = RemoveSpecialChar($s_celular);
    $telefone_fixo = RemoveSpecialChar($s_telefone_fixo);

    $PDO = connect_bd();

    $verify_user = $PDO->prepare("SELECT * FROM usuario WHERE nome_usuario = :nome_usuario");
    $verify_user->bindParam(':nome_usuario', $nome_usuario);
    $verify_user->execute();
    $result = $verify_user->fetchAll();
    if(count($result) > 0){
        header('Location:../../Páginas HTML/Error-User-Exists.html');
    }
    else{
        $sql = "INSERT INTO usuario(nome, sobrenome, nascimento, cpf, email, nome_mãe,
        cep, rua, numero, complemento, bairro, cidade, uf, celular, telefone_fixo, nome_usuario, senha, tipo_usuario)
        VALUES(:nome, :sobrenome, :nascimento, :cpf, :email, :nome_mae, :cep, :rua, :numero, :complemento, :bairro,
        :cidade, :uf, :celular, :telefone_fixo, :usuario, :senha, :tipo_usuario)";

        $stmt = $PDO->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':sobrenome', $sobrenome);
        $stmt->bindParam(':nascimento', $nascimento);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nome_mae', $nome_mae);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':uf', $uf);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':telefone_fixo', $telefone_fixo);
        $stmt->bindParam(':usuario', $nome_usuario);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':tipo_usuario', $tipo_usuario);

        if ($stmt->execute()){
            header('Location:../../Páginas HTML/Alertas/Success.html');
        }
        else {
            header('Location:../../Páginas HTML/Alertas/Error.html');
        }
    }
?>