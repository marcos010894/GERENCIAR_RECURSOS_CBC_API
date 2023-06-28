-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-133493-db.mysql-133493:19486
-- Tempo de geração: 27-Jun-2023 às 23:51
-- Versão do servidor: 8.0.26
-- versão do PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gerenciar_recursos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clubes`
--

CREATE TABLE `clubes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_clube` varchar(255) NOT NULL,
  `saldo_disponivel` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
-- --------------------------------------------------------

--
-- Estrutura da tabela `recursos`
--

CREATE TABLE `recursos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_recurso` varchar(255) NOT NULL,
  `saldo_disponivel` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `recursos`
--

INSERT INTO `recursos` (`id`, `nome_recurso`, `saldo_disponivel`) VALUES
(1, 'Recurso para passagens', '10000.00'),
(2, 'Recurso para passagens', '10000.00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clubes`
--
ALTER TABLE `clubes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `recursos`
--
ALTER TABLE `recursos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clubes`
--
ALTER TABLE `clubes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `recursos`
--
ALTER TABLE `recursos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
