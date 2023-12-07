<?php

// Inclui o arquivo que contém a definição da classe
require_once "../../classes/Pessoa.php";

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $pessoa_id = $_POST["pessoa_id"];

    $pessoa = new Pessoa($pessoa_id);

    $pessoa->nome = $_POST['nome'];
    $pessoa->data_nascimento = $_POST['data_nascimento'];
    $pessoa->telefone = $_POST['telefone'];
    $pessoa->email = $_POST['email'];
    $pessoa->cpf = $_POST['cpf'];
    $pessoa->rg = $_POST['rg'];
    $pessoa->logradouro_id = $_POST['logradouro_id'];


    $resultado = $pessoa->atualizar();

    if ($resultado === "sucesso") {
        echo $resultado;
    } else {
        echo $resultado;
    }
}