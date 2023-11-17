-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/08/2023 às 13:30
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
  `telefone` varchar(20) DEFAULT NULL,
  `nome_responsavel` varchar(60) DEFAULT NULL,
  `sexo_aluno` enum('feminino','masculino','outros') DEFAULT NULL,
  `login_aluno` varchar(15) DEFAULT NULL,
  `senha_aluno` varchar(15) DEFAULT NULL,
  `historico` text NOT NULL,
  `cpf_aluno` varchar(11) DEFAULT NULL,
  `rg_aluno` varchar(11) DEFAULT NULL,
  `email_aluno` varchar(100) DEFAULT NULL,
  `end_rua` varchar(95) NOT NULL,
  `end_bairro` varchar(95) DEFAULT NULL,
  `end_cidade` varchar(95) NOT NULL,
  `end_estado` varchar(95) NOT NULL,
  `end_numero` int(11) NOT NULL,
  `end_complemento` varchar(100) DEFAULT NULL,
  `id_ie` int(11) DEFAULT NULL,
  `situacao` enum('disponivel','indisponivel') NOT NULL,
  `foto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `nome_aluno`, `nascimento_aluno`, `telefone`, `nome_responsavel`, `sexo_aluno`, `login_aluno`, `senha_aluno`, `historico`, `cpf_aluno`, `rg_aluno`, `email_aluno`, `end_rua`, `end_bairro`, `end_cidade`, `end_estado`, `end_numero`, `end_complemento`, `id_ie`, `situacao`, `foto`) VALUES
(20, 'Ludmila Martins Oliveira', '2017-04-10', '+55 (45) 99990-1376', 'Elaine Martins Oliveira', 'feminino', 'Lud', '123', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '140.998.869', '56789009876', 'ludmila.maoli@gmail.com', 'Girassol', 'Jardim Das Flores', 'Foz do Iguaçu', 'Parana', 589, 'casa', 6, 'disponivel', 'imagem_da1e6c88-523d-da46-98a2-01638eada908.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ie`
--

CREATE TABLE `ie` (
  `id_ie` int(11) NOT NULL,
  `nome_ie` varchar(70) NOT NULL,
  `serie_ie` enum('Ensino Fundamental ( 1º ao 5º)','Ensino Fundamental II ( 6º ao 9º)','Ensino Médio ( 1º ao 3º)','Graduação') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ie`
--

INSERT INTO `ie` (`id_ie`, `nome_ie`, `serie_ie`) VALUES
(6, 'IFPR', ''),
(10, 'Dom Pedro III', 'Ensino Fundamental ( 1º ao 5º)');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(3000) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `situacao` enum('disponivel','indisponivel') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `descricao`, `foto`, `situacao`) VALUES
(11, 'Kimono', 'Rosa', 'imagem_3b7a6334-4dca-f606-b0e7-aa0f3b9a843d.webp', 'disponivel');

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
  `email_professor` varchar(100) NOT NULL,
  `foto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`id_professor`, `nome_professor`, `nascimento_professor`, `telefone_professor`, `sexo_professor`, `login_professor`, `senha_professor`, `tipo`, `cpf_professor`, `rg_professor`, `email_professor`, `foto`) VALUES
(8, 'Daniel Di Dommenico', '1988-09-12', '3577-7777', 'masculino', 'Daniel', '123', 'PROFESSOR', 12345678, 34567832, 'daniel.ifpr@gmail.com', ''),
(9, 'Luciana', '2023-08-09', '34567890', 'masculino', 'luciana', '123', 'PROFESSOR', 76659, 98234, 'luciana@gmail.com', 'imagem_a303ed4c-bcf9-980f-d64a-2b279988f6e9.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(11) NOT NULL,
  `nome_turma` varchar(60) NOT NULL,
  `num_alunos` int(11) NOT NULL,
  `horario` varchar(45) NOT NULL,
  `dia_semana` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `nome_turma`, `num_alunos`, `horario`, `dia_semana`) VALUES
