<?php session_start();

    if(isset($_SESSION['email'])) {
        header('location: ../AdminPag/admin.php');
    }

    $error = '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $usuario = $_POST['email'];
        $clave = $_POST['pwd'];
  
        
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=base_rojas', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
        
        $statement = $conexion->prepare('
        SELECT * FROM admin WHERE email = :email  AND pwd = :pwd'
        );
        
        $statement->execute(array(
            ':email' => $usuario,
            ':pwd' => $clave
        ));
            
        $resultado = $statement->fetch();
        
        if ($resultado !== false){
            $_SESSION['email'] = $usuario;
            header('location: ../AdminPag/admin.php');
        }else{
            $error .= '<i>Este usuario no existe</i>';
        }
    }
    
require 'indexHtml.php';


?>