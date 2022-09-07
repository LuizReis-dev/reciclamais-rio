-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 16-Ago-2022 às 11:57
-- Versão do servidor: 8.0.30-0ubuntu0.20.04.2
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `ID_pagamento` int NOT NULL,
  `ID_cliente` int NOT NULL,
  `ID_plano` int DEFAULT NULL,
  `Valor` double NOT NULL,
  `Status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`ID_pagamento`, `ID_cliente`, `ID_plano`, `Valor`, `Status`) VALUES
(1, 1, NULL, 2000, NULL),
(2, 1, NULL, 2000, 'realizado'),
(3, 1, 3, 3000, 'realizado'),
(4, 1, 2, 2000, 'realizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `plano`
--

CREATE TABLE `plano` (
  `ID_plano` int NOT NULL,
  `Nome_plano` varchar(50) NOT NULL,
  `Preco` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `plano`
--

INSERT INTO `plano` (`ID_plano`, `Nome_plano`, `Preco`) VALUES
(1, 'Teste 01', 10),
(2, 'Teste 02', 20),
(3, 'Teste 03', 30);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`ID_pagamento`);

--
-- Índices para tabela `plano`
--
ALTER TABLE `plano`
  ADD PRIMARY KEY (`ID_plano`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `ID_pagamento` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `plano`
--
ALTER TABLE `plano`
  MODIFY `ID_plano` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
