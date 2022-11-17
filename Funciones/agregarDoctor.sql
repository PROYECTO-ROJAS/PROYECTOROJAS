create function `agregarDoctor` (
    nombre_doctor varchar(75),
    apellido_doctor varchar(75),
    tel_doctor int,
    dni_doctor int,
    especialidad_doctor varchar(75),
    correo_doctor varchar(75)
)RETURNS TEXT

begin

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

END;