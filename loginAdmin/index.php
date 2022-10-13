<?php 

    if(issen($_SESSION['usuario'])){
        header('location: ../VistadAdmin/admin.php');

    }else{
        header('location: loginAdmin.php');
    }

?>