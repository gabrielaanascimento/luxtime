-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 06/06/2025 às 16:37
-- Versão do servidor: 9.1.0
-- Versão do PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testeaula`
--
CREATE DATABASE IF NOT EXISTS `testeaula` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testeaula`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbproduto`
--

DROP TABLE IF EXISTS `tbproduto`;
CREATE TABLE IF NOT EXISTS `tbproduto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `preco` varchar(20) NOT NULL,
  `quantidade` int NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `Id_cadastrou` int NOT NULL,
  `status` varchar(15) NOT NULL,
  `fotoproduto` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tbproduto`
--

INSERT INTO `tbproduto` (`id`, `nome`, `preco`, `quantidade`, `tipo`, `descricao`, `Id_cadastrou`, `status`, `fotoproduto`) VALUES
(1, 'tese', '1.000,00', 40, 'te', 'ee', 1, 'ativo', 'semimagens.png'),
(2, 'uva', '1.000,00', 40, 'teee', 'eee', 1, 'ativo', 'semimagens.png'),
(3, 'teee', '1.000,00', 40, 'bebida', 'ee', 1, 'ativo', 'semimagens.png'),
(4, 'tt', '1.000,00', 40, 'rr', 'rr', 1, 'inativo', 'semimagens.png'),
(5, 'tee', '1.000,00', 40, 'ewe', 'wewe', 1, 'ativo', 'semimagens.png'),
(15, 'celia', '1.000,00', 40, 'bebida', 'teste', 3, 'ativo', 'semimagens.png'),
(7, 'teee', '1.000,00', 40, 'eeeee', 'rere', 1, 'ativo', 'semimagens.png'),
(9, 'tew', '1.000,00', 40, 'te', 'tet', 1, 'ativo', 'semimagens.png'),
(10, 'oi', '1.000,00', 40, 'oo', 'oo', 1, 'ativo', 'semimagens.png'),
(16, 'TESTE', '1.000,00', 40, 'TETEEE', 'TTEE', 2, 'ativo', 'semimagens.png'),
(20, 'ANA', '1.000,00', 40, 'TETE', 'EE', 1, 'ativo', 'semimagens.png'),
(22, '5', '1.000,00', 40, 'bebida', '455', 1, 'ativo', 'bolo.jpg'),
(23, 'uva', '1.000,00', 40, 'roxa', 'fruta', 1, 'ativo', 'semimagens.png'),
(26, 'oculos', '1.000,00', 40, 'visao', 'oculos de grau', 2, 'ativo', 'oculos.jpg'),
(27, 'Macarrao', '1.000,00', 40, 'alimento', 'macarrao instantaneo', 4, 'ativo', 'semimagens.png'),
(28, 'Tv', '1.000,00', 40, 'tevisor', 'lg', 4, 'verificar', 'semimagem.png'),
(30, 'Relogio', '1.000,00', 40, 'pulso', 'digital', 4, 'verificar', 'semimagem.png'),
(31, 'ma', '1.000,00', 40, 'n,dn', 'scadc', 1, 'verificar', 'semimagem.png'),
(32, 'dbab', '1.000,00', 40, 'asa', 'adcadc', 4, 'verificar', 'semimagem.png'),
(33, 'adadad', '', 40, 'adcadcadc', 'dcaadcd', 5, 'verificar', 'semimagens.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
CREATE TABLE IF NOT EXISTS `tbusuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `nivel` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `tbusuario`
--

INSERT INTO `tbusuario` (`id`, `login`, `senha`, `nome`, `nivel`) VALUES
(1, 'celia', '123', 'prof Celia', 'adm'),
(2, 'ana', '369', 'ana maria', 'usuario'),
(3, 'Etec', 'etec', 'etec de poa', 'usuario'),
(4, 'Gabriel', 'senha123', 'Gabriel Augusto', 'adm'),
(5, 'Caio', '123', 'Caio Basilio', 'func');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
