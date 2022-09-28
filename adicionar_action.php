<?php
require 'config.php';

$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUTS_POST, 'email', FILTER_VALIDADE_EMAIL);

if($name && $email){

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql ->bindValue(':email', $email);
    $sql->execute();

    if($sql->rewCount() == 0){
        $sql = $pdo->prepare("INSERT INTO usuarios (none, email) VALUES (:name, :email)");
        $sql->bindValue(':name', $name);
        $sql->bindValue(':email', $email);
        $sql->execute();

        header ("Location: index.php");
        exit;
    }else{
        header("Location: adicionar.php");
        exit;
    }

}else{
    header("Location: adicionar.php");
    exit;