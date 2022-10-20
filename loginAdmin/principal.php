<?php session_start();

    if(isset($_SESSION['email'])){
        require '../AdminPag/admin.php';
    }else{
        header ('location: index.php');
    }
        
?>