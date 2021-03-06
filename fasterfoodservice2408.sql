-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Ago-2018 às 22:52
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fasterfoodservice`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `nome` varchar(45) NOT NULL,
  `precoCompra` float DEFAULT NULL,
  `precoVenda` float DEFAULT NULL,
  `idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiaprima`
--

CREATE TABLE `materiaprima` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `quantidade` float NOT NULL,
  `precoCompra` float NOT NULL,
  `precoPorPedaco` float NOT NULL,
  `qtdPedacos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `materiaprima`
--

INSERT INTO `materiaprima` (`id`, `nome`, `quantidade`, `precoCompra`, `precoPorPedaco`, `qtdPedacos`) VALUES
(1, 'TOMATE', 50, 15, 0.04, 8),
(3, 'QUEIJO MUSSARELA', 1, 23, 0.23, 100),
(4, 'QUEIJO PARMESãO', 1, 35, 1.17, 30);

-- --------------------------------------------------------

--
-- Estrutura da tabela `materiaprima_produto`
--

CREATE TABLE `materiaprima_produto` (
  `id` int(11) NOT NULL,
  `idMateriaPrima` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `precoCompra` float NOT NULL,
  `precoVenda` float NOT NULL,
  `tipoProduto` int(11) NOT NULL,
  `quantidade` float NOT NULL,
  `idTamanho` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `precoCompra`, `precoVenda`, `tipoProduto`, `quantidade`, `idTamanho`) VALUES
(3, 'coca cola 2 litros', 4, 7, 2, 5, NULL),
(5, 'FANTA 2 LITROS', 4, 7, 2, 5, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanho`
--

CREATE TABLE `tamanho` (
  `id` int(11) NOT NULL,
  `tamanho` varchar(45) NOT NULL,
  `qtdPedacos` int(11) NOT NULL,
  `qtdSabores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tamanho`
--

INSERT INTO `tamanho` (`id`, `tamanho`, `qtdPedacos`, `qtdSabores`) VALUES
(1, 'Pequeno', 8, 1),
(2, 'Médio', 12, 2),
(3, 'Grande', 15, 2),
(4, 'Gigante', 18, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ativo` char(1) NOT NULL,
  `tipoUsuario` int(11) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `rg` varchar(9) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`, `ativo`, `tipoUsuario`, `cpf`, `endereco`, `telefone`, `rg`, `login`, `email`) VALUES
(1, 'Administrador de Sistema', '$2y$10$hynKUzqYPQocrolQDeQOauH7TrAsJ8/q5wUSm0FeNowZfujr7qQ7a', '1', 1, NULL, NULL, NULL, NULL, 'admin', NULL),
(2, 'dsds', '$2y$10$xlFWnmdUdADFO9np/OQDnO7bNp/HTGnhkAkjXUW9QrpqsaSAK94uC', '1', 3, NULL, NULL, NULL, NULL, 'dsds', 'ds@ds.com'),
(3, 'Andréia Arida', '$2y$10$pMo0RZ.ZD2WEzKfKKlup8eWsm3KrVMCX7qmRscUJl.oO4TuX7eav.', '1', 1, NULL, NULL, NULL, NULL, 'midorii', 'andreia@mido2ri.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `dataVenda` date NOT NULL,
  `valorTotal` float NOT NULL,
  `pagamento` varchar(45) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `andamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `materiaprima`
--
ALTER TABLE `materiaprima`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Indexes for table `materiaprima_produto`
--
ALTER TABLE `materiaprima_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMateriaPrima` (`idMateriaPrima`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTamanho` (`idTamanho`);

--
-- Indexes for table `tamanho`
--
ALTER TABLE `tamanho`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `materiaprima`
--
ALTER TABLE `materiaprima`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `materiaprima_produto`
--
ALTER TABLE `materiaprima_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tamanho`
--
ALTER TABLE `tamanho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `historico_ibfk_1` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `materiaprima_produto`
--
ALTER TABLE `materiaprima_produto`
  ADD CONSTRAINT `materiaprima_produto_ibfk_1` FOREIGN KEY (`idMateriaPrima`) REFERENCES `materiaprima` (`id`),
  ADD CONSTRAINT `materiaprima_produto_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idTamanho`) REFERENCES `tamanho` (`id`);

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
