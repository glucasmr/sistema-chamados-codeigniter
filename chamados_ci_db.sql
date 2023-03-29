-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Mar-2023 às 06:13
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
-- Banco de dados: `chamados_ci_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_status`
--

CREATE TABLE `tb_status` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_status`
--

INSERT INTO `tb_status` (`id`, `status`) VALUES
(1, 'Novo'),
(2, 'Pendente'),
(3, 'Solucionado'),
(4, 'Em atendimento'),
(5, 'Em espera');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tickets`
--

CREATE TABLE `tb_tickets` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `status_id` tinytext NOT NULL,
  `create_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `update_date` date NOT NULL,
  `userfile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_tickets`
--

INSERT INTO `tb_tickets` (`id`, `title`, `description`, `status_id`, `create_date`, `user_id`, `update_date`, `userfile`) VALUES
(95, 'Chamado do Administrador', 'Descrição do problema', '3', '2023-03-29', 1, '2023-03-29', ''),
(96, 'Título do chamado', 'Descrição do chamado', '2', '2023-03-29', 1, '2023-03-29', ''),
(97, 'Novo chamado', 'Problema', '5', '2023-03-29', 1, '2023-03-29', ''),
(98, 'Chamado do usuário', 'Problema do usuário', '1', '2023-03-29', 2, '2023-03-29', ''),
(99, 'Título do Chamado', 'Descrição do chamado', '4', '2023-03-29', 2, '2023-03-29', ''),
(100, 'Chamado', 'Descrição', '3', '2023-03-29', 2, '2023-03-29', ''),
(101, 'Problema de conexão', 'Não consigo conectar à internet', '4', '2022-01-01', 1, '2023-03-29', ''),
(102, 'Erro no sistema', 'Ao tentar fazer login, aparece uma mensagem de erro', '1', '2022-01-03', 2, '2022-01-04', ''),
(103, 'Pedido de suporte', 'Preciso de ajuda para instalar um novo software', '3', '2022-01-05', 1, '2023-03-29', ''),
(104, 'Atualização do software', 'Preciso atualizar o sistema operacional', '1', '2022-01-07', 3, '2022-01-08', ''),
(105, 'Problema de hardware', 'Meu computador está desligando sozinho', '4', '2022-01-09', 2, '2023-03-29', ''),
(106, 'Problema de conexão', 'Não consigo conectar à internet', '1', '2022-01-01', 1, '2022-01-02', ''),
(107, 'Erro no sistema', 'Ao tentar fazer login, aparece uma mensagem de erro', '3', '2022-01-03', 2, '2023-03-29', ''),
(108, 'Pedido de suporte', 'Preciso de ajuda para instalar um novo software', '4', '2022-01-05', 1, '2023-03-29', ''),
(109, 'Atualização do software', 'Preciso atualizar o sistema operacional', '5', '2022-01-07', 3, '2023-03-29', ''),
(110, 'Problema de hardware', 'Meu computador está desligando sozinho', '2', '2022-01-09', 2, '2023-03-29', ''),
(111, 'Problema com impressora', 'A impressora não está imprimindo corretamente', '2', '2022-02-01', 1, '2023-03-29', ''),
(112, 'Erro de software', 'O aplicativo que estou usando está travando constantemente', '1', '2022-02-03', 2, '2022-02-04', ''),
(113, 'Pedido de suporte', 'Preciso de ajuda para configurar minha conta de e-mail', '4', '2022-02-05', 1, '2023-03-29', ''),
(114, 'Atualização do sistema', 'Preciso atualizar o sistema operacional', '3', '2022-02-07', 3, '2023-03-29', ''),
(115, 'Problema de hardware', 'O monitor do meu computador está exibindo imagens distorcidas', '2', '2022-02-09', 2, '2023-03-29', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`id`, `name`, `email`, `password`, `is_admin`) VALUES
(1, 'Admin', 'admin@email.com', '202cb962ac59075b964b07152d234b70', 1),
(2, 'Usuário', 'user@email.com', '202cb962ac59075b964b07152d234b70', 0),
(3, 'Novo usuário', 'new@email.com', '202cb962ac59075b964b07152d234b70', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_tickets`
--
ALTER TABLE `tb_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_tickets`
--
ALTER TABLE `tb_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
