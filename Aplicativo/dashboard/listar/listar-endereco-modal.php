<?php
// Conecte ao banco de dados e faça a consulta
include_once("../../classes/Conexao.php");

$consulta = $conn->query('SELECT e.endereco_id, e.endereco, e.via, e.titulo, e.cep, b.bairro, b.grupo, b.cidade, b.estado FROM tb_endereco e JOIN tb_bairro b ON e.bairro_id = b.bairro_id ORDER BY e.endereco_id');

$resultados = $consulta->fetchAll(PDO::FETCH_ASSOC);


// Adicione um cabeçalho Content-Type para indicar que a resposta é JSON
header('Content-Type: application/json');

// Retorne os resultados como JSON
echo json_encode($resultados);