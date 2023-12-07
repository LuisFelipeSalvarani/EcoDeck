-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 07/12/2023 às 04:16
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ecoDeckDB`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_ArduinoNotifications`
--

CREATE TABLE `tb_ArduinoNotifications` (
  `ErrorCount` int(11) NOT NULL,
  `ArduinoNotificationID` int(11) DEFAULT NULL,
  `NotificationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tb_ArduinoNotifications`
--

INSERT INTO `tb_ArduinoNotifications` (`ErrorCount`, `ArduinoNotificationID`, `NotificationDate`) VALUES
(1, 100, '2023-11-12 12:21:17'),
(4, 10, '2023-11-14 22:36:10'),
(5, 50, '2023-11-14 22:37:06'),
(6, 50, '2023-11-15 01:17:56'),
(7, 50, '2023-11-15 01:17:56');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_Notifications`
--

CREATE TABLE `tb_Notifications` (
  `ID` int(11) NOT NULL,
  `Type` int(11) NOT NULL,
  `Notification` varchar(255) NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Despejando dados para a tabela `tb_Notifications`
--

INSERT INTO `tb_Notifications` (`ID`, `Type`, `Notification`, `Description`) VALUES
(1, 2, 'Consumo Diário Excessivo', 'Alerta diário se o consumo de energia exceder a média'),
(2, 2, 'Pico de Demanda de Energia', 'Notificação sobre picos de demanda de energia'),
(3, 2, 'Consumo Mensal Acima da Média', 'Aviso quando o consumo mensal de energia é elevado'),
(4, 2, 'Uso Noturno Anormal', 'Notificação se houver um aumento significativo no uso de energia durante a noite'),
(5, 2, 'Dispositivos em Modo Standby', 'Alerta sobre dispositivos que permanecem em modo standby por períodos prolongados'),
(6, 2, 'Desempenho de Painéis Solares', 'Notificação sobre a eficiência dos painéis solares em condições climáticas específicas'),
(7, 2, 'Análise de Consumo por Setor', 'Comparação do consumo de energia entre diferentes setores da instalação'),
(8, 2, 'Alerta de Tarifas em Horário de Pico', 'Aviso durante períodos de tarifas mais elevadas em horários de pico'),
(9, 2, 'Falha no Sistema de Iluminação', 'Alerta em caso de falha em sistemas de iluminação específicos'),
(10, 2, 'Consumo Anormal de Ar-condicionado', 'Notificação se o consumo de ar-condicionado estiver muito acima do esperado'),
(11, 2, 'Diagnóstico de Equipamentos', 'Notificação de diagnósticos de desempenho de equipamentos específicos'),
(12, 2, 'Atualizações de Eficiência Energética', 'Notificação sobre atualizações disponíveis para melhorar a eficiência'),
(13, 2, 'Monitoramento de Energia Renovável', 'Alerta sobre a produção de energia renovável abaixo do esperado'),
(14, 2, 'Previsão de Consumo Futuro', 'Notificação com base em previsões de consumo futuro'),
(15, 2, 'Aviso de Mudança de Fornecedor', 'Alerta sobre mudanças planejadas no fornecedor de energia'),
(16, 2, 'Controle de Potência Ativa e Reativa', 'Notificação se a potência ativa ou reativa estiver fora dos limites definidos'),
(17, 2, 'Anomalias no Fator de Potência', 'Aviso se houver anomalias no fator de potência'),
(18, 2, 'Consumo Desigual entre Fases', 'Notificação de desequilíbrio significativo no consumo entre fases'),
(19, 2, 'Integração com Smart Grid', 'Notificação com base em informações recebidas da smart grid'),
(20, 2, 'Consumo Semanal Acima da Média', 'Aviso quando o consumo semanal de energia é elevado'),
(21, 2, 'Variações Súbitas de Tensão', 'Notificação sobre variações abruptas na tensão elétrica'),
(22, 2, 'Alerta de Sobrecarga de Circuitos', 'Aviso se houver sobrecarga detectada em circuitos específicos'),
(23, 2, 'Monitoramento de Energia em Tempo Real', 'Notificação em tempo real sobre o consumo de energia'),
(24, 2, 'Análise de Eficiência de Equipamentos', 'Alerta sobre equipamentos que podem ser otimizados para maior eficiência'),
(25, 2, 'Uso Ineficiente de Dispositivos', 'Notificação sobre dispositivos que consomem energia de forma ineficiente'),
(26, 2, 'Alerta de Excedente de Energia Solar', 'Aviso quando a produção de energia solar excede a demanda'),
(27, 2, 'Consumo Anormal de Dispositivos de Alta Potência', 'Notificação de consumo anormal de dispositivos de alta potência'),
(28, 2, 'Diagnóstico de Redução de Consumo', 'Notificação de diagnósticos relacionados à redução de consumo'),
(29, 2, 'Aviso de Manutenção Preventiva', 'Alerta para a necessidade de manutenção preventiva em equipamentos-chave'),
(30, 2, 'Notificação de Interrupções Programadas', 'Aviso sobre interrupções programadas no fornecimento de energia'),
(31, 2, 'Análise de Desempenho de Baterias', 'Notificação sobre o desempenho e níveis de carga de sistemas de baterias'),
(32, 2, 'Consumo Desigual em Zonas Específicas', 'Aviso de desequilíbrio significativo no consumo em áreas específicas'),
(33, 2, 'Alerta de Corrente de Fuga', 'Notificação em caso de corrente de fuga detectada'),
(34, 2, 'Análise de Ciclos de Uso de Equipamentos', 'Aviso sobre padrões cíclicos de uso de equipamentos'),
(35, 2, 'Monitoramento de Consumo por Departamento', 'Comparação do consumo de energia entre diferentes departamentos'),
(36, 2, 'Notificação de Aumento de Demanda Previsto', 'Aviso quando é previsto um aumento significativo na demanda'),
(37, 2, 'Alerta de Consumo Anormal em Feriados', 'Notificação sobre padrões de consumo fora do comum em feriados'),
(38, 2, 'Integrado com Sistemas de Prevenção de Falhas', 'Notificação de eventos de sistemas de prevenção de falhas'),
(39, 2, 'Análise de Consumo por Tipo de Equipamento', 'Comparação do consumo entre diferentes tipos de equipamentos'),
(40, 2, 'Consumo em Tempo Real em Unidades Residenciais', 'Notificação do consumo em tempo real em residências específicas'),
(41, 2, 'Alerta de Desperdício de Energia', 'Aviso quando há desperdício significativo de energia'),
(42, 2, 'Notificação de Tarifas Energéticas', 'Alerta sobre mudanças nas tarifas de energia'),
(43, 2, 'Programa de Incentivo Fiscal', 'Notificação sobre oportunidades de incentivos fiscais'),
(44, 2, 'Desconexão/Reconexão Automática', 'Aviso de desconexão ou reconexão automática de equipamentos'),
(45, 2, 'Consumo Anormal em Horários Específicos', 'Notificação de padrões anormais de consumo em horários específicos'),
(46, 2, 'Análise de Tendências', 'Identificação de tendências de consumo a longo prazo'),
(47, 2, 'Atualizações de Software', 'Notificação sobre disponibilidade de atualizações de software'),
(48, 2, 'Relatórios de Eficiência', 'Envio regular de relatórios sobre a eficiência do sistema'),
(49, 2, 'Educação do Usuário', 'Notificação educacional sobre práticas eficientes de uso'),
(50, 2, 'Incidentes de Segurança', 'Alerta de possíveis incidentes de segurança no sistema'),
(51, 2, 'Regulação Ambiental', 'Notificação sobre mudanças nas regulamentações ambientais'),
(52, 2, 'Consumo em Tempo Real em Unidades Residenciais', 'Notificação do consumo em tempo real em residências específicas'),
(53, 2, 'Análise de Consumo por Eletrodoméstico', 'Comparação do consumo entre diferentes eletrodomésticos'),
(54, 2, 'Notificação de Interrupções de Fornecimento', 'Alerta sobre interrupções não programadas no fornecimento de energia'),
(55, 2, 'Análise de Consumo por Fonte de Energia', 'Comparação do consumo entre diferentes fontes de energia (solar, eólica, etc.)'),
(56, 2, 'Aviso de Condições Ambientais Extremas', 'Notificação em caso de condições ambientais extremas que podem afetar o consumo'),
(57, 2, 'Notificação de Desempenho de Inversores Solares', 'Alerta sobre a eficiência dos inversores em sistemas solares'),
(58, 2, 'Consumo de Energia por Cômodo (Residencial)', 'Detalhamento do consumo por cômodo em residências'),
(59, 2, 'Aviso de Sobreconsumo Recorrente (Indústria)', 'Alerta para padrões recorrentes de sobreconsumo em processos industriais'),
(60, 2, 'Comparação de Eficiência entre Unidades (Concessionária)', 'Análise comparativa da eficiência entre diferentes unidades de distribuição'),
(61, 2, 'Aviso de Condições Operacionais Anormais (Indústria)', 'Notificação de condições operacionais fora do normal em ambientes industriais'),
(62, 2, 'Notificação de Disponibilidade de Energia Renovável', 'Aviso quando condições climáticas são ideais para a produção de energia renovável'),
(63, 2, 'Análise de Consumo por Equipamento Específico', 'Detalhamento do consumo por equipamento específico (máquinas industriais, eletrodomésticos, etc.)'),
(64, 2, 'Aviso de Tendências de Consumo a Longo Prazo', 'Alerta sobre tendências de consumo identificadas para planejamento futuro'),
(65, 2, 'Notificação de Ineficiência em Sistemas de Resfriamento/Heating (HVAC)', 'Alerta sobre ineficiências em sistemas de HVAC'),
(66, 2, 'Monitoramento de Consumo por Turno (Indústria)', 'Acompanhamento do consumo de energia por turno de trabalho em ambientes industriais'),
(67, 2, 'Notificação de Oportunidades de Otimização de Contrato de Energia', 'Alerta sobre oportunidades para otimizar contratos de energia'),
(68, 2, 'Aviso de Consumo Desigual em Unidades Comerciais', 'Notificação de desequilíbrio significativo no consumo entre unidades comerciais'),
(69, 2, 'Análise de Consumo por Padrões Comportamentais (Residencial)', 'Identificação de padrões de consumo relacionados a comportamentos em residências'),
(70, 2, 'Notificação de Taxas de Conversão em Sistemas Fotovoltaicos', 'Alerta sobre taxas de conversão abaixo do esperado em sistemas fotovoltaicos'),
(71, 2, 'Monitoramento de Eficiência de Cogeração', 'Acompanhamento da eficiência em sistemas de cogeração'),
(72, 2, 'Aviso de Alterações nas Políticas Energéticas', 'Notificação sobre mudanças em políticas energéticas que possam impactar custos'),
(73, 2, 'Notificação de Uso Anormal em Feriados (Comercial)', 'Alerta sobre padrões de consumo fora do comum durante feriados em estabelecimentos comerciais'),
(74, 2, 'Análise de Consumo por Processo (Indústria)', 'Detalhamento do consumo por processo em ambientes industriais'),
(75, 1, 'Consumo Diário Excessivo de Água', 'Alerta diário se o consumo de água exceder a média'),
(76, 1, 'Pico de Demanda de Água', 'Notificação sobre picos de demanda de água'),
(77, 1, 'Consumo Mensal Acima da Média de Água', 'Aviso quando o consumo mensal de água é elevado'),
(78, 1, 'Uso Noturno Anormal de Água', 'Notificação se houver um aumento significativo no uso de água durante a noite'),
(79, 1, 'Vazamento de Água Detectado', 'Alerta em caso de detecção de vazamento de água'),
(80, 1, 'Desempenho de Equipamentos de Tratamento de Água', 'Notificação sobre o desempenho de equipamentos de tratamento de água'),
(81, 1, 'Análise de Consumo por Setor de Água', 'Comparação do consumo de água entre diferentes setores da instalação'),
(82, 1, 'Alerta de Tarifas em Horário de Pico de Água', 'Aviso durante períodos de tarifas mais elevadas em horários de pico de água'),
(83, 1, 'Falha no Sistema de Irrigação', 'Alerta em caso de falha no sistema de irrigação específico'),
(84, 1, 'Consumo Anormal de Água em Atividades Industriais', 'Notificação se o consumo de água em atividades industriais estiver muito acima do esperado'),
(85, 1, 'Análise de Consumo por Tipo de Fonte de Água', 'Comparação do consumo entre diferentes fontes de água (poços, fontes, abastecimento público)'),
(86, 1, 'Consumo Semanal Acima da Média de Água', 'Aviso quando o consumo semanal de água é elevado'),
(87, 1, 'Variações Súbitas de Pressão na Rede de Água', 'Notificação sobre variações abruptas na pressão da rede de água'),
(88, 1, 'Alerta de Qualidade da Água', 'Notificação se forem detectadas anomalias na qualidade da água'),
(89, 1, 'Interrupção Programada no Fornecimento de Água', 'Aviso sobre interrupções programadas no fornecimento de água'),
(90, 1, 'Anomalias no Nível de Reservatórios', 'Alerta se forem detectadas anomalias nos níveis dos reservatórios de água'),
(91, 1, 'Análise de Consumo por Área Residencial', 'Comparação do consumo de água entre diferentes áreas residenciais'),
(92, 1, 'Aviso de Manutenção Preventiva em Estações de Tratamento', 'Alerta para a necessidade de manutenção preventiva em estações de tratamento de água'),
(93, 1, 'Notificação de Excedente de Produção de Água', 'Aviso quando a produção de água excede a demanda'),
(94, 1, 'Monitoramento de Consumo por Turno (Indústria)', 'Acompanhamento do consumo de água por turno de trabalho em ambientes industriais'),
(95, 1, 'Alerta de Desperdício de Água', 'Aviso quando há desperdício significativo de água'),
(96, 1, 'Notificação de Mudanças nas Tarifas de Água', 'Alerta sobre mudanças nas tarifas de água'),
(97, 1, 'Programa de Incentivo Fiscal para Sustentabilidade Hídrica', 'Notificação sobre oportunidades de incentivos fiscais relacionados à sustentabilidade hídrica'),
(98, 1, 'Desconexão/Reconexão Automática de Equipamentos de Bombeamento', 'Aviso de desconexão ou reconexão automática de equipamentos de bombeamento de água'),
(99, 1, 'Consumo Anormal em Horários Específicos de Água', 'Notificação de padrões anormais de consumo em horários específicos de água'),
(100, 1, 'Análise de Tendências de Consumo de Água', 'Identificação de tendências de consumo a longo prazo de água'),
(101, 1, 'Atualizações de Software para Otimização de Consumo de Água', 'Notificação sobre disponibilidade de atualizações de software para otimização do consumo de água'),
(102, 1, 'Relatórios de Eficiência no Uso de Água', 'Envio regular de relatórios sobre a eficiência no uso de água'),
(103, 1, 'Educação do Usuário sobre Conservação Hídrica', 'Notificação educacional sobre práticas eficientes de uso e conservação da água'),
(104, 1, 'Incidentes de Segurança na Rede de Água', 'Alerta de possíveis incidentes de segurança na rede de água'),
(105, 1, 'Regulação Ambiental para Preservação de Recursos Hídricos', 'Notificação sobre mudanças nas regulamentações ambientais para a preservação de recursos hídricos'),
(106, 1, 'Monitoramento de Consumo por Cômodo (Residencial)', 'Detalhamento do consumo de água por cômodo em residências'),
(107, 1, 'Aviso de Sobreconsumo Recorrente em Processos Industriais', 'Alerta para padrões recorrentes de sobreconsumo em processos industriais relacionados à água'),
(108, 1, 'Comparação de Eficiência no Uso de Água entre Diferentes Unidades (Fornecedora)', 'Análise comparativa da eficiência no uso de água entre diferentes unidades de fornecimento'),
(109, 1, 'Aviso de Condições Operacionais Anormais em Processos Industriais (Água)', 'Notificação de condições operacionais fora do normal em ambientes industriais relacionados à água'),
(110, 1, 'Notificação de Disponibilidade de Água para Abastecimento', 'Aviso quando as condições ambientais são ideais para o abastecimento de água'),
(111, 1, 'Análise de Consumo por Equipamento Específico de Água', 'Detalhamento do consumo de água por equipamento específico (bombas, sistemas de filtragem, etc.)'),
(112, 1, 'Aviso de Tendências de Consumo a Longo Prazo de Água', 'Alerta sobre tendências de consumo identificadas para o planejamento futuro'),
(113, 1, 'Notificação de Ineficiência em Sistemas de Tratamento de Água', 'Alerta sobre ineficiências em sistemas de tratamento de água'),
(114, 1, 'Monitoramento de Eficiência de Reuso de Água', 'Acompanhamento da eficiência em sistemas de reuso de água'),
(115, 1, 'Aviso de Alterações nas Políticas Hídricas', 'Notificação sobre mudanças em políticas hídricas que possam impactar custos'),
(116, 1, 'Notificação de Uso Anormal em Feriados (Comercial)', 'Alerta sobre padrões de consumo fora do comum durante feriados em estabelecimentos comerciais relacionados à água'),
(117, 1, 'Análise de Consumo por Processo Industrial (Água)', 'Detalhamento do consumo de água por processo em ambientes industriais'),
(118, 3, 'Perda de Conexão com o Servidor Principal', 'Notificação de perda de conexão com o servidor principal'),
(119, 3, 'Erro na Autenticação do Sistema', 'Aviso quando ocorre um erro na autenticação do sistema'),
(120, 3, 'Falha na Atualização Automática do Software', 'Notificação de falha na atualização automática do software'),
(121, 3, 'Interrupção na Transmissão de Dados com o Servidor', 'Aviso de interrupção na transmissão de dados com o servidor'),
(122, 3, 'Problema na Sincronização de Configurações', 'Notificação de problema na sincronização de configurações com o servidor'),
(123, 3, 'Falha no Sistema de Registro de Eventos', 'Aviso quando ocorre uma falha no sistema de registro de eventos'),
(124, 3, 'Erro na Comunicação com Serviços Externos', 'Notificação de erro na comunicação com serviços externos'),
(125, 3, 'Perda de Conexão com Dispositivos Remotos', 'Aviso de perda de conexão com dispositivos remotos do sistema'),
(126, 3, 'Problema na Inicialização do Sistema', 'Notificação de problema durante a inicialização do sistema'),
(127, 3, 'Erro na Execução de Tarefas Agendadas', 'Aviso de erro na execução de tarefas agendadas do sistema'),
(128, 3, 'Problema na Alocação de Recursos', 'Notificação de problema na alocação de recursos do sistema');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_ArduinoNotifications`
--
ALTER TABLE `tb_ArduinoNotifications`
  ADD PRIMARY KEY (`ErrorCount`),
  ADD KEY `ArduinoNotificationID` (`ArduinoNotificationID`);

--
-- Índices de tabela `tb_Notifications`
--
ALTER TABLE `tb_Notifications`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_ArduinoNotifications`
--
ALTER TABLE `tb_ArduinoNotifications`
  MODIFY `ErrorCount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_Notifications`
--
ALTER TABLE `tb_Notifications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_ArduinoNotifications`
--
ALTER TABLE `tb_ArduinoNotifications`
  ADD CONSTRAINT `tb_ArduinoNotifications_ibfk_1` FOREIGN KEY (`ArduinoNotificationID`) REFERENCES `tb_Notifications` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
