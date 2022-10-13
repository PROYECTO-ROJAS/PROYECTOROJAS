<?php
    include("VistasAdmin/php_code/conexion.php")

    $email = $conexion->real_escape_string($_POST['email']);

    $pwd = $conexion->real_escape_string($_POST['pwd']);


    if(isset($email)&&isset($pwd)){
        
        $consulta_session = "SELECT * FROM admin WHERE email = '".$email."' and pwd= '".$pwd."'";

        $envio_session = $conexion->query($consulta_session);

        if(($envio_session->num_rows)>0){

            session_start();
            $_SESSION["email"]= $email;
            echo ":)";
            

        }else{

            echo "Nombre de usuario y/o contraseña incorrectos";

        }
    }
    
?>