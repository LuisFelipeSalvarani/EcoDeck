<?php

// Inclui o arquivo que contém a definição da classe Pessoa
require_once "../../classes/Pessoa.php";

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Cria um novo objeto Pessoa
    $pessoa = new Pessoa();

    // Atribui os valores do formulário às propriedades do objeto Pessoa
    $pessoa->nome = $_POST['nome'];
    $pessoa->data_nascimento = $_POST['data_nascimento'];
    $pessoa->telefone = $_POST['telefone'];
    $pessoa->email = $_POST['email'];
    $pessoa->cpf = $_POST['cpf'];
    $pessoa->rg = $_POST['rg'];
    $pessoa->logradouro_id = $_POST['logradouro_id'];

    // Chama o método inserir() no objeto Pessoa para inserir os dados no banco de dados
    $resultado = $pessoa->inserir();

    if ($resultado === "sucesso") {
        echo "sucesso";
    } else {
        echo "erro";
    }
}