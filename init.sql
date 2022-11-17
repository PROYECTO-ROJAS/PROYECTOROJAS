
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

-- FUNCIONES VERIFICAR ---
DELIMITER $$

DROP FUNCTION IF EXISTS `verificarEspeciales`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `verificarEspeciales` (`_valor` TEXT, `_titulo` TEXT) RETURNS TEXT CHARSET latin1  begin
    declare mensaje text default 'Sin accion';

    if ( locate ("'",_valor) or locate ('!',_valor) or locate ('?',_valor) or locate ('/',_valor) 
      or locate ('"',_valor) or locate ('¡',_valor) or locate ('¿',_valor) 
      or locate ('´',_valor) or locate ('(',_valor) or locate ('<',_valor) or locate ('=',_valor)
      or locate ('`',_valor) or locate (')',_valor) or locate ('>',_valor) or locate ('$',_valor)
      or locate ('[',_valor) or locate (']',_valor) or locate ('{',_valor) or locate ('}',_valor)
      or locate ('.',_valor) or locate (',',_valor) or locate ('%',_valor) or locate ('_',_valor)
      or locate ('-',_valor) or locate (':',_valor) or locate (';',_valor) or locate ('#',_valor)) then
        set mensaje = (select concat('error, El campo',_titulo,'no admite caracteres especiales'));
    else 
        set mensaje = "ok";
    end if;
    
    return mensaje;

end$$

DROP FUNCTION IF EXISTS `verificarVacio`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `verificarVacio` (`_valor` TEXT, `_titulo` TEXT) RETURNS TEXT CHARSET latin1  BEGIN
    declare mensaje text;
    set mensaje = 'Sin accion';

    if (_valor <> '' and _valor is not null) then
        set mensaje = 'ok';
    else
        set mensaje = (select concat('error, El campo ',_titulo,'no debe estar vacio'));
    end if;
    
    return mensaje;

END$$

-- FUNCIONES

DROP FUNCTION IF EXISTS `agregarDoctor`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `agregarDoctor` (`nombre_doctor` VARCHAR(75), `apellido_doctor` VARCHAR(75), `tel_doctor` INT, `dni_doctor` INT, `especialidad_doctor` VARCHAR(75), `correo_doctor` VARCHAR(75)) RETURNS TEXT CHARSET latin1  begin

declare mensaje text default 'Sin accion';

-- Validacion --

SET mensaje = (SELECT verificarVacio(nombre_doctor,"Nombre"));

IF (mensaje = "ok") THEN
    SET mensaje = (SELECT verificarEspeciales(nombre_doctor,"Nombre"));
END IF;

IF (mensaje = "ok") THEN
    SET mensaje = (SELECT verificarVacio(apellido_doctor,"Apellido"));
END IF;

IF (mensaje="ok") THEN
    SET mensaje = (SELECT verificarEspeciales(apellido_doctor,"Apellido"));
END IF;

IF (mensaje="ok") THEN
 SET mensaje = (SELECT verificarVacio(correo_doctor,"Correo"));
END IF;

-- Insertar Doctor --

INSERT INTO doctores (
    nombre,
    apellido,
    tel,
    dni,
    especialidad,
    correo
)
VALUES
    (
        nombre_doctor,
        apellido_doctor,
        tel_doctor,
        dni_doctor,
        especialidad_doctor,
        correo_doctor
    );

SET mensaje = "Doctor Insertado correctamente";

return mensaje;

END$$

DROP FUNCTION IF EXISTS `agregarPaciente`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `agregarPaciente` (`nombre_paciente` VARCHAR(75), `apellido_paciente` VARCHAR(75), `dni_paciente` INT, `tel_paciente` INT, `mail_paciente` VARCHAR(75)) RETURNS TEXT CHARSET latin1  BEGIN

DECLARE mensaje TEXT DEFAULT 'Sin Accion';

-- Validacion -- 
SET mensaje = (SELECT verificarVacio(nombre_paciente,"Nombre"));

IF (mensaje = "ok") THEN
    SET mensaje = (SELECT verificarEspeciales(nombre_paciente,"Nombre"));
END IF;

IF (mensaje = "ok") THEN
    SET mensaje = (SELECT verificarVacio(apellido_paciente,"Apellido"));
END IF;

IF (mensaje="ok") THEN
    SET mensaje = (SELECT verificarEspeciales(apellido_paciente,"Apellido"));
END IF;

IF (mensaje="ok") THEN
 SET mensaje = (SELECT verificarVacio(mail_paciente,"Correo"));
END IF;

-- Insertar Paciente --

INSERT INTO pacientes(
    nombre,
    apellido,
    dni,
    tel,
    mail
)VALUES(
    nombre_paciente,
    apellido_paciente,
    dni_paciente,
    tel_paciente,
    mail_paciente
);

SET mensaje = "Paciente Insertado correctamente";

RETURN mensaje;

END$$

DROP FUNCTION IF EXISTS `agregarTurno`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `agregarTurno` (`id_paciente` INT, `id_doctor` INT, `fecha_turno` DATETIME) RETURNS TEXT CHARSET latin1  BEGIN
DECLARE mensaje text;

	insert into turnos(
		id_client,
		leg_doc,
		fecha_id
	)values(
		id_paciente,
		id_doctor,
		fecha_turno
	);
SET mensaje = "Ingresado con exito!";
RETURN mensaje;
END$$

DROP FUNCTION IF EXISTS `verificarEspeciales`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `verificarEspeciales` (`_valor` TEXT, `_titulo` TEXT) RETURNS TEXT CHARSET latin1  begin
    declare mensaje text default 'Sin accion';

    if ( locate ("'",_valor) or locate ('!',_valor) or locate ('?',_valor) or locate ('/',_valor) 
      or locate ('"',_valor) or locate ('¡',_valor) or locate ('¿',_valor) 
      or locate ('´',_valor) or locate ('(',_valor) or locate ('<',_valor) or locate ('=',_valor)
      or locate ('`',_valor) or locate (')',_valor) or locate ('>',_valor) or locate ('$',_valor)
      or locate ('[',_valor) or locate (']',_valor) or locate ('{',_valor) or locate ('}',_valor)
      or locate ('.',_valor) or locate (',',_valor) or locate ('%',_valor) or locate ('_',_valor)
      or locate ('-',_valor) or locate (':',_valor) or locate (';',_valor) or locate ('#',_valor)) then
        set mensaje = (select concat('error, El campo',_titulo,'no admite caracteres especiales'));
    else 
        set mensaje = "ok";
    end if;
    
    return mensaje;

end$$

DELIMITER ;

COMMIT;

