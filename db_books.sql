-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/05/2024 às 03:20
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
-- Banco de dados: `books`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `autores`
--

CREATE TABLE `autores` (
  `id_autor` int(10) NOT NULL,
  `nome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `cli_id` int(11) NOT NULL,
  `cli_data_inc` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cli_status` enum('0','1') NOT NULL DEFAULT '1',
  `cli_documento` varchar(15) NOT NULL,
  `cli_nome` varchar(100) NOT NULL,
  `cli_aniversario` date NOT NULL,
  `tel_id` int(11) NOT NULL,
  `end_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `data_compra` date NOT NULL,
  `id_livro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `editoras`
--

CREATE TABLE `editoras` (
  `id_editora` int(11) NOT NULL,
  `nome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `endereco`
--

CREATE TABLE `endereco` (
  `end_id` int(11) NOT NULL,
  `end_cli_id` int(11) NOT NULL,
  `end_cep` varchar(10) NOT NULL,
  `end_cidade` varchar(70) NOT NULL,
  `end_uf` char(2) NOT NULL,
  `end_logradouro` varchar(100) NOT NULL,
  `end_numero` varchar(10) NOT NULL,
  `end_bairro` varchar(50) NOT NULL,
  `end_complemento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `id_livros` int(10) NOT NULL,
  `liv_titulo` int(10) NOT NULL,
  `liv_autor` varchar(100) NOT NULL,
  `liv_editora` varchar(45) NOT NULL,
  `liv_genero` text NOT NULL,
  `liv_resumo` text NOT NULL,
  `liv_paginas` int(11) NOT NULL,
  `liv_formato` varchar(40) NOT NULL,
  `idioma` text NOT NULL,
  `ISBN` int(11) NOT NULL,
  `id_autor` int(11) NOT NULL,
  `id_editora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `telefone`
--

CREATE TABLE `telefone` (
  `tel_id` int(11) NOT NULL,
  `tel_cli_id` int(11) NOT NULL,
  `tel_ddd` char(2) NOT NULL,
  `tel_telefone` varchar(15) NOT NULL,
  `tel_id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cli_id`),
  ADD KEY `fk_EndCliente` (`end_id`),
  ADD KEY `fk_TelCliente` (`tel_id`);

--
-- Índices de tabela `compras`
--
ALTER TABLE `compras`
  ADD KEY `compralivro` (`id_compra`);

--
-- Índices de tabela `endereco`
--
ALTER TABLE `endereco`
  ADD KEY `enderecocliente` (`end_cli_id`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livros`),
  ADD KEY `clienteautor` (`id_autor`),
  ADD KEY `clienteeditora` (`id_editora`);

--
-- Índices de tabela `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`tel_id`),
  ADD KEY `fk_CliTel` (`tel_id_cliente`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livros` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `telefone`
--
ALTER TABLE `telefone`
  MODIFY `tel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_EndCliente` FOREIGN KEY (`end_id`) REFERENCES `endereco` (`end_cli_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_TelCliente` FOREIGN KEY (`tel_id`) REFERENCES `telefone` (`tel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compralivro` FOREIGN KEY (`id_compra`) REFERENCES `livros` (`id_livros`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `enderecocliente` FOREIGN KEY (`end_cli_id`) REFERENCES `cliente` (`cli_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `livros`
--
ALTER TABLE `livros`
  ADD CONSTRAINT `clienteautor` FOREIGN KEY (`id_autor`) REFERENCES `livros` (`id_livros`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clienteeditora` FOREIGN KEY (`id_editora`) REFERENCES `livros` (`id_livros`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `fk_CliTel` FOREIGN KEY (`tel_id_cliente`) REFERENCES `cliente` (`cli_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
