-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Nov-2023 às 01:25
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `nome_administrador` varchar(70) NOT NULL,
  `login` varchar(15) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `papeis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nome_administrador`, `login`, `senha`, `papeis`) VALUES
(1, 'Sr. Administrador', 'admin', 'admin', 'ADMINISTRADOR'),
(2, 'Sr. Root', 'root', 'root', 'ADMINISTRADOR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(100) NOT NULL,
  `nascimento_aluno` date NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `nome_responsavel` varchar(60) NOT NULL,
  `sexo_aluno` enum('feminino','masculino','outros') NOT NULL,
  `login_aluno` varchar(15) NOT NULL,
  `senha_aluno` varchar(15) NOT NULL,
  `historico` text NOT NULL,
  `cpf_aluno` varchar(20) NOT NULL,
  `rg_aluno` varchar(20) NOT NULL,
  `email_aluno` varchar(100) NOT NULL,
  `end_rua` varchar(95) NOT NULL,
  `end_bairro` varchar(95) NOT NULL,
  `end_cidade` varchar(95) NOT NULL,
  `end_estado` varchar(95) NOT NULL,
  `end_numero` int(11) NOT NULL,
  `end_complemento` varchar(100) DEFAULT NULL,
  `id_ie` int(11) NOT NULL,
  `situacao` enum('disponivel','indisponivel') NOT NULL,
  `foto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `nome_aluno`, `nascimento_aluno`, `telefone`, `nome_responsavel`, `sexo_aluno`, `login_aluno`, `senha_aluno`, `historico`, `cpf_aluno`, `rg_aluno`, `email_aluno`, `end_rua`, `end_bairro`, `end_cidade`, `end_estado`, `end_numero`, `end_complemento`, `id_ie`, `situacao`, `foto`) VALUES
(20, 'Ludmila Martins Oliveira', '2017-04-10', '+55 (45) 99990-1376', 'Elaine Martins Oliveira', 'feminino', 'Lud', '123', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '140.998.869', '56789009876', 'ludmila.maoli@gmail.com', 'Girassol', 'Jardim Das Flores', 'Foz do Iguaçu', 'Parana', 589, 'casa', 6, 'disponivel', 'imagem_da1e6c88-523d-da46-98a2-01638eada908.jpg'),
(21, 'Graciely Azevedo Demitrovich', '2005-01-16', '(45)999347690', 'Adriana', 'feminino', 'Graci', '123', '', '479.730.765', '44.607.371-', 'graci.demitrovich@gmail.com', 'Rua Montaha Osman', 'Jardim Dona Fatima', 'Foz do Iguaçu', 'Paraná', 111, 'casa', 10, 'disponivel', 'imagem_a85f80f1-00d8-adac-bbd1-3b5c70cc6b6c.jpg'),
(22, 'Graciely Azevedo Demitrovich', '2005-01-16', '(45)999347690', 'Adriana', 'feminino', 'Graci', '123', '', '479.730.765', '44.607.371-', 'graci.demitrovich@gmail.com', 'Rua Montaha Osman', 'Jardim Dona Fatima', 'Foz do Iguaçu', 'Paraná', 111, 'casa', 10, 'indisponivel', 'imagem_a43d1708-54c7-b67f-19f7-9b7f4660d7fc.png'),
(23, 'Graciely Azevedo Demitrovich', '2005-01-16', '(45)999347690', 'Adriana', 'feminino', 'Graci', '123', '', '479.730.765', '44.607.371-', 'graci.demitrovich@gmail.com', 'Rua Montaha Osman', 'Jardim Dona Fatima', 'Foz do Iguaçu', 'Paraná', 111, 'casa', 10, 'indisponivel', 'imagem_9759fdce-e7da-e517-c8ed-5e66103cec6b.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encontro`
--

CREATE TABLE `encontro` (
  `id_encontro` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `nome_encontro` varchar(100) NOT NULL,
  `dia_encontro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `encontro`
--

INSERT INTO `encontro` (`id_encontro`, `id_turma`, `nome_encontro`, `dia_encontro`) VALUES
(6, 4, 'mariano', '2023-10-07'),
(7, 5, '2', '2023-11-02'),
(8, 5, '3', '2023-11-03'),
(11, 4, '4', '2023-12-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `frequencia`
--

CREATE TABLE `frequencia` (
  `id_frequencia` int(11) NOT NULL,
  `id_encontro` int(11) NOT NULL,
  `id_turma_aluno` int(11) NOT NULL,
  `condicao` enum('presente','ausente') NOT NULL DEFAULT 'presente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `frequencia`
--

INSERT INTO `frequencia` (`id_frequencia`, `id_encontro`, `id_turma_aluno`, `condicao`) VALUES
(4, 6, 1, 'ausente'),
(7, 7, 3, 'presente'),
(9, 8, 3, 'presente'),
(14, 6, 2, 'presente'),
(15, 11, 1, 'ausente'),
(16, 11, 2, 'presente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ie`
--

CREATE TABLE `ie` (
  `id_ie` int(11) NOT NULL,
  `nome_ie` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `ie`
--

INSERT INTO `ie` (`id_ie`, `nome_ie`) VALUES
(6, 'IFPR'),
(10, 'Dom Pedro III');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(3000) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `situacao` enum('disponivel','indisponivel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome`, `descricao`, `foto`, `situacao`) VALUES
(11, 'Kimono', 'Rosa', 'imagem_3b7a6334-4dca-f606-b0e7-aa0f3b9a843d.webp', 'indisponivel'),
(12, 'Lápis', 'Caixa com 5 lápis laranja', 'imagem_28ac3630-110c-d263-ce4d-108411ca5244.jpg', 'disponivel'),
(14, 'a', 'a', 'imagem_c7f1345b-4697-3c62-1535-0ce4363328e2.png', 'disponivel');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `id_professor` int(60) NOT NULL,
  `nome_professor` varchar(100) NOT NULL,
  `nascimento_professor` date NOT NULL,
  `telefone_professor` varchar(20) NOT NULL,
  `sexo_professor` enum('feminino','masculino','outros') NOT NULL,
  `login_professor` varchar(100) NOT NULL,
  `senha_professor` char(8) NOT NULL,
  `tipo` enum('PROFESSOR','ESTAGIARIO','SECRETARIO','SOCIO','PROPRIETARIO') NOT NULL,
  `cpf_professor` varchar(20) NOT NULL,
  `rg_professor` varchar(20) NOT NULL,
  `email_professor` varchar(100) NOT NULL,
  `foto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id_professor`, `nome_professor`, `nascimento_professor`, `telefone_professor`, `sexo_professor`, `login_professor`, `senha_professor`, `tipo`, `cpf_professor`, `rg_professor`, `email_professor`, `foto`) VALUES
(8, 'Daniel Di Dommenico', '1988-09-12', '(45)99990-', 'masculino', 'Daniel', '123', 'PROFESSOR', '140998', '12614', 'daniel.ifpr@gmail.com', 'imagem_984ca5e0-e534-bc3a-6f9d-27453dec32b1.png'),
(9, 'Luciana', '2023-08-09', '34567890', 'masculino', 'luciana', '123', 'PROFESSOR', '76659', '98234', 'luciana@gmail.com', 'imagem_a303ed4c-bcf9-980f-d64a-2b279988f6e9.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `id_turma` int(11) NOT NULL,
  `nome_turma` varchar(60) NOT NULL,
  `num_alunos` int(11) NOT NULL,
  `horario` varchar(45) NOT NULL,
  `dia_semana` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `nome_turma`, `num_alunos`, `horario`, `dia_semana`) VALUES
(4, 'Meio Ambiente', 45, '7:30', 'Segunda-Feira'),
(5, 'Desenvolvimento de Sistemas', 40, '7:30 á 12:00', 'Segunda-Feira á Sexta-Feira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_aluno`
--

CREATE TABLE `turma_aluno` (
  `id_turma_aluno` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `turma_aluno`
--

INSERT INTO `turma_aluno` (`id_turma_aluno`, `id_turma`, `id_aluno`) VALUES
(1, 4, 20),
(2, 4, 21),
(3, 5, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma_professor`
--

CREATE TABLE `turma_professor` (
  `id_turma_professor` int(11) NOT NULL,
  `id_turma` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `turma_professor`
--

INSERT INTO `turma_professor` (`id_turma_professor`, `id_turma`, `id_professor`) VALUES
(1, 4, 8),
(2, 4, 9),
(3, 5, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `video_aula`
--

CREATE TABLE `video_aula` (
  `id_video_aula` int(11) NOT NULL,
  `nome_video_aula` varchar(95) NOT NULL,
  `link_video_aula` varchar(1000) NOT NULL,
  `id_professor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `video_aula`
--

INSERT INTO `video_aula` (`id_video_aula`, `nome_video_aula`, `link_video_aula`, `id_professor`) VALUES
(2, 'Curso de Tecnologia em Análise e desenvolvimento de Sistemas [LIBRAS]', 'https://www.youtube.com/embed/3E_9PUo58hQ?si=NI_Pzo6My8aV_eqh', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`),
  ADD UNIQUE KEY `uk_usuario` (`login`);

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id_aluno`),
  ADD KEY `FK_ALUNO_IE` (`id_ie`);

--
-- Índices para tabela `encontro`
--
ALTER TABLE `encontro`
  ADD PRIMARY KEY (`id_encontro`),
  ADD KEY `fk_encontro_turma` (`id_turma`);

--
-- Índices para tabela `frequencia`
--
ALTER TABLE `frequencia`
  ADD PRIMARY KEY (`id_frequencia`),
  ADD UNIQUE KEY `uk_encontro_turma_aluno` (`id_encontro`,`id_turma_aluno`),
  ADD KEY `fk_frequencia_turma_aluno` (`id_turma_aluno`);

--
-- Índices para tabela `ie`
--
ALTER TABLE `ie`
  ADD PRIMARY KEY (`id_ie`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id_produto`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id_professor`);

--
-- Índices para tabela `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`id_turma`);

--
-- Índices para tabela `turma_aluno`
--
ALTER TABLE `turma_aluno`
  ADD PRIMARY KEY (`id_turma_aluno`),
  ADD UNIQUE KEY `uk_turma_aluno` (`id_turma`,`id_aluno`),
  ADD KEY `fk_turma_aluno_aluno` (`id_aluno`);

--
-- Índices para tabela `turma_professor`
--
ALTER TABLE `turma_professor`
  ADD PRIMARY KEY (`id_turma_professor`),
  ADD UNIQUE KEY `uk_turma_professor` (`id_turma`,`id_professor`),
  ADD KEY `fk_turma_professor_professor` (`id_professor`);

--
-- Índices para tabela `video_aula`
--
ALTER TABLE `video_aula`
  ADD PRIMARY KEY (`id_video_aula`),
  ADD KEY `fk_video_aula_professor` (`id_professor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `encontro`
--
ALTER TABLE `encontro`
  MODIFY `id_encontro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `frequencia`
--
ALTER TABLE `frequencia`
  MODIFY `id_frequencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `ie`
--
ALTER TABLE `ie`
  MODIFY `id_ie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id_professor` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `turma`
--
ALTER TABLE `turma`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `turma_aluno`
--
ALTER TABLE `turma_aluno`
  MODIFY `id_turma_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `turma_professor`
--
ALTER TABLE `turma_professor`
  MODIFY `id_turma_professor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `video_aula`
--
ALTER TABLE `video_aula`
  MODIFY `id_video_aula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `FK_ALUNO_IE` FOREIGN KEY (`id_ie`) REFERENCES `ie` (`id_ie`);

--
-- Limitadores para a tabela `encontro`
--
ALTER TABLE `encontro`
  ADD CONSTRAINT `fk_encontro_turma` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`);

--
-- Limitadores para a tabela `frequencia`
--
ALTER TABLE `frequencia`
  ADD CONSTRAINT `fk_frequencia_encontro` FOREIGN KEY (`id_encontro`) REFERENCES `encontro` (`id_encontro`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_frequencia_turma_aluno` FOREIGN KEY (`id_turma_aluno`) REFERENCES `turma_aluno` (`id_turma_aluno`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `turma_aluno`
--
ALTER TABLE `turma_aluno`
  ADD CONSTRAINT `fk_turma_aluno_aluno` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`),
  ADD CONSTRAINT `fk_turma_aluno_turma` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`);

--
-- Limitadores para a tabela `turma_professor`
--
ALTER TABLE `turma_professor`
  ADD CONSTRAINT `fk_turma_professor_professor` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`),
  ADD CONSTRAINT `fk_turma_professor_turma` FOREIGN KEY (`id_turma`) REFERENCES `turma` (`id_turma`);

--
-- Limitadores para a tabela `video_aula`
--
ALTER TABLE `video_aula`
  ADD CONSTRAINT `fk_video_aula_professor` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id_professor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
