CREATE FUNCTION `agregarTurno` (
	id_paciente int,
    id_doctor int,
    fecha_turno datetime
)
RETURNS INTEGER
BEGIN
	insert into turnos(
		id_client,
		leg_doc,
		fecha_id
	)values(
		id_paciente,
		id_doctor,
		fecha_turno
	);
RETURN 1;
END
