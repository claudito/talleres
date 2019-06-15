-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2019 a las 01:46:44
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_taller_escpos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_cab`
--

CREATE TABLE `factura_cab` (
  `id` int(11) NOT NULL,
  `serie` varchar(10) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `cliente` varchar(100) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `subtotal` decimal(15,6) DEFAULT NULL,
  `igv` decimal(15,6) DEFAULT NULL,
  `total` decimal(15,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura_cab`
--

INSERT INTO `factura_cab` (`id`, `serie`, `numero`, `fecha`, `cliente`, `ruc`, `direccion`, `subtotal`, `igv`, `total`) VALUES
(1, 'F001', '0002104', '2019-06-01', 'LUIS AUGUSTO CLAUDIO PONCE', '10467942820', 'MZA. W2 LOTE. 12 COO. SANTA MARTHA LIMA LIMA SAN JUAN DE\r\nLURIGANCHO', '380.480000', '83.520000', '464.000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_det`
--

CREATE TABLE `factura_det` (
  `id` int(11) NOT NULL,
  `serie` varchar(10) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `item` int(11) DEFAULT NULL,
  `codigo` varchar(50) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `unidad` varchar(10) DEFAULT NULL,
  `cantidad` decimal(15,6) DEFAULT NULL,
  `precio` decimal(15,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura_det`
--

INSERT INTO `factura_det` (`id`, `serie`, `numero`, `item`, `codigo`, `descripcion`, `unidad`, `cantidad`, `precio`) VALUES
(1, 'F001', '0002104', 1, '1000789', 'TAZA DE DE PORCELANA', 'UND', '8.000000', '22.000000'),
(2, 'F001', '0002104', 2, '1000790', 'PLATO DE PORCELANA', 'UND', '8.000000', '20.000000'),
(3, 'F001', '0002104', 3, '1000791', 'CUCHARITA DE ACERO', 'UND', '8.000000', '16.000000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `factura_cab`
--
ALTER TABLE `factura_cab`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `factura_det`
--
ALTER TABLE `factura_det`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura_cab`
--
ALTER TABLE `factura_cab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `factura_det`
--
ALTER TABLE `factura_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
