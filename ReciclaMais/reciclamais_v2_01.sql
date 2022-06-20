-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20-Jun-2022 às 13:15
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
  `valor_bonificacao` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `material`
--

INSERT INTO `material` (`id`, `nome`, `preco_por_kg`, `meta_bonificacao_kg`, `valor_bonificacao`) VALUES
(1, 'Cobre', 41, 12, 100),
(2, 'Ferro', 1.1, 200, 25),
(3, 'Aluminio', 3.05, 150, 30),
(4, 'Papel', 0.41, 1000, 20),
(5, 'Garrafa Pet', 0.4, 1000, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `operecao_comercial`
--

CREATE TABLE IF NOT EXISTS `operecao_comercial` (
  `id` int(11) NOT NULL,
  `id_catador` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `id_material` int(11) DEFAULT NULL,
  `quantidade` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_catador_operacoes_comerciais` (`id_catador`),
  KEY `fk_empresa_operacoes_comerciais` (`id_empresa`),
  KEY `fk_material_operacoes_comerciais` (`id_material`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
