-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-11-2022 a las 22:02:45
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
-- Estructura de tabla para la tabla `dias_semana`
--

CREATE TABLE `dias_semana` (
  `id` int(11) NOT NULL,
  `dia_semana` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dias_semana`
--

INSERT INTO `dias_semana` (`id`, `dia_semana`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sabado');

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
  `logo` varchar(256) DEFAULT NULL,
  `cod_edificio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`cod_facultad`, `nombre`, `correo`, `logo`, `cod_edificio`) VALUES
(1, 'Facultad de Ingeniería en Sistemas Computacionales', 'fisc@utp.ac.pa', '', 3),
(2, 'Facultad de Ciencias y Técnologia', 'fct@utp.ac.pa', '', 3),
(3, 'Facutad de Ingeniería Civíl', 'fic@utp.ac.pa', '', 1),
(4, 'Facultad de Ingeniería Electrica', 'secacademica.fie@utp.ac.pa', '', 1),
(5, 'Facutlad de Ingeniería Industrial', 'pregrado.fii@utp.ac.pa', '', 1),
(6, 'Facultad de Ingeniería Mecánica', ' fim@utp.ac.pa', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_salon`
--

CREATE TABLE `horarios_salon` (
  `id` int(11) NOT NULL,
  `id_salon` varchar(5) NOT NULL,
  `id_hora_general` int(11) NOT NULL,
  `dia_semana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horarios_salon`
--

INSERT INTO `horarios_salon` (`id`, `id_salon`, `id_hora_general`, `dia_semana`) VALUES
(1, '3-316', 1, 2),
(2, '3-316', 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas_general`
--

CREATE TABLE `horas_general` (
  `id` int(11) NOT NULL,
  `descripcion` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horas_general`
--

INSERT INTO `horas_general` (`id`, `descripcion`) VALUES
(1, '07:00:00'),
(2, '07:50:00'),
(3, '08:40:00'),
(4, '09:30:00'),
(5, '10:20:00'),
(6, '11:10:00'),
(7, '12:00:00'),
(8, '12:50:00'),
(9, '13:40:00'),
(10, '14:30:00'),
(11, '15:20:00'),
(12, '16:10:00'),
(13, '17:00:00'),
(14, '17:50:00'),
(15, '18:40:00'),
(16, '19:30:00'),
(17, '20:20:00'),
(18, '21:10:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piso`
--

CREATE TABLE `piso` (
  `cod_piso` int(11) NOT NULL,
  `numero_piso` int(11) NOT NULL,
  `numero_edificio` int(11) NOT NULL,
  `id_facultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `piso`
--

INSERT INTO `piso` (`cod_piso`, `numero_piso`, `numero_edificio`, `id_facultad`) VALUES
(1, 1, 1, 3),
(2, 2, 1, 4),
(3, 3, 1, 6),
(4, 4, 1, 5),
(9, 1, 3, 2),
(10, 2, 3, 2),
(11, 3, 3, 1),
(12, 4, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `cod_reservacion` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `cod_salon` varchar(15) DEFAULT NULL,
  `fecha_reserva` date DEFAULT NULL,
  `tiempo_inicio` time DEFAULT NULL,
  `tiempo_final` time DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`cod_reservacion`, `id_usuario`, `cod_salon`, `fecha_reserva`, `tiempo_inicio`, `tiempo_final`, `descripcion`, `cantidad`, `estado`) VALUES
(11, 1, '3-316', '2022-11-27', '13:40:00', '14:25:00', 'Voy a comer', 9, 1),
(12, 1, '3-316', '2022-11-19', '12:50:00', '13:35:00', 'Voy a comer', 5, 1),
(13, 1, '3-316', '2022-11-26', '12:50:00', '13:35:00', 'Voy a comer', 65, 1),
(14, 1, '3-316', '2022-11-26', '07:50:00', '08:35:00', 'Voy a comer', 5, 1),
(15, 1, '3-316', '2022-11-26', '09:30:00', '10:15:00', 'Voy a comer', 5, 1),
(16, 1, '3-316', '2022-11-30', '10:20:00', '11:05:00', 'Voy a comer', 45, 1),
(17, 1, '3-316', '2022-11-26', '10:20:00', '11:05:00', 'Voy a comer', 56, 1);

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
  `restablecer` varchar(250) NOT NULL,
  `dni` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `correo`, `nombre`, `apellido`, `pass`, `telefono`, `foto`, `restablecer`, `dni`) VALUES
(1, 'keneric0707@gmail.com', 'Keneric', 'Vasquez', '202cb962ac59075b964b07152d234b70', '62635228', '', '', '8-977-1227'),
(2, 'floppy@gmail.com', 'Floppy', 'Vasquez', '202cb962ac59075b964b07152d234b70', '62635228', '', '', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dias_semana`
--
ALTER TABLE `dias_semana`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`cod_facultad`),
  ADD KEY `fk_cod_edificio` (`cod_edificio`) USING BTREE;

--
-- Indices de la tabla `horarios_salon`
--
ALTER TABLE `horarios_salon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_hora_general` (`id_hora_general`),
  ADD KEY `fk_id_salon_horario` (`id_salon`),
  ADD KEY `fk_id_dia_semana` (`dia_semana`);

--
-- Indices de la tabla `horas_general`
--
ALTER TABLE `horas_general`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `piso`
--
ALTER TABLE `piso`
  ADD PRIMARY KEY (`cod_piso`),
  ADD KEY `fk_numero_edificio` (`numero_edificio`),
  ADD KEY `fk_id_facultad` (`id_facultad`);

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`cod_reservacion`),
  ADD KEY `fk_cod_salon_reserva` (`cod_salon`),
  ADD KEY `fk_id_usuario_reserva` (`id_usuario`),
  ADD KEY `estado` (`estado`);

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
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dias_semana`
--
ALTER TABLE `dias_semana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `horarios_salon`
--
ALTER TABLE `horarios_salon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horas_general`
--
ALTER TABLE `horas_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `piso`
--
ALTER TABLE `piso`
  MODIFY `cod_piso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `cod_reservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facultad`
--
ALTER TABLE `facultad`
  ADD CONSTRAINT `facultad_ibfk_1` FOREIGN KEY (`cod_edificio`) REFERENCES `edificio` (`numero_edificio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `horarios_salon`
--
ALTER TABLE `horarios_salon`
  ADD CONSTRAINT `fk_id_dia_semana` FOREIGN KEY (`dia_semana`) REFERENCES `dias_semana` (`id`),
  ADD CONSTRAINT `fk_id_hora_general` FOREIGN KEY (`id_hora_general`) REFERENCES `horas_general` (`id`),
  ADD CONSTRAINT `fk_id_salon_horario` FOREIGN KEY (`id_salon`) REFERENCES `salon` (`cod_salon`);

--
-- Filtros para la tabla `piso`
--
ALTER TABLE `piso`
  ADD CONSTRAINT `fk_numero_edificio` FOREIGN KEY (`numero_edificio`) REFERENCES `edificio` (`numero_edificio`),
  ADD CONSTRAINT `piso_ibfk_1` FOREIGN KEY (`id_facultad`) REFERENCES `facultad` (`cod_facultad`);

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `fk_cod_salon_reserva` FOREIGN KEY (`cod_salon`) REFERENCES `salon` (`cod_salon`),
  ADD CONSTRAINT `fk_id_usuario_reserva` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE;

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
