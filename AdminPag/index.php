<?php 
 session_start();
 if (isset($_SESSION['email'])){
    header('location: admin.php');
   include("php_code/conexion.php");
}
else{
  header('location: ../index.php');
}
?>