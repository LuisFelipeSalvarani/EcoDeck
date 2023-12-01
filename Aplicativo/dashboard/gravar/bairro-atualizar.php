<?php

// Inclui o arquivo que contém a definição da classe
require_once "../../classes/Bairro.php";

// Verifica se os dados do formulário foram enviados
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $bairro_id = $_POST["bairro_id"];

    $bairro = new Bairro($bairro_id);

    $bairro->grupo = $_POST["grupo"];
    $bairro->bairro = $_POST["bairro"];
    $bairro->cidade = $_POST["cidade"];
    $bairro->estado = $_POST["estado"];

    $resultado = $bairro->atualizar();

    if ($resultado === "sucesso") {
        echo "sucesso";
    } else {
        echo "erro";
    }
// }