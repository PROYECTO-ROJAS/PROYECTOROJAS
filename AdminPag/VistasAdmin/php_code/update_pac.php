<?php

    include("conexion.php");

    $id=$_POST['id'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $dni = $_POST ['dni'];
    $tel = $_POST ['tel'];
    $mail = $_POST['mail'];

    $sql="UPDATE pacientes SET  nombre='$nombre',apellido='$apellido',dni='$dni',tel='$tel',mail='$mail' WHERE id=$id";
    $query=mysqli_query($conexion,$sql);

        if($query){
            header("Location: ../pacientes.php") ;
        }
?>