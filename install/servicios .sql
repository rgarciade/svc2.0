-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2016 a las 14:23:37
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `servicios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cliente` text COLLATE latin1_spanish_ci NOT NULL,
  `contacto` text COLLATE latin1_spanish_ci,
  `telefono` text COLLATE latin1_spanish_ci,
  `calle` text COLLATE latin1_spanish_ci,
  `correo` text COLLATE latin1_spanish_ci,
  `id_cli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cliente`, `contacto`, `telefono`, `calle`, `correo`, `id_cli`) VALUES
('cliente1', 'pepe', '698569745', 'c/aaa', 'a@a.com', 1),
('cliente2', 'pepe', '698569745', 'c/aaa', 'a@a.com', 2),
('cliente3', 'pepe', '698569745', 'c/aaa', 'a@a.com', 3),
('cliente4', 'pepe', '698569745', 'c/aaa', 'a@a.com', 4),
('cliente5', 'pepe', '698569745', 'c/aaa', 'a@a.com', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `N_CLIENTE` text COLLATE latin1_spanish_ci,
  `Estado` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL,
  `CONTACTOS` text COLLATE latin1_spanish_ci,
  `TECNICO` text COLLATE latin1_spanish_ci,
  `SOPORTE` text COLLATE latin1_spanish_ci,
  `HORA_INICIO` varchar(11) COLLATE latin1_spanish_ci DEFAULT NULL,
  `HORA_FIN` varchar(11) COLLATE latin1_spanish_ci DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `TEXTO` text COLLATE latin1_spanish_ci,
  `PIEZAS` text COLLATE latin1_spanish_ci,
  `NUM_SERVICIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`N_CLIENTE`, `Estado`, `CONTACTOS`, `TECNICO`, `SOPORTE`, `HORA_INICIO`, `HORA_FIN`, `FECHA`, `TEXTO`, `PIEZAS`, `NUM_SERVICIO`) VALUES
('cliente2', NULL, 'ww', '', 'PRESENCIAL', '16:23', '16:23', '2016-10-08', '', 'www', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE `tecnicos` (
  `nombre_tecnico` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`nombre_tecnico`) VALUES
('tecnico1'),
('tecnico2'),
('tecnico3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` text NOT NULL,
  `pass` varchar(11) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `pass`, `nivel`) VALUES
('admin@admin.com', 'admin', 1),
('user@user.com', 'user', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cli`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`NUM_SERVICIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `NUM_SERVICIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
