-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06-Jan-2018 às 22:15
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_acesso`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados`
--

CREATE TABLE `dados` (
  `id` int(11) NOT NULL,
  `userSession` varchar(150) NOT NULL,
  `sistema` varchar(150) NOT NULL COMMENT 'Nome do Sistema da Senha',
  `usuarioSistema` varchar(50) NOT NULL,
  `senhaSistema` varchar(150) NOT NULL COMMENT 'Senha informada'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabela que contém os dados para guardar as senhas';

--
-- Extraindo dados da tabela `dados`
--

INSERT INTO `dados` (`id`, `userSession`, `sistema`, `usuarioSistema`, `senhaSistema`) VALUES
(1, 'aalves', 'AcessoPASS', 'aalves', '210694'),
(2, 'aalves', 'ADP RH', 'amontanher', '123456'),
(3, 'aalves', 'GoogleMail', 'aam@gmail.com', 'emailpass'),
(4, 'admin', 'AcessoPASS', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dados`
--
ALTER TABLE `dados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dados`
--
ALTER TABLE `dados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
