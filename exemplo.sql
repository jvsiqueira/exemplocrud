-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Jul-2023 às 20:57
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `exemplo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(5) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `login`, `senha`) VALUES
(1, 'funcionario@gsj.com', '12345678'),
(2, 'login', '123456'),
(3, 'admin@admin.com', '25d55ad283aa400af464c76d713c07ad'),
(4, 'jvts.ifpe@gmail.com', 'e10adc3949ba59abbe56e057f20f883e0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(15) NOT NULL,
  `idAdm` int(15) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `matricula` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `idAdm`, `nome`, `matricula`) VALUES
(2, 3, 'joao vitor', '478fb2bfy2e3e2'),
(3, 3, 'torres', 'j394ri9fji2j');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAdm` (`idAdm`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`idAdm`) REFERENCES `adm` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
