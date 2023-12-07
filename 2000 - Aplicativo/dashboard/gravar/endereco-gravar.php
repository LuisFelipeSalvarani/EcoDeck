<?php

// Inclui o arquivo que contém a classe
require_once "../../classes/Endereco.php";

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Cria um novo objeto
    $endereco = new Endereco();

    // Atribui os valores do formulário às propriedades do objeto
    $endereco->via = $_POST['via'];
    $endereco->titulo = $_POST['titulo'];
    $endereco->endereco = $_POST['endereco'];
    $endereco->bairro_id = $_POST['bairro_id'];
    $endereco->cep = $_POST['cep'];

    // Chama o método inserir() no objeto para inserir os dados no banco de dados
    $resultado = $endereco->inserir();

    if ($resultado === "sucesso") {
        echo "sucesso";
    } else {
        echo "erro";
    }
}