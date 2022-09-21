<?php
require 'config.php'

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email' , FILTER_VALIDADE_EMAIL);

if($name && $email){

    $sql = $pdp-> prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql->bindValue(':email', $email); 
    $sql->execute();

    if($sql->rowCount() === 0){
        $sql =$pdo->prepare("INSERT INTO usuario (nome, email) VALUES (:name, :email)");
        $sql->bindValue('email', $name);
        $sql->bindValue('email', $email);
        $sql->execute();

        header("Location: index.php");
        exit;
    }else{ 
        header("Location: adicionar.php");
        exit;

    }    


}else{ 
    header("Location: adicionar.php");
}