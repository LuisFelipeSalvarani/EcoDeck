<?php

// Inclui o arquivo de configuração
require 'conexao.php';

// Cria uma instância da API de consulta
$queryApi = $client->createQueryApi();



$consultaSelecionada = $_GET['consulta'];

if ($consultaSelecionada === 'consulta1') {
    // Realiza uma consulta no banco de dados InfluxDB
    $result = $queryApi->query('from(bucket: "Teste") |> range(start: -1m) |> filter(fn: (r) => r["_measurement"] == "Teste_1") |> filter(fn: (r) => r["_field"] == "value")');
} elseif ($consultaSelecionada === 'consulta2') {
    // Realiza uma consulta no banco de dados InfluxDB
    $result = $queryApi->query('from(bucket: "Teste") |> range(start: -25d) |> filter(fn: (r) => r["_measurement"] == "Teste_1") |> filter(fn: (r) => r["_field"] == "value") |> aggregateWindow(every: 1w, fn: sum)');
} else {
    // Consulta padrão ou tratamento de erro
    // Realiza uma consulta no banco de dados InfluxDB
    $result = $queryApi->query('from(bucket: "Teste") |> range(start: -1m) |> filter(fn: (r) => r["_measurement"] == "Teste_1") |> filter(fn: (r) => r["_field"] == "value")');
}

// Inicializa um array para armazenar os dados do gráfico
$echartsData = [];

// Processa os resultados da consulta e formata os dados
foreach ($result[0]->records as $record) {
    $time = $record["_time"];
    $consumoAgua = $record["_value"];
    $echartsData[] = [
        'time' => $time,
        'value' => $consumoAgua
    ];
}

// Fecha a conexão com o InfluxDB
$client->close();

// Define o cabeçalho da resposta como JSON
header('Content-Type: application/json');

// Envia os dados no formato JSON como resposta
echo json_encode($echartsData);
