<?php

// Inclui o arquivo que contém a definição da classe
require_once "../../classes/Logradouro.php";

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Cria um novo objeto
    $logradouro = new Logradouro();

    // Atribui os valores do formulário às propriedades do objeto
    $logradouro->endereco_id = $_POST['endereco_id'];
    $logradouro->numero = $_POST['numero'];
    $logradouro->complemento = $_POST['complemento'];
    $logradouro->inscricao = $_POST['inscricao'];
    $logradouro->matricula = $_POST['matricula'];
    $logradouro->lig_agua = $_POST['lig_agua'];
    $logradouro->lig_energia = $_POST['lig_energia'];

    // Chama o método inserir() no objeto para inserir os dados no banco de dados
    $resultado = $logradouro->inserir();

    if ($resultado === "sucesso") {
        echo "sucesso";
    } else {
        echo "erro";
    }
}