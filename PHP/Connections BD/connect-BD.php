<?php
    //Conexão com o banco
    function connect_bd(){
        $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
        return $PDO;
    }
?>

