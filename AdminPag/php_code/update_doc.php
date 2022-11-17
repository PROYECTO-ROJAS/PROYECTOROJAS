<?php 
    include("conexion.php");
    $legajo=$_POST['legajo'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $tel = $_POST ['tel'];
    $dni = $_POST ['dni'];
    $especialidad = $_POST ['especialidad'];
    $correo = $_POST['correo'];

    
    $sql="UPDATE doctores SET  nombre='$nombre',apellido='$apellido',tel='$tel',dni='$dni',especialidad='$especialidad',correo='$correo' WHERE legajo=$legajo";
    $query=mysqli_query($conexion,$sql);
    
        if($query){
            header("Location: ../dentistas.php") ;
        }
?>
