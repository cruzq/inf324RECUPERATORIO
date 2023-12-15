-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2023 a las 12:51:48
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
-- Base de datos: `impuesto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativo`
--

CREATE TABLE `administrativo` (
  `ci` varchar(20) DEFAULT '0',
  `nombre` varchar(255) DEFAULT NULL,
  `cargo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrativo`
--

INSERT INTO `administrativo` (`ci`, `nombre`, `cargo`) VALUES
('22', 'cruz', 'administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contribuyente`
--

CREATE TABLE `contribuyente` (
  `ci` varchar(20) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `departamento` varchar(2) DEFAULT NULL,
  `entrega` varchar(255) DEFAULT NULL,
  `verifica` varchar(255) DEFAULT NULL,
  `comprobante` varchar(255) DEFAULT NULL,
  `programacion` varchar(255) DEFAULT NULL,
  `recogo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contribuyente`
--

INSERT INTO `contribuyente` (`ci`, `nombre`, `departamento`, `entrega`, `verifica`, `comprobante`, `programacion`, `recogo`) VALUES
('11', 'fernando', 'LP', NULL, NULL, NULL, NULL, NULL),
('12', 'maria', 'LP', NULL, NULL, NULL, NULL, NULL),
('13', 'juan', 'SC', 'documentosEntregados', 'si', NULL, NULL, NULL),
('14', 'julio', 'OR', 'documentosEntregados', 'si', 'si', '12-12-2024', NULL),
('15', 'kattia', 'SC', 'documentosEntregados', 'si', 'si', '12-12-2024', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ci` varchar(10) DEFAULT NULL,
  `clave` varchar(10) DEFAULT NULL,
  `rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ci`, `clave`, `rol`) VALUES
('11', '123456', 'cajero'),
('12', '123456', 'cajero2'),
('13', '123456', 'cajero'),
('14', '123456', 'cajero2'),
('22', '123456', 'cajero2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
