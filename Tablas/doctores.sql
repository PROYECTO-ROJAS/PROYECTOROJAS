CREATE TABLE `doctores` (
  `legajo` int(255) Auto_Increment NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `tel` int(12) NOT NULL,
  `dni` int(10) NOT NULL,
  `especialidad` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  PRIMARY KEY (`legajo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert

INSERT INTO `doctores` (`legajo`, `nombre`, `apellido`, `tel`, `dni`, `especialidad`, `correo`) VALUES
(1, 'Juan Carlos', 'Villanueva', 1254151525, 45068768, 'Prótesis', 'Ninohusband@gmail.com'),
(2, 'Manuel ', 'Scala', 1557181700, 401932950, 'Protesis', 'PP@gmail.com'),
(3, 'Franco', 'Ghireti', 1557181700, 45068768, 'Dentista', 'fran.ghireti@dentista.dientes.muelas.colm');
