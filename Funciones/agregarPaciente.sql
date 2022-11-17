CREATE FUNCTION `agregarPaciente`(
    nombre_paciente varchar (75),
    apellido_paciente varchar(75),
    dni_paciente int,
    tel_paciente int,
    mail_paciente varchar(75)
)RETURNS TEXT

BEGIN

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

END;