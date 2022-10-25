-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2022 a las 21:47:51
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distritos`
--

CREATE TABLE `distritos` (
  `id_distrito` int(11) NOT NULL,
  `nom_distrito` varchar(255) DEFAULT NULL,
  `id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `distritos`
--

INSERT INTO `distritos` (`id_distrito`, `nom_distrito`, `id_provincia`) VALUES
(1, 'Balboa', 1),
(2, 'Chepo', 1),
(3, 'Chimán', 1),
(4, 'Panamá', 1),
(5, 'Belisario Porras', 1),
(6, 'Taboga', 1),
(7, 'Aguadulce', 2),
(8, 'Antón', 2),
(9, 'La Pintada', 2),
(10, 'Natá', 2),
(11, 'Olá', 2),
(12, 'Penonomé', 2),
(13, 'Chagres', 3),
(14, 'Colón', 3),
(15, 'Donoso', 3),
(16, 'Portobelo', 3),
(17, 'Santa Isabel', 3),
(18, 'Omar Torrijos Herrera', 3),
(19, 'Chepigana', 4),
(20, 'Pinogana', 4),
(21, 'Santa Fe', 4),
(22, 'Chitré', 5),
(23, 'Las Minas', 5),
(24, 'Los Pozos', 5),
(25, 'Ocú', 5),
(26, 'Parita', 5),
(27, 'Pesé', 5),
(28, 'Santa María', 5),
(29, 'Arraiján', 6),
(30, 'Capira', 6),
(31, 'Chame', 6),
(32, 'La Chorrera', 6),
(33, 'San Carlos', 6),
(34, 'Atalaya', 7),
(35, 'Calobre', 7),
(36, 'Cañazas', 7),
(37, 'La Mesa', 7),
(38, 'Las Palmas', 7),
(39, 'Mariato', 7),
(40, 'Montijo', 7),
(41, 'Río de Jesús', 7),
(42, 'San Francisco', 7),
(43, 'Santa Fe', 7),
(44, 'Santiago', 7),
(45, 'Soná', 7),
(46, 'Alanje', 8),
(47, 'Barú', 8),
(48, 'Boquerón', 8),
(49, 'Boquete', 8),
(50, 'Bugaba', 8),
(51, 'David', 8),
(52, 'Dolega', 8),
(53, 'Gualaca', 8),
(54, 'Remedios', 8),
(55, 'Renacimiento', 8),
(56, 'San Félix', 8),
(57, 'San Lorenzo', 8),
(58, 'Tierras Altas', 8),
(59, 'Tolé', 8),
(60, 'Almirante', 9),
(61, 'Bocas del Toro', 9),
(62, 'Changuinola', 9),
(63, 'Chiriquí Grande', 9),
(64, 'Guararé', 10),
(65, 'Las Tablas', 10),
(66, 'Los Santos', 10),
(67, 'Macaracas', 10),
(68, 'Pedasí', 10),
(69, 'Pocrí', 10),
(70, 'Tonosí', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL,
  `nom_provincia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `nom_provincia`) VALUES
(1, 'Panamá'),
(2, 'Coclé'),
(3, 'Colón'),
(4, 'Darién'),
(5, 'Herrera'),
(6, 'Panamá Oeste'),
(7, 'Veraguas'),
(8, 'Chiriquí'),
(9, 'Bocas del Toro'),
(10, 'Los Santos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_distrito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--

-- Índices para tablas volcadas
--

--
-- Indices de la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id_distrito`),
  ADD KEY `fk_provincia` (`id_provincia`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_distrito` (`id_distrito`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id_distrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `distritos`
--
ALTER TABLE `distritos`
  ADD CONSTRAINT `fk_provincia` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_id_distrito` FOREIGN KEY (`id_distrito`) REFERENCES `distritos` (`id_distrito`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
