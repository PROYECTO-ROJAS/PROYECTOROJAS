CREATE TABLE `turnos` (
  `id_turno` int(11) Auto_increment NOT NULL,
  `id_client` int(255) NOT NULL,
  `leg_doc` int(255) NOT NULL,
  `fecha_id` int(255) NOT NULL,
  PRIMARY KEY (`id_turno`),
  FOREIGN KEY (`id_client`) REFERENCES `pacientes` (`id`),
  FOREIGN KEY (`leg_doc`) REFERENCES `doctores` (`legajo`),
  FOREIGN KEY (`fecha_id`) REFERENCES `fecha` (`id_fecha`);

) ENGINE=InnoDB DEFAULT CHARSET=latin1;
