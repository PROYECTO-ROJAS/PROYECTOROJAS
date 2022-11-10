<?php

    $email = $_POST['email'];

    $pwd = $_POST['pwd'];


    if(isset($email)&&isset($pwd)){        
    include("../AdminPag/VistasAdmin/php_code/conexion.php");
        
        $consulta_session = "SELECT * FROM admin WHERE email = '".$email."' and pwd= '".$pwd."'";

        $envio_session = $conexion->query($consulta_session);

        if(($envio_session->num_rows)>0){

            session_start();
            $_SESSION["email"]= $email;
            header('location: adminVER.php');
            

        }else{

            echo "Nombre de usuario y/o contraseña incorrectos";

        }
    }
    
?>