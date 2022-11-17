<?php 
    include("conexion.php");

    $id = $_GET['id'];

    $consulta_sql="DELETE FROM pacientes WHERE id = '$id' ";
    $query=mysqli_query($conexion,$consulta_sql);


    if($query){
        header("Location: ../pacientes.php") ;
    }



?>