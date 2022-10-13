<?php

 include("conexion.php");

 $id = $_GET ['legajo'];

 $consulta_sql="DELETE FROM doctores WHERE legajo = $id ";
 $query=mysqli_query($conexion,$consulta_sql);

 if($query){
    header("Location: ../dentistas.php") ;
}
 
?>