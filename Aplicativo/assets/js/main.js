// Inicializa o gráfico ECharts no elemento HTML com o ID "echarts"
var chart = echarts.init(document.getElementById('echarts'));

// Função para obter os dados do back-end com base na consulta selecionada
function fetchCategory(consultaSelecionada) {
    $.ajax({
        // Substitua pela URL apropriada para o seu back-end
        url: '/projeto/php/query.php?consulta=' + consultaSelecionada,
        type: 'GET',
        dataType: 'json',

        success: function (data) {
            // Os dados obtidos do servidor são armazenados na variável "data"
            var echartsData = data;

            // Configuração das opções do gráfico ECharts
            var options = {
                xAxis: {
                    type: 'category',
                    data: echartsData.map(function (data) {
                        return data.time;
                    }),
                },
                yAxis: {
                    type: 'value',
                },
                series: [
                    {
                        name: 'Consumo de Água',
                        type: 'bar', // Alterado para 'bar' para corresponder aos seus dados
                        data: echartsData.map(function (data) {
                            return data.value.toFixed(2);
                        }),
                    },
                ],
            };

            // Define as opções no gráfico ECharts
            chart.setOption(options);
        },
        error: function (xhr, status, error) {
            // Se ocorrer um erro na solicitação AJAX, exibe uma mensagem de erro no console
            console.error('Erro na solicitação AJAX: ' + error);
        }
    });
}

// Função para obter os dados do back-end com base na consulta selecionada
function fetchTrend(consultaSelecionada) {
    $.ajax({
        // Substitua pela URL apropriada para o seu back-end
        url: '/projeto/php/query.php?consulta=' + consultaSelecionada,
        type: 'GET',
        dataType: 'json',

        success: function (data) {
            // Os dados obtidos do servidor são armazenados na variável "data"
            var echartsData = data;

            // Configuração das opções do gráfico ECharts
            var options = {
                backgroundColor: 'transparent',
                tooltip: {
                    trigger: 'axis',
                },
                legend: {
                    data: ['Consumo de Água'],
                    textStyle: {
                        color: 'rgba(128, 128, 128, .9)',
                    },
                },
                toolbox: {
                    feature: {
                        dataZoom: {
                            yAxisIndex: 'none',
                            icon: {
                                zoom: 'path://',
                                back: 'path://',
                            },
                        },
                        saveAsImage: {},
                    }
                },
                xAxis: {
                    type: 'time',
                },
                yAxis: {
                    type: 'value',
                    min: 'dataMin',
                },
                grid: {
                    left: '2%',
                    right: '2%',
                    top: '2%',
                    bottom: 24,
                    containLabel: true,
                },
                series: [
                    {
                        name: 'Consumo de Água',
                        type: 'line',
                        showSymbol: false,
                        areaStyle: {
                            opacity: 0.1,
                        },
                        lineStyle: {
                            width: 1,
                        },
                        data: echartsData.map(function (data) {
                            return [data.time, data.value.toFixed(2)];
                        }),
                    },
                ],
            };

            // Define as opções no gráfico ECharts
            chart.setOption(options);
        },
        error: function (xhr, status, error) {
            // Se ocorrer um erro na solicitação AJAX, exibe uma mensagem de erro no console
            console.error('Erro na solicitação AJAX: ' + error);
        }
    });
}

// Chame a função para obter os dados quando a página carregar
fetchTrend('consulta1');

// Função para atualizar o gráfico com base na consulta selecionada
function atualizarGrafico() {
    var consultaSelecionada = document.getElementById('consulta').value;
    if (consultaSelecionada == "consulta1") {
        fetchTrend(consultaSelecionada);
    }else if (consultaSelecionada == "consulta2"){
        fetchCategory(consultaSelecionada);
    }
}