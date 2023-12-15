-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2023 a las 12:53:41
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `workflow1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujo`
--

CREATE TABLE `flujo` (
  `flujo` varchar(11) DEFAULT NULL,
  `proceso` varchar(255) DEFAULT NULL,
  `procesosiguiente` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `rol` varchar(255) DEFAULT NULL,
  `pantalla` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `flujo`
--

INSERT INTO `flujo` (`flujo`, `proceso`, `procesosiguiente`, `tipo`, `rol`, `pantalla`) VALUES
('F1', 'P1', 'P2', 'P', 'cajero2', 'listado'),
('F3', 'P3', 'P4', 'M', 'cajero', 'entrega'),
('F3', 'P4', 'P5', 'P', 'cajero2', 'programa'),
('F3', 'P5', NULL, 'R', 'cajero', 'recoge'),
('F1', 'P2', 'P3', 'V', 'cajero2', 'verifica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujopregunta`
--

CREATE TABLE `flujopregunta` (
  `flujo` varchar(11) DEFAULT NULL,
  `proceso` varchar(255) DEFAULT NULL,
  `si` varchar(255) DEFAULT NULL,
  `no` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `flujopregunta`
--

INSERT INTO `flujopregunta` (`flujo`, `proceso`, `si`, `no`) VALUES
('F2', 'P2', 'P3', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `secuencia` varchar(11) NOT NULL DEFAULT '0',
  `usuario` varchar(255) DEFAULT NULL,
  `fechahorafin` varchar(255) DEFAULT NULL,
  `flujo` varchar(255) DEFAULT NULL,
  `proceso` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`secuencia`, `usuario`, `fechahorafin`, `flujo`, `proceso`) VALUES
('1', '11', NULL, 'F1', 'P1'),
('2', '13', NULL, 'F3', 'P3'),
('3', '14', NULL, 'F3', 'P5');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
