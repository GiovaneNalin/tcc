-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12-Out-2020 às 23:06
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dose`
--

CREATE TABLE `dose` (
  `nome` varchar(100) NOT NULL,
  `lote` int(11) NOT NULL,
  `data_tomada` date DEFAULT NULL,
  `data_agendada` date DEFAULT NULL,
  `confirmacao` int(11) NOT NULL,
  `local` int(11) NOT NULL,
  `aplicador` varchar(100) NOT NULL,
  `cpf_paciente` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `dose`
--

INSERT INTO `dose` (`nome`, `lote`, `data_tomada`, `data_agendada`, `confirmacao`, `local`, `aplicador`, `cpf_paciente`) VALUES
('COVID-19', 123, '2020-10-22', NULL, 1, 123, 'Janaina', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE `local` (
  `id_postinho` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `local`
--

INSERT INTO `local` (`id_postinho`, `nome`) VALUES
(123, 'Postinho Vale do Sol');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lote`
--

CREATE TABLE `lote` (
  `id` int(11) NOT NULL,
  `fabricante` varchar(100) NOT NULL,
  `origem` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lote`
--

INSERT INTO `lote` (`id`, `fabricante`, `origem`, `destino`) VALUES
(123, 'Speedwagon', 'Inglaterra', 'Brasil - Araraquara');

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(300) NOT NULL,
  `email` varchar(100) NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` char(10) NOT NULL,
  `gestante` char(1) NOT NULL,
  `cpf_responsavel` int(11) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `permissao` int(11) NOT NULL,
  `senha` int(6) NOT NULL,
  `telefone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`cpf`, `nome`, `email`, `data_nascimento`, `sexo`, `gestante`, `cpf_responsavel`, `endereco`, `permissao`, `senha`, `telefone`) VALUES
('123', 'Giorno Giovanna', 'email@email.com', '2020-10-15', 'm', 'n', 123, 'asd', 0, 123, 1623146598);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vacina`
--

CREATE TABLE `vacina` (
  `tipo` varchar(100) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `vacina`
--

INSERT INTO `vacina` (`tipo`, `descricao`) VALUES
('COVID-19', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at ante mauris. Mauris sed nisi quam. Aenean nec metus sed lectus auctor auctor. Phasellus ullamcorper eros scelerisque erat imperdiet, non lobortis dolor dignissim. Integer a tincidunt eros, sed mollis enim. Curabitur ornare urna quis nunc pulvinar, laoreet ultricies elit pulvinar. Curabitur suscipit arcu ut leo semper imperdiet. Sed auctor tortor vel quam molestie ornare. Aenean nec fringilla libero.');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `dose`
--
ALTER TABLE `dose`
  ADD PRIMARY KEY (`nome`),
  ADD KEY `lote` (`lote`),
  ADD KEY `local_dose` (`local`),
  ADD KEY `paciente_dose` (`cpf_paciente`);

--
-- Índices para tabela `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id_postinho`);

--
-- Índices para tabela `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `vacina`
--
ALTER TABLE `vacina`
  ADD PRIMARY KEY (`tipo`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `dose`
--
ALTER TABLE `dose`
  ADD CONSTRAINT `local_dose` FOREIGN KEY (`local`) REFERENCES `local` (`id_postinho`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lote_dose` FOREIGN KEY (`lote`) REFERENCES `lote` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `paciente_dose` FOREIGN KEY (`cpf_paciente`) REFERENCES `paciente` (`cpf`) ON UPDATE CASCADE,
  ADD CONSTRAINT `vacina_dose` FOREIGN KEY (`nome`) REFERENCES `vacina` (`tipo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
