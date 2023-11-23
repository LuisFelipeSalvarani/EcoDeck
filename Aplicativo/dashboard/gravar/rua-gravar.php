<?php

// Inclui o arquivo que contém a definição da classe
require_once "../../classes/Rua.php";

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Cria um novo objeto
    $rua = new Rua();

    // Atribui os valores do formulário às propriedades do objeto
    $rua->rua = $_POST['rua'];
    $rua->bairro_id = $_POST['bairro_id'];
    $rua->cep = $_POST['cep'];

    // Chama o método inserir() no objeto para inserir os dados no banco de dados
    $resultado = $rua->inserir();

    if ($resultado === "sucesso") {
        echo "sucesso";
    } else {
        echo "erro";
    }
}