CREATE DATABASE `testdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testdb`;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `cedula` text NOT NULL,
  `direccion` text NOT NULL,
  `tlf` text NOT NULL,
  `correo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` enum('Torta Simple','Mini Torta','Raciòn') NOT NULL,
  `tamaño` enum('500g','1Kg','2Kg','3Kg') NOT NULL,
  `sabor` enum('Burrera','Vainilla','Chocolate','Doble Chocolate','Triple Chocolate','Tres Leches','Red Velvet','Domino','Brownie','Brownie con Weed') NOT NULL,
  `topping` enum('Vainilla','Chocolate','Arequipe','Crema Pastelera','Leche Condensada','Weed') NOT NULL,
  `tieneCajaEspecial` tinyint(1) NOT NULL DEFAULT '0',
  `esRegalo` tinyint(1) NOT NULL DEFAULT '0',
  `entrega` date NOT NULL,
  `commentarios` text NOT NULL,
  `cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `password`) VALUES
('ale', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;