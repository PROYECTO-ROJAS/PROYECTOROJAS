
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `base_rojas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `base_rojas`;

/* Tabla Doctores*/

CREATE TABLE `doctores` (
  `legajo` int(255) AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `tel` int(12) NOT NULL,
  `dni` int(10) NOT NULL,
  `especialidad` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  PRIMARY KEY(`legajo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `doctores` (`legajo`, `nombre`, `apellido`, `tel`, `dni`, `especialidad`, `correo`) VALUES
(1, 'Juan Carlos', 'Villanueva', 1254151525, 45068768, 'Prótesis', 'Ninohusband@gmail.com'),
(2, 'Manuel ', 'Scala', 1557181700, 401932950, 'Protesis', 'PP@gmail.com'),
(3, 'Franco', 'Ghireti', 1557181700, 45068768, 'Dentista', 'fran.ghireti@dentista.dientes.muelas.colm');

/* Tabla Fecha*/

CREATE TABLE `fecha` (
  `id_fecha` int(11) AUTO_INCREMENT,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Tabla Pacientes*/

CREATE TABLE `pacientes` (
  `id` int(255) AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `dni` int(10) NOT NULL,
  `tel` int(10) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pacientes` (`id`, `nombre`, `apellido`, `dni`, `tel`, `mail`) VALUES
(1, 'Nino', 'Nakano ', 45068769, 1557181700, 'SukkiFukun@gmail.com'),
(2, 'Miku ', 'Nakano', 45068770, 125415152, 'MikuNk@gmail.com'),
(3, 'Joseph', 'Joestar', 20068768, 1557112700, 'TheMFJosephJoestar@jojo.com'),
(4, 'Dio', 'Brando', 68768, 165281760, 'MudaMuda@jojo.com'),
(5, 'DANILO EMANUEL ', 'SOLER SALAZAR', 1526617111, 0, '6439042'),
(6, 'DANILO EMANUEL ', 'SOLER SALAZAR', 1526611711, 1557181700, 'danilo.soleret34@gmail.com');

/* Tabla Turnos*/

CREATE TABLE `turnos` (
  `id_turno` int(11) AUTO_INCREMENT,
  `id_client` int(255) NOT NULL,
  `leg_doc` int(255) NOT NULL,
  `fecha_id` int(255) NOT NULL,
  PRIMARY KEY(`id_turno`),
  FOREIGN KEY(`id_client`) REFERENCES `pacientes`(`id`),
  FOREIGN KEY(`leg_doc`) REFERENCES `doctores`(`legajo`),
  FOREIGN KEY(`fecha_id`) REFERENCES `fecha`(`id_fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/* Tabla Turnos*/

CREATE TABLE `admin` (
    `id` int(11) auto_increment,
    `nombre` varchar(200) NOT NULL,
    `apellido` varchar(200) NOT NULL,
    `pwd` varchar(200) NOT NULL,
    `dni` int(200) NOT NULL,
    `telefono` int(200) NOT NULL,
    `email` varchar(200) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id`, `nombre`, `apellido`, `pwd`, `dni`, `telefono`, `email`) VALUES
(1, 'Coco', 'Gato', '123', 44892988, 22494910, 'coco@gmail.com');

COMMIT;

