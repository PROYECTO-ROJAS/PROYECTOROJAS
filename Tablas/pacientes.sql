CREATE TABLE `pacientes` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `dni` int(10) NOT NULL,
  `tel` int(10) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert

INSERT INTO `pacientes` (`id`, `nombre`, `apellido`, `dni`, `tel`, `mail`) VALUES
(1, 'Nino', 'Nakano ', 45068769, 1557181700, 'SukkiFukun@gmail.com'),
(2, 'Miku ', 'Nakano', 45068770, 125415152, 'MikuNk@gmail.com'),
(3, 'Joseph', 'Joestar', 20068768, 1557112700, 'TheMFJosephJoestar@jojo.com'),
(4, 'Dio', 'Brando', 68768, 165281760, 'MudaMuda@jojo.com'),
(5, 'DANILO EMANUEL ', 'SOLER SALAZAR', 1526617111, 0, '6439042'),
(6, 'DANILO EMANUEL ', 'SOLER SALAZAR', 1526611711, 1557181700, 'danilo.soleret34@gmail.com');
