create function verificarEspeciales(
    _valor text,
    _titulo text

) returns text

begin
    declare mensaje text default 'Sin accion';

    if ( locate ("'",_valor) or locate ('!',_valor) or locate ('?',_valor) or locate ('/',_valor) 
      or locate ('"',_valor) or locate ('¡',_valor) or locate ('¿',_valor) or locate ('\',_valor) 
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

end;