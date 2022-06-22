-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jun-2022 às 13:09
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reciclamais`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bonificacao`
--

CREATE TABLE IF NOT EXISTS `bonificacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` int(11) DEFAULT NULL,
  `id_catador` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_catador_bonificacao` (`id_catador`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `catador`
--

CREATE TABLE IF NOT EXISTS `catador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `cpf` varchar(150) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `data_de_nascimento` date DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telefone` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `catador`
--

INSERT INTO `catador` (`id`, `nome`, `cpf`, `endereco`, `data_de_nascimento`, `email`, `telefone`) VALUES
(1, 'Antonio Carlos dos Santos', '38132557000', 'Rua Mariz e Barros,100', '1989-11-24', 'CarlosAntonio21@xxx.com', '(21) 99242-3136'),
(2, 'Bruno Santos', '18245052051', 'Rua do Coqueiro, 314', '1974-06-21', 'Brunosantos55@gmail.com', '(21)34657486'),
(3, 'Diogo Fraga', '88009444006', 'Rua Machado de Assis', '2000-09-09', 'Diogofraga09@gmail.com', '(21)923651287'),
(4, 'Fabio Ferreira Souza', '24834257045', 'Rua Souza Pinheiro', '1981-09-20', 'FabioSouza10@gmail.com', '(21)236900165'),
(5, 'Marielle Conceicao', '61721450025', 'Rua Gabriel Dantas,1981', '1994-10-07', 'Marielle042@gmail.com', '(21)165793278');

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` float DEFAULT NULL,
  `data_da_compra` date DEFAULT NULL,
  `id_catador` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_catador_compra` (`id_catador`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id`, `total`, `data_da_compra`, `id_catador`) VALUES
(1, 38.7, '2022-06-02', 1),
(2, 80, '2022-06-09', 3),
(3, 492, '2022-06-04', 2),
(4, 72, '2022-06-17', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `cnpj` varchar(150) DEFAULT NULL,
  `ramo` varchar(50) NOT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telefone` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `cnpj`, `ramo`, `endereco`, `email`, `telefone`) VALUES
(1, 'Coca Cola', '82984581000108', 'Bebidas', 'Rua do Refrigerante', 'Cocacola@gmail.com', '(21)857853490'),
(2, 'Papel Gourmet', '67774928000102', 'Papelaria', 'Rua da Papelandia', 'Gourmetpapel@gmail.com', '(21)11110000'),
(3, 'Iron Maiden Ferros', '77585224000137', 'Metalurgia', 'Rua do Metal', 'Ironferros@gmail.com', '(21)11110666'),
(4, 'Forte do Aluminio', '06510638000159', 'Metalurgia', 'Rua Teixeira Fernandes', 'Aluminioforte@gmail.com', '(21)010101010'),
(5, 'Cobre do Seu Ze', '72461525000135', 'Comercial', 'Rua Da Cobranca', 'Zecobres@gmail.com', '(21)378900156');

-- --------------------------------------------------------

--
-- Estrutura da tabela `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `preco_por_kg` float DEFAULT NULL,
  `meta_bonificacao_kg` float DEFAULT NULL,
  `preco_bonificacao` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `material`
--

INSERT INTO `material` (`id`, `nome`, `preco_por_kg`, `meta_bonificacao_kg`, `preco_bonificacao`) VALUES
(1, 'Cobre', 41, 12, 100),
(2, 'Ferro', 1.1, 200, 25),
(3, 'Aluminio', 3.05, 150, 30),
(4, 'Papel', 0.41, 1000, 20),
(5, 'Garrafa Pet', 0.4, 1000, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materias_em_compra`
--

CREATE TABLE IF NOT EXISTS `materias_em_compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_compra` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `total_em_kg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_compra_materias_em_compra` (`id_compra`),
  KEY `fk_material_materias_em_compra` (`id_material`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `materias_em_compra`
--

INSERT INTO `materias_em_compra` (`id`, `id_compra`, `id_material`, `total_em_kg`) VALUES
(1, 1, 3, 10),
(2, 1, 4, 20),
(3, 2, 5, 200),
(4, 3, 1, 12),
(5, 4, 2, 10),
(6, 4, 3, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materias_em_venda`
--

CREATE TABLE IF NOT EXISTS `materias_em_venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venda` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `total_em_kg` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_venda_materias_em_compra` (`id_venda`),
  KEY `fk_material_materias_em_compra` (`id_material`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `materias_em_venda`
--

INSERT INTO `materias_em_venda` (`id`, `id_venda`, `id_material`, `total_em_kg`) VALUES
(1, 1, 2, 20),
(2, 1, 4, 90),
(3, 3, 4, 500),
(4, 3, 5, 100);

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE IF NOT EXISTS `venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` float DEFAULT NULL,
  `data_da_venda` date DEFAULT NULL,
  `id_empresa` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_empresa_venda` (`id_empresa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id`, `total`, `data_da_venda`, `id_empresa`) VALUES
(1, 58.9, '2022-06-03', 1),
(2, 245, '2022-05-18', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
