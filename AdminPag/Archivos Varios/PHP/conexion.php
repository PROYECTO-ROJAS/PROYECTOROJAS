<?php
    try{
        $conexion = new PDO('mysql:host=localhost;dbname=base_rojas', 'root', '');
        }catch(PDOException $prueba_error){
            echo "Error: " . $prueba_error->getMessage();
        }
?>