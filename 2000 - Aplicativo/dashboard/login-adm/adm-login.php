<?php

$usuario = $_POST["usuario"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM tb_admin WHERE usuario = :user";

include_once("../../classes/Conexao.php");

$resultado = $conn->prepare($sql);
$resultado->bindParam(':user', $usuario);
$resultado->execute();

$linha = $resultado->fetch();

if(password_verify($senha, $linha['senha'])){
    $usuario_logado = $linha['usuario'];    
}

if($usuario_logado == null){
    // Usuário ou senha inválida
    header('Location: ../index.php?login_failed=true');
}else{
    session_start();
    $_SESSION['usuario_logado'] = $usuario_logado;
    header('Location: ../dashboard.php');
}