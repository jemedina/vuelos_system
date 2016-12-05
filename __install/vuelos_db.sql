-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2016 at 06:44 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vuelos_db`
--
CREATE DATABASE IF NOT EXISTS `vuelos_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `vuelos_db`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `aereopuertos`
--

CREATE TABLE `aereopuertos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aereopuertos`
--

INSERT INTO `aereopuertos` (`id`, `nombre`) VALUES
(1, 'Aguascalientes'),
(2, 'Guadalajara'),
(3, 'Dubai'),
(4, 'Madrid'),
(5, 'New York'),
(6, 'Paris'),
(7, 'Toronto'),
(8, 'Las Vegas'),
(9, 'Mexico DF'),
(10, 'Sydney'),
(11, 'Hong Kong'),
(12, 'Venecia'),
(13, 'Tokyo'),
(14, 'Roma'),
(15, 'Buenos Aires'),
(16, 'Cairo'),
(17, 'Cancun'),
(18, 'Rio de Janeiro'),
(19, 'Londres'),
(20, 'Barcelona'),
(21, 'Los Angeles CA'),
(22, 'San Francisco'),
(23, 'Amsterdam'),
(24, 'Vaticano');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `email` varchar(80) DEFAULT NULL,
  `telefono` varchar(40) DEFAULT NULL,
  `domicilio` varchar(120) DEFAULT NULL,
  `titular` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `email`, `telefono`, `domicilio`, `titular`) VALUES
