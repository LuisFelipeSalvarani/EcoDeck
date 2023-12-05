<?php

// Inclui o arquivo que contém a definição da classe
require_once "../../classes/Endereco.php";

// Verifica se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $endereco_id = $_POST["endereco_id"];

    $endereco = new Endereco($endereco_id);

    $endereco->via = $_POST["via"];
    $endereco->titulo = $_POST["titulo"];
    $endereco->endereco = $_POST["endereco"];
    $endereco->bairro_id = $_POST["bairro_id"];
    $endereco->cep = $_POST["cep"];

    $resultado = $endereco->atualizar();

    if ($resultado === "sucesso") {
        echo $resultado;
    } else {
        echo $resultado;
    }
}