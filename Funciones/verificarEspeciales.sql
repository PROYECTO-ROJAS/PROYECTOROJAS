CREATE DEFINER=`root`@`localhost` FUNCTION `verificarEspeciales`(_valor text,
    _titulo text

) RETURNS text CHARSET latin1
begin
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

end