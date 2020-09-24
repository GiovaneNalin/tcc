-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 18-Ago-2020 às 18:36
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `tcc`
--
CREATE DATABASE IF NOT EXISTS `tcc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tcc`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carteirinha`
--

CREATE TABLE IF NOT EXISTS `carteirinha` (
  `vacina` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `dose` int(11) NOT NULL,
  `lote` int(11) NOT NULL,
  PRIMARY KEY (`vacina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `cpf` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `gestante` char(1) DEFAULT NULL,
  `cpf_responsavel` int(11) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `permissao` int(11) NOT NULL,
  `senha` int(11) NOT NULL,
  `telefone` int(11) NOT NULL,
  PRIMARY KEY (`cpf`),
  FULLTEXT KEY `endereco` (`endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`cpf`, `nome`, `email`, `data_nascimento`, `sexo`, `gestante`, `cpf_responsavel`, `endereco`, `permissao`, `senha`, `telefone`) VALUES
(1234567891, 'Giovane Nalin', 'giovanenalin@hotmail.com.br', '2001-10-10', 'm', 'n', 2147483647, 'asdasasd', 0, 123123, 2147483647);

-- --------------------------------------------------------

--
-- Estrutura da tabela `proxima_vacinacao`
--

CREATE TABLE IF NOT EXISTS `proxima_vacinacao` (
  `vacina` varchar(100) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`vacina`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vacina`
--

CREATE TABLE IF NOT EXISTS `vacina` (
  `nome` varchar(100) NOT NULL,
  `dose` int(11) NOT NULL,
  `lote` int(11) NOT NULL,
  PRIMARY KEY (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
