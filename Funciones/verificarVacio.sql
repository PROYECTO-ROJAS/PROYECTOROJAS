create function verificarVacio(
    _valor text,
    _titulo text
)
RETURNS TEXT
BEGIN
    declare mensaje text;
    set mensaje = 'Sin accion';

    if (_valor <> '' and _valor is not null) then
        set mensaje = 'ok';
    else
        set mensaje = (select concat('error, El campo ',_titulo,'no debe estar vacio'));
    end if;
    
    return mensaje;

END