(1, 'x', '2243444343', 'x', 'x'),
(2, 'x', '2243444343', 'x', 'x'),
(3, 'xx', 'xx', 'ss', 'xx'),
(4, 'dd', 'dd', 'dd', 'dd'),
(5, 's', 's', 's', 's'),
(6, 'xxx', 'xxx', 'x', 'xxx'),
(7, 's', 's', 'a', 's'),
(8, 'dd', 'df', 'f', 'df'),
(9, 'f', 'f', 'g', 'df'),
(10, 'f', 'f', 'f', 'f'),
(11, 'f', 'f', 'f', 'f'),
(12, 'f', 'f', 'f', 'f'),
(13, 'r', 'r', 'r', 'r'),
(14, 'dd', 'dd', 'dd', 'dd'),
(15, 'dd', 'dd', 'dd', 'dd'),
(16, 'wef', 'wef', 'wef', 'we'),
(17, 'wef', 'wef', 'wef', 'we'),
(18, 'wef', 'wef', 'wef', 'we'),
(19, 'f', 'g', 'h', 'd'),
(20, 'f', 'g', 'h', 'd'),
(21, 'f', 'g', 'h', 'd'),
(22, 'g', 'g', 'h', 'f'),
(23, 'g', 'g', 'h', 'f'),
(24, 'g', 'g', 'h', 'f'),
(25, 'rt', 'rt', 'rt', 'rt'),
(26, 'rt', 'rt', 'rt', 'rt'),
(27, 'rt', 'rt', 'rt', 'rt'),
(28, 'f', 'f', 'f', 'f'),
(29, 'f', 'f', 'f', 'f'),
(30, 'g', 'gg', 'g', 'g'),
(31, 'g', 'gg', 'g', 'g'),
(32, 'e', 'e', 'e', 'e'),
(33, 'e', 'e', 'e', 'e'),
(34, 'e', 'e', 'e', 'e'),
(35, 'e', 'e', 'e', 'e'),
(36, 'xx', 'xx', 'xX', 'xx'),
(37, 's', 's', 's', 's'),
(38, 'w', 'ww', 'w', 'wew'),
(39, 'e', 'e', 'e', 'e'),
(40, 'e', 'e', 'e', 'e'),
(41, 'e', 'e', 'e', 'e'),
(42, 'd', 'd', 'd', 'd'),
(43, 'gg', 'g', 'g', 'gg'),
(44, 'sw', 's', 's', 'we'),
(45, 'sw', 's', 's', 'we'),
(46, 'sw', 's', 's', 'we'),
(47, 'sw', 's', 's', 'we'),
(48, 'sw', 's', 's', 'we'),
(49, 'e', 'e', 'e', 'e'),
(50, 'e', 'e', 'e', 'e'),
(51, 'd', 'dd', 'd', 'ddd'),
(52, '333', '333', '333', '333'),
(53, 'sdf', 'sdf', 'sdf', 'sdef'),
(54, 'sdf', 'sdf', 'sdf', 'sdef'),
(55, 'sdf', 'sdf', 'sdf', 'sdef'),
(56, 'sdf', 'sdf', 'sdf', 'sdef'),
(57, 'sdf', 'sdf', 'sdf', 'sdef'),
(58, 'sdf', 'sdf', 'sdf', 'sdef'),
(59, 'sdf', 'sdf', 'sdf', 'sdef'),
(60, 'sdf', 'sdf', 'sdf', 'sdef'),
(61, 'sdf', 'sdf', 'sdf', 'sdef'),
(62, 'sdf', 'sdf', 'sdf', 'sdef'),
(63, 'sdf', 'sdf', 'sdf', 'sdef'),
(64, 's', 's', 's', 's'),
(65, 'e', 'e', 'e', 'e'),
(66, 'e', 'e', 'e', 'e'),
(67, 'm', 'm', 'm', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_asientos`
--

CREATE TABLE `detalle_asientos` (
  `id_vuelo_disponible` int(11) DEFAULT NULL,
  `id_titular` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_asientos`
--

INSERT INTO `detalle_asientos` (`id_vuelo_disponible`, `id_titular`, `numero`, `estado`) VALUES
(1, 8, 13, 1),
(1, 10, 8, 1),
(2, 13, 13, 1),
(2, 10, 5, 1),
(1, 25, 12, 1),
(2, 32, 10, 1),
(2, 32, 11, 1),
(15, 3, 2, 1),
(15, 5, 7, 1),
(15, 38, 35, 1),
(27, 16, 5, 1),
(27, 16, 5, 1),
(27, 32, 10, 1),
(27, 32, 11, 1),
(27, 32, 14, 1),
(27, 32, 19, 1),
(27, 32, 20, 1),
(27, 32, 21, 1),
(27, 51, 3, 1),
(27, 52, 17, 1),
(27, 5, 1, 1),
(27, 32, 2, 1),
(27, 67, 26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `otros_pasajeros`
--

CREATE TABLE `otros_pasajeros` (
  `folio_reserva` int(11) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otros_pasajeros`
--

INSERT INTO `otros_pasajeros` (`folio_reserva`, `nombre`) VALUES
(3, ''),
(11, ''),
(11, ''),
(11, ''),
(23, ''),
(23, ''),
(24, ''),
(24, '');

-- --------------------------------------------------------

--
-- Table structure for table `reserva`
--

CREATE TABLE `reserva` (
  `folio` int(11) NOT NULL,
  `id_vuelo_disponible` int(11) DEFAULT NULL,
  `nro_pasajeros` int(11) DEFAULT NULL,
  `tipo_vuelo` varchar(40) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `costo_extra` int(11) DEFAULT NULL,
  `metodo_pago` varchar(30) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reserva`
--

INSERT INTO `reserva` (`folio`, `id_vuelo_disponible`, `nro_pasajeros`, `tipo_vuelo`, `costo`, `costo_extra`, `metodo_pago`, `id_cliente`) VALUES
(1, 1, 1, 'sencillo', 8000, 0, 'pago en sucursal', 1),
(2, 2, 1, 'sencillo', 8000, 0, 'pago en sucursal', 5),
(3, 2, 1, 'sencillo', 8000, 0, 'pago en sucursal', 6),
(4, 1, 1, 'sencillo', 8000, 0, 'pago en sucursal', 5),
(5, 1, 1, 'sencillo', 8000, 0, 'pago en sucursal', 8),
(6, 1, 1, 'sencillo', 8000, 0, 'pago en sucursal', 8),
(7, 1, 1, 'sencillo', 8000, 0, 'pago en sucursal', 10),
(8, 2, 1, 'sencillo', 8000, 0, 'pago en sucursal', 13),
(9, 2, 1, 'sencillo', 8000, 0, 'pago en sucursal', 10),
(10, 1, 1, 'sencillo', 8000, 0, 'pago en sucursal', 25),
(11, 2, 2, 'sencillo', 16000, 0, 'pago en sucursal', 32),
(12, 15, 1, 'sencillo', 8000, 0, 'pago en sucursal', 3),
(13, 15, 1, 'sencillo', 8000, 0, 'pago en sucursal', 5),
(14, 15, 1, 'sencillo', 8000, 0, 'pago en sucursal', 38),
(23, 27, 3, 'sencillo', 666666, 0, 'pago en sucursal', 32),
(24, 27, 3, 'sencillo', 666666, 0, 'pago en sucursal', 32),
(25, 27, 1, 'sencillo', 222222, 0, 'pago en sucursal', 51),
(26, 27, 1, 'sencillo', 222222, 0, 'pago en sucursal', 52),
(27, 27, 1, 'sencillo', 0, 0, 'pago con tarjeta', 53),
(28, 27, 1, 'sencillo', 0, 0, 'pago con tarjeta', 53),
(29, 27, 1, 'sencillo', 0, 0, 'pago con tarjeta', 53),
(30, 27, 1, 'sencillo', 222222, 1500, 'pago en sucursal', 5),
(31, 27, 1, 'sencillo', 222222, 0, 'pago en sucursal', 32),
(32, 27, 1, 'sencillo', 222222, 0, 'pago en sucursal', 67);

-- --------------------------------------------------------

--
-- Table structure for table `vuelos_disponibles`
--

CREATE TABLE `vuelos_disponibles` (
  `id` int(11) NOT NULL,
  `id_vuelo_especifico` int(11) DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `hore_llegada` time DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `fecha_llegada` date DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `hora_salida_redondo` time DEFAULT NULL,
  `hore_llegada_redondo` time DEFAULT NULL,
  `fecha_salida_redondo` date DEFAULT NULL,
  `fecha_llegada_redondo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vuelos_disponibles`
--

INSERT INTO `vuelos_disponibles` (`id`, `id_vuelo_especifico`, `hora_salida`, `hore_llegada`, `fecha_salida`, `fecha_llegada`, `precio`, `hora_salida_redondo`, `hore_llegada_redondo`, `fecha_salida_redondo`, `fecha_llegada_redondo`) VALUES
(1, 1, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04', 8000, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04'),
(2, 2, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04', 8000, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04'),
(3, 3, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04', 8000, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04'),
(4, 4, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04', 8000, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04'),
(5, 5, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04', 8000, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04'),
(6, 6, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04', 8000, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04'),
(7, 7, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04', 8000, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04'),
(8, 8, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04', 8000, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04'),
(9, 9, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04', 8000, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04'),
(10, 10, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04', 8000, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04'),
(11, 11, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04', 8000, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04'),
(12, 12, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04', 8000, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04'),
(13, 13, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04', 8000, '17:25:16', '17:25:16', '2016-12-04', '2016-12-04'),
(14, 14, '01:01:00', '14:02:00', '2016-12-04', '2016-12-06', 2000, '00:00:00', '00:00:00', '0000-00-00', '0000-00-00'),
(15, 15, '12:00:00', '20:00:00', '2016-12-05', '2016-12-05', 8000, '00:00:00', '00:00:00', '0000-00-00', '0000-00-00'),
(16, 16, '10:00:00', '17:00:00', '2016-12-05', '2016-12-04', 14000, NULL, NULL, NULL, NULL),
(17, 18, '01:01:00', '02:00:00', '2016-12-02', '2016-12-04', 9000, NULL, NULL, NULL, NULL),
(18, 18, '01:01:00', '02:01:00', '2016-12-05', '2016-12-05', 15000, '06:06:00', '08:06:00', '2016-12-08', '2016-12-08'),
(19, 19, '11:11:00', '00:11:00', '2016-12-06', '2016-12-06', 111111, '01:01:00', '11:11:00', '2016-12-12', '2016-12-12'),
(20, 19, '01:01:00', '11:11:00', '2016-12-08', '2016-12-08', 22222, NULL, NULL, NULL, NULL),
(21, 19, '11:11:00', '00:00:00', '2016-12-15', '2016-12-16', 9001, NULL, NULL, NULL, NULL),
(22, 19, '01:01:00', '14:00:00', '2016-12-28', '2016-12-28', 2323, '20:08:00', '01:00:00', '2016-12-31', '2016-12-31'),
(23, 19, '11:11:00', '23:11:00', '2016-12-31', '2016-11-30', 3245, NULL, NULL, NULL, NULL),
(27, 31, '11:11:00', '14:22:00', '2016-12-06', '2016-12-06', 222222, NULL, NULL, NULL, NULL),
(28, 31, '10:02:00', '20:00:00', '2016-12-05', '2016-12-05', 9999, '00:12:00', '16:04:00', '2016-12-12', '2016-12-09');

-- --------------------------------------------------------

--
-- Table structure for table `vuelos_especificos`
--

CREATE TABLE `vuelos_especificos` (
  `id` int(11) NOT NULL,
  `origen` int(11) DEFAULT NULL,
  `destino` int(11) DEFAULT NULL,
  `escala` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vuelos_especificos`
--

INSERT INTO `vuelos_especificos` (`id`, `origen`, `destino`, `escala`) VALUES
(1, 1, 6, 9),
(2, 4, 9, NULL),
(3, 20, 23, NULL),
(4, 7, 10, 21),
(5, 24, 19, NULL),
(6, 1, 17, 9),
(7, 19, 18, 9),
(8, 20, 22, 8),
(9, 22, 13, NULL),
(10, 13, 11, NULL),
(11, 9, 10, NULL),
(12, 5, 6, NULL),
(13, 9, 5, 21),
(14, 1, 1, NULL),
(15, 1, 2, NULL),
(16, 3, 4, NULL),
(17, 1, 2, NULL),
(18, 9, 2, NULL),
(19, 11, 12, NULL),
(20, 11, 12, 1),
(21, 11, 12, 3),
(22, 11, 12, NULL),
(23, 11, 5, 3),
(24, 11, 5, 3),
(25, 11, 5, 6),
(26, 13, 11, 12),
(27, 1, 19, 3),
(28, 1, 19, NULL),
(29, 1, 19, NULL),
(31, 6, 7, 1),
(32, 6, 7, 1),
(33, 6, 7, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aereopuertos`
--
ALTER TABLE `aereopuertos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalle_asientos`
--
ALTER TABLE `detalle_asientos`
  ADD KEY `id_vuelo_disponible` (`id_vuelo_disponible`),
  ADD KEY `id_titular` (`id_titular`);

--
-- Indexes for table `otros_pasajeros`
--
ALTER TABLE `otros_pasajeros`
  ADD KEY `folio_reserva` (`folio_reserva`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`folio`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_vuelo_disponible` (`id_vuelo_disponible`);

--
-- Indexes for table `vuelos_disponibles`
--
ALTER TABLE `vuelos_disponibles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vuelo_especifico` (`id_vuelo_especifico`);

--
-- Indexes for table `vuelos_especificos`
--
ALTER TABLE `vuelos_especificos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `origen` (`origen`),
  ADD KEY `destino` (`destino`),
  ADD KEY `escala` (`escala`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aereopuertos`
--
ALTER TABLE `aereopuertos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `folio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `vuelos_disponibles`
--
ALTER TABLE `vuelos_disponibles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `vuelos_especificos`
--
ALTER TABLE `vuelos_especificos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detalle_asientos`
--
ALTER TABLE `detalle_asientos`
  ADD CONSTRAINT `detalle_asientos_ibfk_1` FOREIGN KEY (`id_vuelo_disponible`) REFERENCES `vuelos_disponibles` (`id`),
  ADD CONSTRAINT `detalle_asientos_ibfk_2` FOREIGN KEY (`id_titular`) REFERENCES `clientes` (`id`);

--
-- Constraints for table `otros_pasajeros`
--
ALTER TABLE `otros_pasajeros`
  ADD CONSTRAINT `otros_pasajeros_ibfk_1` FOREIGN KEY (`folio_reserva`) REFERENCES `reserva` (`folio`);

--
-- Constraints for table `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`id_vuelo_disponible`) REFERENCES `vuelos_disponibles` (`id`);

--
-- Constraints for table `vuelos_disponibles`
--
ALTER TABLE `vuelos_disponibles`
  ADD CONSTRAINT `vuelos_disponibles_ibfk_1` FOREIGN KEY (`id_vuelo_especifico`) REFERENCES `vuelos_especificos` (`id`);

--
-- Constraints for table `vuelos_especificos`
--
ALTER TABLE `vuelos_especificos`
  ADD CONSTRAINT `vuelos_especificos_ibfk_1` FOREIGN KEY (`origen`) REFERENCES `aereopuertos` (`id`),
  ADD CONSTRAINT `vuelos_especificos_ibfk_2` FOREIGN KEY (`destino`) REFERENCES `aereopuertos` (`id`),
  ADD CONSTRAINT `vuelos_especificos_ibfk_3` FOREIGN KEY (`escala`) REFERENCES `aereopuertos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
