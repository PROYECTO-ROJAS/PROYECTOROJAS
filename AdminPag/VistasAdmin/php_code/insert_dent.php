<?php

 include("conexion.php");

 $nombre = $_POST ['nombre'];
 $apellido = $_POST ['apellido'];
 $dni = $_POST ['dni'];
 $mail = $_POST ['mail'];
 $telefono = $_POST ['tel'];
 $especialidad = $_POST ['especialidad'];
 mysqli_query($conexion,"INSERT INTO doctores (nombre,apellido,tel,dni,especialidad,correo) VALUES ('$nombre','$apellido',$telefono,$dni,'$especialidad','$mail')");

 header("Location: ../dentistas.php")
?>

