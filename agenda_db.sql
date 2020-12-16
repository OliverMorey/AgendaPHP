-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-12-2020 a las 00:55:51
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `fecha_finalizacion` date DEFAULT NULL,
  `hora_finalizacion` time DEFAULT NULL,
  `dia_completo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Eventos de la agenda asociados a cada usuario';

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `id_evento`, `titulo`, `fecha_inicio`, `hora_inicio`, `fecha_finalizacion`, `hora_finalizacion`, `dia_completo`) VALUES
(7, 4, 'reunion promo', '2020-10-24', '07:00:00', '2020-10-24', '09:30:00', 0),
(7, 5, 'reunion promo 3', '2020-10-24', '12:30:00', '2020-10-24', '17:30:00', 0),
(9, 6, 'entrevista 1', '2020-10-23', '07:00:00', '2020-10-23', '10:00:00', 0),
(8, 8, 'Entrevista de Trabajo', '2020-10-27', '07:00:00', '2020-10-27', '08:00:00', 0),
(8, 10, 'cine', '2020-10-25', '19:30:00', '2020-10-25', '21:30:00', 0),
(8, 11, 'mercado', '2020-10-26', '08:00:00', '2020-10-26', '11:00:00', 0),
(8, 12, 'Kiss me', '2020-10-23', '07:00:00', '2020-10-23', '09:30:00', 0),
(8, 14, 'Kiss me', '2020-10-20', '07:00:00', '2020-10-20', '09:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `nombre_completo` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Tabla usuarios del sistema';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre_completo`, `fecha_nacimiento`, `pwd`) VALUES
(7, 'omorey@hotmail.com', 'Oliver Morey', '1970-05-25', '$2y$10$0gQz37xOotFAQt4wMt0IKeFk5fILoYhJQwJJUQS8Z9UtM2bMRCez2'),
(8, 'ihurtado@msn.com', 'Ivan Hurtado', '1978-12-30', '$2y$10$ijiOHnbbIhDIlK2owPDTj.u5STGlNNnccroBocrd4GdEaYpuYa452'),
(9, 'jperez@gmail.com', 'Juan Perez', '1981-07-13', '$2y$10$aclEKGrYexw7DDHR3KLr3OTaLkhYM.E1L31ft6LMq91NViBvnMjpC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ind_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
