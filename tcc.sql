-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31-Dez-2020 às 03:39
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
-- Estrutura da tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `id_agendamento` int(11) NOT NULL,
  `cpf_paciente` varchar(11) NOT NULL,
  `tipo_vacina` int(11) NOT NULL,
  `data_agendada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agendamento`
--

INSERT INTO `agendamento` (`id_agendamento`, `cpf_paciente`, `tipo_vacina`, `data_agendada`) VALUES
(8, '123', 2, '2020-12-08'),
(10, '231', 3, '2020-12-18'),
(11, '321', 7, '2020-12-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dose`
--

CREATE TABLE `dose` (
  `id_dose` int(11) NOT NULL,
  `lote` int(11) NOT NULL,
  `data_tomada` date DEFAULT NULL,
  `local` int(11) NOT NULL,
  `aplicador` int(11) NOT NULL,
  `cpf_paciente` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `local`
--

CREATE TABLE `local` (
  `id_postinho` int(11) NOT NULL,
  `nome_postinho` varchar(100) NOT NULL,
  `endereco` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `local`
--

INSERT INTO `local` (`id_postinho`, `nome_postinho`, `endereco`) VALUES
(2, 'Postinho do Vale do Sol', 'Vale do Sol'),
(4, 'Postinho da Quebrada', 'Acapulco');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lote`
--

CREATE TABLE `lote` (
  `id` int(11) NOT NULL,
  `tipo_vacina` int(11) NOT NULL,
  `fabricante` varchar(100) NOT NULL,
  `origem` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `data_fabricacao` date NOT NULL,
  `data_validade` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lote`
--

INSERT INTO `lote` (`id`, `tipo_vacina`, `fabricante`, `origem`, `destino`, `data_fabricacao`, `data_validade`) VALUES
(111, 2, 'SpeedWagonn', 'Inglaterraa', 'Brasill', '2020-12-01', '2020-12-30'),
(222, 1, 'Industrias Stark', 'EUA', 'Brasil', '2020-12-01', '2020-12-21'),
(333, 6, 'Silph Co', 'Kanto', 'Brasil', '2020-12-17', '2020-12-30');

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
  `cpf_responsavel` int(11) DEFAULT NULL,
  `endereco` varchar(100) NOT NULL,
  `permissao` int(11) NOT NULL,
  `senha` int(6) NOT NULL,
  `telefone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`cpf`, `nome`, `email`, `data_nascimento`, `sexo`, `gestante`, `cpf_responsavel`, `endereco`, `permissao`, `senha`, `telefone`) VALUES
('123', 'Kakashi O brabo', 'asdasd@asasd', '2020-10-15', 'masculino', '', 123, 'asd', 0, 123, 1623146598),
('231', 'Sailor Moon', 'easd@asd', '2020-10-14', 'masculino', 'n', 123, 'AAA', 2, 123, 123),
('321', 'Naruto Uzumaki', 'asd@asd', '2020-10-14', 'masculino', 'n', 123, 'aaaaa', 1, 123, 123);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vacina`
--

CREATE TABLE `vacina` (
  `id_vacina` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vacina`
--

INSERT INTO `vacina` (`id_vacina`, `tipo`, `descricao`) VALUES
(1, 'Triplice bacteriana', 'Contra 99,9% das bactérias'),
(2, 'Hepatite B', 'A vacina da hepatite B é especialmente recomendada para gestantes que não foram vacinadas na infânci'),
(3, 'Pneumonia', 'A pneumonia é uma doença que pode atingir pessoas de todas as idades, mas é mais perigosa para crian'),
(4, 'Febre Amarela', 'A vacina da febre amarela é indicada para pessoas de 6 meses a 60 anos que moram ou que vão viajar p'),
(5, 'Gripe', 'O vírus causador da gripe apresenta uma alta capacidade de mutação. Por causa disso, a vacina é cons'),
(6, 'HPV', 'A vacina quadrivalente contra o HPV, ou papiloma vírus humano, também é uma forma de proteção contra'),
(7, 'Herpes-zóster', 'Qualquer pessoa que teve catapora na infância pode desenvolver o herpes-zóster ou cobreiro, que caus'),
(9, 'Dengue', 'A vacina da dengue é indicada para pessoas de 9 a 45 anos de idade que vivem em regiões endêmicas de');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`id_agendamento`),
  ADD KEY `agendamento_paciente` (`cpf_paciente`),
  ADD KEY `agendamento_vacina` (`tipo_vacina`);

--
-- Índices para tabela `dose`
--
ALTER TABLE `dose`
  ADD PRIMARY KEY (`id_dose`),
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `lote_vacina` (`tipo_vacina`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `vacina`
--
ALTER TABLE `vacina`
  ADD PRIMARY KEY (`id_vacina`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `dose`
--
ALTER TABLE `dose`
  MODIFY `id_dose` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `local`
--
ALTER TABLE `local`
  MODIFY `id_postinho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vacina`
--
ALTER TABLE `vacina`
  MODIFY `id_vacina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `agendamento_paciente` FOREIGN KEY (`cpf_paciente`) REFERENCES `paciente` (`cpf`) ON UPDATE CASCADE,
  ADD CONSTRAINT `agendamento_vacina` FOREIGN KEY (`tipo_vacina`) REFERENCES `vacina` (`id_vacina`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `dose`
--
ALTER TABLE `dose`
  ADD CONSTRAINT `local_dose` FOREIGN KEY (`local`) REFERENCES `local` (`id_postinho`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lote_dose` FOREIGN KEY (`lote`) REFERENCES `lote` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `paciente_dose` FOREIGN KEY (`cpf_paciente`) REFERENCES `paciente` (`cpf`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `lote_vacina` FOREIGN KEY (`tipo_vacina`) REFERENCES `vacina` (`id_vacina`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
