-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Jun-2021 às 00:10
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carrinho compras`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE IF NOT EXISTS `produto` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Descricao` varchar(255) NOT NULL,
  `Preco` double(10,2) NOT NULL,
  `foto` varchar(30) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`Id`, `Descricao`, `Preco`, `foto`) VALUES
(1, 'Tenis ADIDAS', 260.00, 'pro1.jpg'),
(2, 'Relogio Smartwatch', 120.00, 'pro2.jpg'),
(3, 'Colar de Prata', 149.00, 'pro3.jpg'),
(4, ' Bone CAVALERA', 89.00, 'pro4.jpg'),
(5, 'Chinelo Slippy ROXY\r\n', 129.90, 'pro5.jpg'),
(6, 'Chinelo FILA', 59.00, 'pro6.jpg'),
(7, 'Chinelo PUMA', 89.00, 'pro7.jpg'),
(8, 'Chinelo BLACK SKULL', 110.00, 'pro8.jpg'),
(9, 'Relogio CASIO', 149.00, 'pro9.jpg'),
(10, 'Relogio ORIENT', 169.00, 'pro10.jpg'),
(11, 'Relogio CHAMPION', 189.00, 'pro11.jpg'),
(12, 'Tenis FILA', 169.00, 'pro12.jpg'),
(13, 'Tenis DC', 189.00, 'pro13.jpg'),
(14, 'Tenis NIKE', 229.00, 'pro14.jpg'),
(15, 'Camiseta NIKE', 119.90, 'pro15.jpg'),
(16, 'Camiseta LACOSTE', 139.00, 'pro16.jpg'),
(17, 'Camiseta ADIDAS', 110.00, 'pro17.jpg'),
(18, 'Camiseta LEVIS', 89.00, 'pro18.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
