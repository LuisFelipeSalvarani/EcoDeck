-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/12/2023 às 03:42
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
-- Banco de dados: `test`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `usuario` varchar(5) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `datacad` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `usuario`, `senha`, `datacad`) VALUES
(1, 'admin', '$2y$10$lpZwWTohGJy9Eqj/ZTwERuDOScKbfdflWBi.aSUbqZMU8al9kXT5.', '27-11-2023');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_bairro`
--

CREATE TABLE `tb_bairro` (
  `bairro_id` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_bairro`
--

INSERT INTO `tb_bairro` (`bairro_id`, `grupo`, `bairro`, `cidade`, `estado`) VALUES
(1, 1, 'Cubatão', 'Itapira', 'SP'),
(2, 5, 'Vila Ilze', 'Itapira', 'SP');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_endereco`
--

CREATE TABLE `tb_endereco` (
  `endereco_id` int(11) NOT NULL,
  `via` varchar(10) NOT NULL,
  `titulo` varchar(15) DEFAULT NULL,
  `endereco` varchar(60) NOT NULL,
  `bairro_id` int(11) NOT NULL,
  `cep` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_endereco`
--

INSERT INTO `tb_endereco` (`endereco_id`, `via`, `titulo`, `endereco`, `bairro_id`, `cep`) VALUES
(1, 'Rua', '', 'Vitor Meirelles', 1, '13970-000'),
(2, 'Rua', '', 'Vitor Meirelles', 1, '13972-370'),
(3, 'Rua', 'São', 'João', 1, '13972-370'),
(4, 'Avenida', '', 'Vitor Meirelles', 1, '13972-370'),
(5, 'Rua', '', 'José Bonifacio', 1, '13972-370'),
(6, 'Avenida', '', 'Rio Branco', 2, '13972-370');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_logradouro`
--

CREATE TABLE `tb_logradouro` (
  `logradouro_id` int(11) NOT NULL,
  `endereco_id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `inscricao` varchar(10) NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `lig_agua` varchar(10) NOT NULL,
  `lig_energia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_logradouro`
--

INSERT INTO `tb_logradouro` (`logradouro_id`, `endereco_id`, `numero`, `complemento`, `inscricao`, `matricula`, `lig_agua`, `lig_energia`) VALUES
(1, 1, 107, NULL, '000000', '00000000', '00000000', '000000'),
(2, 3, 107, '', '0000000', '000000', '0000000000', '0000000'),
(3, 1, 107, 'ffhtf', '00000000', '000000000', '00000000', '00000000');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_pessoa`
--

CREATE TABLE `tb_pessoa` (
  `pessoa_id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data_nascimento` varchar(10) NOT NULL,
  `email` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(12) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `logradouro_id` int(100) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `tb_pessoa`
--

INSERT INTO `tb_pessoa` (`pessoa_id`, `nome`, `data_nascimento`, `email`, `cpf`, `rg`, `telefone`, `logradouro_id`, `senha`) VALUES
(1, 'Antonio Junior', '20/01/1950', '', '489.128.718-70', '68.459.276-2', '(19) 98175-6024', 1, '$2y$10$aX91zan57k7yF/TaiOmjduJKK2iMEw02gUAPO4EMbkGsn9hLSGWSy'),
(2, 'Antonio Junior', '20/01/1990', '', '578.268.125-43', '68.459.276-2', '(19) 98175-6024', 1, '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Índices de tabela `tb_bairro`
--
ALTER TABLE `tb_bairro`
  ADD PRIMARY KEY (`bairro_id`);

--
-- Índices de tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD PRIMARY KEY (`endereco_id`);

--
-- Índices de tabela `tb_logradouro`
--
ALTER TABLE `tb_logradouro`
  ADD PRIMARY KEY (`logradouro_id`);

--
-- Índices de tabela `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  ADD PRIMARY KEY (`pessoa_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_bairro`
--
ALTER TABLE `tb_bairro`
  MODIFY `bairro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  MODIFY `endereco_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_logradouro`
--
ALTER TABLE `tb_logradouro`
  MODIFY `logradouro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  MODIFY `pessoa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
