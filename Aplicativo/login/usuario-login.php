<?php

$cpf = $_POST["cpf"];
$senha = $_POST["senha"];

$sql = "SELECT cpf, senha FROM tb_pessoa WHERE cpf = :cpf";

include_once("../classes/Conexao.php");

$resultado = $conn->prepare($sql);
$resultado->bindParam(':cpf', $cpf);
$resultado->execute();

$linha = $resultado->fetch();

if($linha === false || !password_verify($senha, $linha['senha'])){
    // CPF não encontrado ou senha incorreta
    echo "error";
} else {
    // Dados corretos
    session_start();
    $_SESSION['usuario_logado'] = $linha['cpf'];
    echo "sucesso";
}