(4, 'Meio Ambiente', 45, '7:30', 'Segunda-Feira');

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nome_administrador` varchar(70) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `papeis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nome_administrador`, `login`, `senha`, `papeis`) VALUES
(1, 'Sr. Administrador', 'admin', 'admin', 'ADMINISTRADOR'),
(2, 'Sr. Root', 'root', 'root', 'ADMINISTRADOR');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`),
  ADD KEY `FK_ALUNO_IE` (`id_ie`);

--
-- Índices de tabela `ie`
--
ALTER TABLE `ie`
  ADD PRIMARY KEY (`id_ie`);

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
-- Índices de tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`);

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`),
  ADD UNIQUE KEY `uk_administrador` (`login`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `ie`
--
ALTER TABLE `ie`
  MODIFY `id_ie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `FK_ALUNO_IE` FOREIGN KEY (`id_ie`) REFERENCES `ie` (`id_ie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


/* Tabela turma_professor */
CREATE TABLE turma_professor (
  id_turma_professor INT NOT NULL AUTO_INCREMENT,
  id_turma INT NOT NULL,
  id_professor INT NOT NULL,
  CONSTRAINT pk_turma_professor PRIMARY KEY (id_turma_professor)
);
ALTER TABLE turma_professor ADD CONSTRAINT fk_turma_professor_turma FOREIGN KEY (id_turma) REFERENCES turma (id_turma);
ALTER TABLE turma_professor ADD CONSTRAINT fk_turma_professor_professor FOREIGN KEY (id_professor) REFERENCES professor (id_professor);

ALTER TABLE turma_professor ADD CONSTRAINT uk_turma_professor UNIQUE (id_turma, id_professor);

/* Tabela turma_aluno */
CREATE TABLE turma_aluno (
  id_turma_aluno INT NOT NULL AUTO_INCREMENT,
  id_turma INT NOT NULL,
  id_aluno INT NOT NULL,
  CONSTRAINT pk_turma_aluno PRIMARY KEY (id_turma_aluno)
);

ALTER TABLE turma_aluno ADD CONSTRAINT fk_turma_aluno_turma FOREIGN KEY (id_turma) REFERENCES turma (id_turma);
ALTER TABLE turma_aluno ADD CONSTRAINT fk_turma_aluno_aluno FOREIGN KEY (id_aluno) REFERENCES aluno (id_aluno);

ALTER TABLE turma_aluno ADD CONSTRAINT uk_turma_aluno UNIQUE (id_turma, id_aluno);

CREATE TABLE encontro (
  id_encontro INT NOT NULL AUTO_INCREMENT,
  id_turma INT NOT NULL,
  nome_encontro VARCHAR(100) NOT NULL,
  dia_encontro DATE NOT NULL,
  CONSTRAINT pk_encontro PRIMARY KEY (`id_encontro`)
); 
ALTER TABLE encontro ADD CONSTRAINT fk_encontro_turma FOREIGN KEY (id_turma) REFERENCES turma (id_turma);

CREATE TABLE frequencia (
  id_frequencia INT NOT NULL AUTO_INCREMENT,
  id_encontro INT NOT NULL,
  id_turma_aluno INT NOT NULL,
  condicao enum('presente','ausente') NOT NULL DEFAULT 'presente',
  CONSTRAINT pk_frequencia PRIMARY KEY (id_frequencia)
); 
ALTER TABLE frequencia ADD CONSTRAINT fk_frequencia_encontro FOREIGN KEY (id_encontro) REFERENCES encontro (id_encontro) ON DELETE CASCADE;
ALTER TABLE frequencia ADD CONSTRAINT fk_frequencia_turma_aluno FOREIGN KEY (id_turma_aluno) REFERENCES turma_aluno (id_turma_aluno) ON DELETE CASCADE;
ALTER TABLE frequencia ADD CONSTRAINT uk_encontro_turma_aluno UNIQUE (id_encontro, id_turma_aluno);

CREATE TABLE `video_aula` (
  `id_video_aula` int(11) NOT NULL,
  `nome_video_aula` varchar(95) NOT NULL,  
  `link_video_aula` varchar(1000) NOT NULL
)