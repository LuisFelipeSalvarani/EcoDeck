<?php

// Inclui o arquivo de configuração
require 'conexao.php';

// Cria uma instância da API de consulta
$queryApi = $client->createQueryApi();



$consultaSelecionada = $_GET['consulta'];

if ($consultaSelecionada === 'consulta1') {
    // Realiza uma consulta no banco de dados InfluxDB
    $result = $queryApi->query('from(bucket: "ecoDeckDB") |> range(start: 2023-01-01, stop: 2023-01-31) |> filter(fn: (r) => r["_measurement"] == "energyconsumptionDB") |> filter(fn: (r) => r["_field"] == "powerConsumption")');
} elseif ($consultaSelecionada === 'consulta2') {
    // Realiza uma consulta no banco de dados InfluxDB
    $result = $queryApi->query('from(bucket: "ecoDeckDB") |> range(start: 2023-01-01, stop: 2023-10-31) |> filter(fn: (r) => r["_measurement"] == "energyconsumptionDB") |> filter(fn: (r) => r["_field"] == "energyConsumption") |> aggregateWindow(every: 1mo, fn: last)');
} else {
    // Consulta padrão ou tratamento de erro
    // Realiza uma consulta no banco de dados InfluxDB
    $result = $queryApi->query('from(bucket: "ecoDeckDB") |> range(start: 2023-01-01, stop: 2023-01-31) |> filter(fn: (r) => r["_measurement"] == "energyconsumptionDB") |> filter(fn: (r) => r["_field"] == "powerConsumption")');
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
