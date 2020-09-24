-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 03-Abr-2020 às 13:33
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vacina`
--
-- --------------------------------------------------------

--
-- Estrutura da tabela `carteirinha`

CREATE TABLE IF NOT EXISTS `carteirinha` (
  `id_carteirinha` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `cod_vacina` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id_carteirinha`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

alter table carteirinha 
add constraint carteirinha_usuario foreign key (cod_usuario) references usuario(id_usuario);
-- --------------------------------------------------------

--
-- Estrutura da tabela `dependente`
--
CREATE TABLE IF NOT EXISTS `dependente` (
  `id_dependente` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `gestante` char(1) NULL,
  PRIMARY KEY (`id_dependente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` char(1) NOT NULL,
  `gestante` char(1) NULL,
  `senha` int(11) NOT NULL,
  `telefone` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `alerta` char(1) NOT NULL,
  `permissao` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vacina`
--

CREATE TABLE IF NOT EXISTS `vacina` (
  `id_vacina` int(11) NOT NULL,
  `dose` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  PRIMARY KEY (`id_vacina`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;