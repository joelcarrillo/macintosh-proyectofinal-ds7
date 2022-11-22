-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-11-2022 a las 04:53:42
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
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'pendiente'),
(2, 'en curso'),
(3, 'completado');

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
(3, 'Facultad de Ingeniería Civíl', 'fic@utp.ac.pa', ''),
(4, 'Facultad de Ingeniería Electrica', 'secacademica.fie@utp.ac.pa', ''),
(5, 'Facultad de Ingeniería Industrial', 'pregrado.fii@utp.ac.pa', ''),
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
  `tiempo_final` datetime NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`cod_reservacion`, `id_usuario`, `cod_salon`, `tiempo_inicio`, `tiempo_final`, `descripcion`, `cantidad`, `estado`) VALUES
(1, 1, '1-328', '2022-11-22 22:10:42', '2022-11-22 23:10:44', 'venimos a jugar furbo xd', 0, 2);

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
('1-307', 3, 3),
('1-328', 3, 4),
('3-314', 11, 1),
('3-315', 11, 1),
('3-316', 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `tipoUsuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `tipoUsuario`) VALUES
(1, 'usuario corriente'),
(2, 'administrador');

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
  `restablecer` varchar(250) NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `correo`, `nombre`, `apellido`, `pass`, `telefono`, `foto`, `restablecer`, `tipo_usuario`) VALUES
(1, 'pablo.lizana@utp.ac.pa', 'Pablito', 'Lizanita', '202cb962ac59075b964b07152d234b70', '6481-9422', '1.jpg', '', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `edificio`
--
ALTER TABLE `edificio`
  ADD PRIMARY KEY (`numero_edificio`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

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
  ADD KEY `fk_cod_salon` (`cod_salon`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `salon`
--
ALTER TABLE `salon`
  ADD PRIMARY KEY (`cod_salon`),
  ADD KEY `fk_numero_piso` (`cod_piso`),
  ADD KEY `fk_cod_facultad` (`cod_facultad`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `tipo_usuario` (`tipo_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `piso`
--
ALTER TABLE `piso`
  MODIFY `cod_piso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `cod_reservacion` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `salon`
--
ALTER TABLE `salon`
  ADD CONSTRAINT `fk_cod_facultad` FOREIGN KEY (`cod_facultad`) REFERENCES `facultad` (`cod_facultad`),
  ADD CONSTRAINT `fk_numero_piso` FOREIGN KEY (`cod_piso`) REFERENCES `piso` (`cod_piso`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
