-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2016 a las 17:46:16
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

USE `servicios`;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cliente`, `contacto`, `telefono`, `calle`, `correo`, `id_cli`) VALUES
('cliente1', 'pepe', '698569745', 'c/aaa', 'a@a.com', 1),
('cliente2', 'pepe', '698569745', 'c/aaa', 'a@a.com', 2),
('cliente3', 'pepe', '698569745', 'c/aaa', 'a@a.com', 3),
('cliente4', 'pepe', '698569745', 'c/aaa', 'a@a.com', 4),
('cliente5', 'pepe', '698569745', 'c/aaa', 'a@a.com', 5),
('advanta', 'qsfaf', '658965874', 'asfafs', 'adfasf@safsa.com', 6);

-- --------------------------------------------------------


--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`N_CLIENTE`, `Estado`, `CONTACTOS`, `TECNICO`, `SOPORTE`, `HORA_INICIO`, `HORA_FIN`, `FECHA`, `TEXTO`, `PIEZAS`, `NUM_SERVICIO`) VALUES
('cliente2', NULL, 'ww', '', 'PRESENCIAL', '16:23', '16:23', '2016-10-08', '', 'www', 1),
('cliente1', NULL, 'w', '', 'PRESENCIAL', '18:03', '18:03', '2016-10-08', '', 'w', 2),
('advanta', 'activo', 'adsadafd', NULL, 'PRESENCIAL', '18:21 ', '', '2016-10-08', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`nombre_tecnico`) VALUES
('tecnico1'),
('tecnico2'),
('tecnico3');

-- --------------------------------------------------------


--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `pass`, `nivel`) VALUES
('admin', 'admin', 1),
('user', 'user', 0);

--
-- Índices para tablas volcadas
--


--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `NUM_SERVICIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

