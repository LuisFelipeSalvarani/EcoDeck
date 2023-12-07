<?php

// Inclui o arquivo que contém a definição da classe
require_once "../../classes/Bairro.php";

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Cria um novo objeto
    $bairro = new Bairro();

    // Atribui os valores do formulário às propriedades do objeto
    $bairro->grupo = $_POST['grupo'];
    $bairro->bairro = $_POST['bairro'];
    $bairro->cidade = $_POST['cidade'];
    $bairro->estado = $_POST['estado'];

    // Chama o método inserir() no objeto para inserir os dados no banco de dados
    $resultado = $bairro->inserir();

    if ($resultado === "sucesso") {
        echo "sucesso";
    } else {
        echo "erro";
    }
}