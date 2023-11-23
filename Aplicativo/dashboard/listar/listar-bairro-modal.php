<?php
// Conecte ao banco de dados e faça a consulta
include_once("../../classes/Conexao.php");

$consulta = $conn->query('SELECT bairro_id, bairro, grupo, cidade, estado FROM tb_bairro');

$resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);


// Adicione um cabeçalho Content-Type para indicar que a resposta é JSON
header('Content-Type: application/json');

// Retorne os resultados como JSON
echo json_encode($resultados);