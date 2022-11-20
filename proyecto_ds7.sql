-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2022 a las 01:02:16
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_ds7`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificio`
--

CREATE TABLE `edificio` (
  `numero_edificio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `edificio`
--

INSERT INTO `edificio` (`numero_edificio`) VALUES
(1),
(2),
(3),
(4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `cod_facultad` int(11) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `correo` varchar(256) NOT NULL,
  `logo` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`cod_facultad`, `nombre`, `correo`, `logo`) VALUES
(1, 'Facultad de Ingeniería en Sistemas Computacionales', 'fisc@utp.ac.pa', ''),
(2, 'Facultad de Ciencias y Técnologia', 'fct@utp.ac.pa', ''),
(3, 'Facutad de Ingeniería Civíl', 'fic@utp.ac.pa', ''),
(4, 'Facultad de Ingeniería Electrica', 'secacademica.fie@utp.ac.pa', ''),
(5, 'Facutlad de Ingeniería Industrial', 'pregrado.fii@utp.ac.pa', ''),
(6, 'Facultad de Ingeniería Mecánica', ' fim@utp.ac.pa', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piso`
--

CREATE TABLE `piso` (
  `cod_piso` int(11) NOT NULL,
  `numero_piso` int(11) NOT NULL,
  `numero_edificio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `piso`
--

INSERT INTO `piso` (`cod_piso`, `numero_piso`, `numero_edificio`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 1, 2),
(6, 2, 2),
(7, 3, 2),
(8, 4, 2),
(9, 1, 3),
(10, 2, 3),
(11, 3, 3),
(12, 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `cod_reservacion` int(9) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cod_salon` varchar(5) NOT NULL,
  `tiempo_inicio` datetime NOT NULL,
  `tiempo_final` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE `salon` (
  `cod_salon` varchar(5) NOT NULL,
  `cod_piso` int(11) NOT NULL,
  `cod_facultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`cod_salon`, `cod_piso`, `cod_facultad`) VALUES
('3-316', 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(9) NOT NULL,
  `correo` varchar(256) NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `apellido` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `restablecer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `edificio`
--
ALTER TABLE `edificio`
  ADD PRIMARY KEY (`numero_edificio`);

--
-- Indices de la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD PRIMARY KEY (`cod_facultad`);

--
-- Indices de la tabla `piso`
--
ALTER TABLE `piso`
  ADD PRIMARY KEY (`cod_piso`),
  ADD KEY `fk_numero_edificio` (`numero_edificio`);

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`cod_reservacion`),
  ADD KEY `fk_id_usuario` (`id_usuario`),
  ADD KEY `fk_cod_salon` (`cod_salon`);

--
-- Indices de la tabla `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`cod_salon`),
  ADD KEY `fk_numero_piso` (`cod_piso`),
  ADD KEY `fk_cod_facultad` (`cod_facultad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `piso`
--
ALTER TABLE `piso`
  MODIFY `cod_piso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `cod_reservacion` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(9) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `piso`
--
ALTER TABLE `piso`
  ADD CONSTRAINT `fk_numero_edificio` FOREIGN KEY (`numero_edificio`) REFERENCES `edificio` (`numero_edificio`);

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `fk_cod_salon` FOREIGN KEY (`cod_salon`) REFERENCES `salon` (`cod_salon`),
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `salon`
--
ALTER TABLE `salon`
  ADD CONSTRAINT `fk_cod_facultad` FOREIGN KEY (`cod_facultad`) REFERENCES `facultad` (`cod_facultad`),
  ADD CONSTRAINT `fk_numero_piso` FOREIGN KEY (`cod_piso`) REFERENCES `piso` (`cod_piso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
