-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2022 a las 06:26:44
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_rojas`
--
CREATE DATABASE IF NOT EXISTS `base_rojas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `base_rojas`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

DROP TABLE IF EXISTS `doctores`;
CREATE TABLE `doctores` (
  `legajo` int(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `tel` int(12) NOT NULL,
  `dni` int(10) DEFAULT NULL,
  `especialidad` varchar(255) DEFAULT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`legajo`, `nombre`, `apellido`, `tel`, `dni`, `especialidad`, `correo`) VALUES
(1, 'Juan Carlos', 'Villanueva', 1254151525, 45068768, 'Prótesis', 'Ninohusband@gmail.com'),
(2, 'Manuel ', 'Scala', 1557181700, 401932950, 'Protesis', 'PP@gmail.com'),
(3, 'Franco', 'Ghireti', 1557181700, 45068768, 'Dentista', 'fran.ghireti@dentista.dientes.muelas.colm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

DROP TABLE IF EXISTS `fecha`;
CREATE TABLE `fecha` (
  `id_fecha` int(11) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `dni` int(10) DEFAULT NULL,
  `tel` int(10) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `apellido`, `dni`, `tel`, `mail`) VALUES
(1, 'Nino', 'Nakano ', 45068769, 1557181700, 'SukkiFukun@gmail.com'),
(2, 'Miku ', 'Nakano', 45068770, 125415152, 'MikuNk@gmail.com'),
(3, 'Joseph', 'Joestar', 20068768, 1557112700, 'TheMFJosephJoestar@jojo.com'),
(4, 'Dio', 'Brando', 68768, 165281760, 'MudaMuda@jojo.com'),
(5, 'DANILO EMANUEL ', 'SOLER SALAZAR', 1526617111, 0, '6439042'),
(6, 'DANILO EMANUEL ', 'SOLER SALAZAR', 1526611711, 1557181700, 'danilo.soleret34@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

DROP TABLE IF EXISTS `turnos`;
CREATE TABLE `turnos` (
  `id_turno` int(11) NOT NULL,
  `id_client` int(255) DEFAULT NULL,
  `leg_doc` int(255) DEFAULT NULL,
  `fecha_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`legajo`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`id_fecha`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`),
  ADD KEY `id_client` (`id_client`,`leg_doc`,`fecha_id`),
  ADD KEY `leg_doc` (`leg_doc`),
  ADD KEY `fecha_id` (`fecha_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `legajo` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fecha`
--
ALTER TABLE `fecha`
  MODIFY `id_fecha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `pacientes` (`id`),
  ADD CONSTRAINT `turnos_ibfk_2` FOREIGN KEY (`leg_doc`) REFERENCES `doctores` (`legajo`),
  ADD CONSTRAINT `turnos_ibfk_3` FOREIGN KEY (`fecha_id`) REFERENCES `fecha` (`id_fecha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
