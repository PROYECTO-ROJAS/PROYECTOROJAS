<?php session_start();

    if(isset($_SESSION['usuario'])){
        require '../AdminPag/admin.php';
    }else{
        header ('location: login.php');
    }
        
?>