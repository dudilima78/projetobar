-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Dez-2021 às 00:07
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdprojetobar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacao`
--

CREATE TABLE `situacao` (
  `idsituacao` int(11) NOT NULL,
  `situacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `situacao`
--

INSERT INTO `situacao` (`idsituacao`, `situacao`) VALUES
(1, 'Ativo'),
(2, 'Inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblcompras`
--

CREATE TABLE `tblcompras` (
  `idcompra` int(11) NOT NULL,
  `dtcompra` date NOT NULL,
  `idestoque` int(11) NOT NULL,
  `idfuncionario` int(11) NOT NULL,
  `qtd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblcompras`
--

INSERT INTO `tblcompras` (`idcompra`, `dtcompra`, `idestoque`, `idfuncionario`, `qtd`) VALUES
(1, '2021-12-06', 1, 1, 9),
(2, '2021-12-01', 3, 2, 5),
(7, '2021-12-08', 1, 2, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblestoque`
--

CREATE TABLE `tblestoque` (
  `idestoque` int(11) NOT NULL,
  `produto` varchar(100) NOT NULL,
  `preco` float(10,2) NOT NULL,
  `estoque` int(11) NOT NULL,
  `estoquemax` int(11) NOT NULL,
  `estoquemin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblestoque`
--

INSERT INTO `tblestoque` (`idestoque`, `produto`, `preco`, `estoque`, `estoquemax`, `estoquemin`) VALUES
(1, 'Coca-cola lata', 2.00, 100, 200, 50),
(3, 'Smirnoff', 100.00, 10, 15, 5),
(4, 'Fanta', 2.50, 50, 100, 20),
(9, 'Água Mineral 500ml', 2.00, 150, 150, 40);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblfuncionarios`
--

CREATE TABLE `tblfuncionarios` (
  `idfuncionario` int(11) NOT NULL,
  `funcionario` varchar(100) NOT NULL,
  `dtadmissao` date NOT NULL,
  `salario` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblfuncionarios`
--

INSERT INTO `tblfuncionarios` (`idfuncionario`, `funcionario`, `dtadmissao`, `salario`) VALUES
(1, 'Miguel dos Santos', '2021-10-04', 2000.00),
(2, 'José da Silva', '2021-09-13', 2200.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblmenu`
--

CREATE TABLE `tblmenu` (
  `iditem` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `precocusto` float(10,2) NOT NULL,
  `precovenda` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblmenu`
--

INSERT INTO `tblmenu` (`iditem`, `item`, `precocusto`, `precovenda`) VALUES
(1, 'Filé Aperitivo', 40.00, 65.00),
(2, 'Coca-cola', 2.00, 5.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblnivelacesso`
--

CREATE TABLE `tblnivelacesso` (
  `idnivelacesso` int(11) NOT NULL,
  `acesso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblnivelacesso`
--

INSERT INTO `tblnivelacesso` (`idnivelacesso`, `acesso`) VALUES
(1, 'Administrador'),
(2, 'Colaborador'),
(3, 'Usuário'),
(4, 'Fornecedor');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `idsituacao` int(11) NOT NULL,
  `idnivelacesso` int(11) NOT NULL,
  `criado` date NOT NULL,
  `modificado` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblusuarios`
--

INSERT INTO `tblusuarios` (`idusuario`, `nome`, `email`, `senha`, `idsituacao`, `idnivelacesso`, `criado`, `modificado`) VALUES
(2, 'Eduardo', 'dudi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '2021-12-01', '2021-12-01'),
(3, 'Pedro', 'pedro@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 2, '2021-12-02', '2021-12-02'),
(6, 'Antônio', 'antonio@gmail.com', 'c6ac080df238a167674a4914fcefbfa5', 1, 2, '2021-12-01', '2021-12-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblvendas`
--

CREATE TABLE `tblvendas` (
  `idvenda` int(11) NOT NULL,
  `dtvenda` date NOT NULL,
  `idestoque` int(11) NOT NULL,
  `idfuncionario` int(11) NOT NULL,
  `qtd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tblvendas`
--

INSERT INTO `tblvendas` (`idvenda`, `dtvenda`, `idestoque`, `idfuncionario`, `qtd`) VALUES
(1, '2021-12-06', 1, 1, 2),
(2, '2021-12-01', 3, 2, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `situacao`
--
ALTER TABLE `situacao`
  ADD PRIMARY KEY (`idsituacao`);

--
-- Índices para tabela `tblcompras`
--
ALTER TABLE `tblcompras`
  ADD PRIMARY KEY (`idcompra`);

--
-- Índices para tabela `tblestoque`
--
ALTER TABLE `tblestoque`
  ADD PRIMARY KEY (`idestoque`);

--
-- Índices para tabela `tblfuncionarios`
--
ALTER TABLE `tblfuncionarios`
  ADD PRIMARY KEY (`idfuncionario`);

--
-- Índices para tabela `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD PRIMARY KEY (`iditem`);

--
-- Índices para tabela `tblnivelacesso`
--
ALTER TABLE `tblnivelacesso`
  ADD PRIMARY KEY (`idnivelacesso`);

--
-- Índices para tabela `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- Índices para tabela `tblvendas`
--
ALTER TABLE `tblvendas`
  ADD PRIMARY KEY (`idvenda`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `situacao`
--
ALTER TABLE `situacao`
  MODIFY `idsituacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tblcompras`
--
ALTER TABLE `tblcompras`
  MODIFY `idcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tblestoque`
--
ALTER TABLE `tblestoque`
  MODIFY `idestoque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tblfuncionarios`
--
ALTER TABLE `tblfuncionarios`
  MODIFY `idfuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tblmenu`
--
ALTER TABLE `tblmenu`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tblnivelacesso`
--
ALTER TABLE `tblnivelacesso`
  MODIFY `idnivelacesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tblvendas`
--
ALTER TABLE `tblvendas`
  MODIFY `idvenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
