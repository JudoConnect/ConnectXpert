-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/06/2023 às 13:49
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `connectxpert`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(100) DEFAULT NULL,
  `nascimento_aluno` date DEFAULT NULL,
  `telefone` char(10) DEFAULT NULL,
  `nome_responsavel` varchar(60) DEFAULT NULL,
  `sexo_aluno` enum('feminino','masculino','outros') DEFAULT NULL,
  `login_aluno` varchar(15) DEFAULT NULL,
  `senha_aluno` varchar(15) DEFAULT NULL,
  `historico` varchar(230) DEFAULT NULL,
  `cpf_aluno` int(11) DEFAULT NULL,
  `rg_aluno` int(11) DEFAULT NULL,
  `email_aluno` varchar(100) DEFAULT NULL,
  `end_rua` varchar(95) NOT NULL,
  `end_bairro` varchar(95) DEFAULT NULL,
  `end_cidade` varchar(95) NOT NULL,
  `end_estado` varchar(95) NOT NULL,
  `end_numero` int(11) NOT NULL,
  `end_complemento` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `nome_aluno`, `nascimento_aluno`, `telefone`, `nome_responsavel`, `sexo_aluno`, `login_aluno`, `senha_aluno`, `historico`, `cpf_aluno`, `rg_aluno`, `email_aluno`, `end_rua`, `end_bairro`, `end_cidade`, `end_estado`, `end_numero`, `end_complemento`) VALUES
(8, 'Anee', '2023-05-30', '4324234234', 'Marcia', 'feminino', 'ludimila', '890', '', 34567890, 2147483647, 'ludmila.maoli@gmail.com', '', NULL, '', '', 0, NULL),
(9, 'Ana Gls', '2019-10-19', '4324234234', 'Marcia', 'feminino', '@ana', '123', '', 2147483647, 2147483647, 'ana@gmail.com', 'Dos Sonhos', 'Da fantasia', 'City', 'Socialista', 111, '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(3000) NOT NULL,
  `foto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `descricao`, `foto`) VALUES
(1, 'vestido', 'vestido longo', 'foto');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `id_professor` int(60) NOT NULL,
  `nome_professor` varchar(100) DEFAULT NULL,
  `nascimento_professor` date DEFAULT NULL,
  `telefone_professor` varchar(10) DEFAULT NULL,
  `sexo_professor` enum('feminino','masculino','outros') DEFAULT NULL,
  `login_professor` varchar(100) DEFAULT NULL,
  `senha_professor` char(8) DEFAULT NULL,
  `tipo` enum('PROFESSOR','ESTAGIARIO','SECRETARIO','SOCIO','PROPRIETARIO') NOT NULL,
  `cpf_professor` int(11) NOT NULL,
  `rg_professor` int(11) NOT NULL,
  `email_professor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(70) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `papeis` varchar(255) NOT NULL,
  `situacao` enum('disponivel','indisponivel') NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `login`, `senha`, `papeis`, `situacao`, `email`) VALUES
(1, 'Sr. Administrador', 'admin', 'admin', 'ADMINISTRADOR', 'disponivel', ''),
(2, 'Sr. Root', 'root', 'root', 'ADMINISTRADOR', 'disponivel', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `uk_usuario` (`login`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(60) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `ie` (
  `id_ie` int(11) NOT NULL AUTO_INCREMENT,
  `nome_ie` varchar(70) NOT NULL,
   PRIMARY KEY (`id_ie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO ie (nome_ie) VALUES('IFPR');
INSERT INTO ie (nome_ie) VALUES('Colegio Estadual Barao');
INSERT INTO ie (nome_ie) VALUES('Colegio CPM');

ALTER TABLE aluno ADD COLUMN id_ie INT;
ALTER TABLE aluno ADD CONSTRAINT FK_ALUNO_IE FOREIGN KEY (id_ie) REFERENCES ie (id_ie);