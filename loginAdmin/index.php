
<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="UTF-8">
        <link rel="icon" type="image/vnd.microsoft.icon" href="../AdminPag/Archivos Varios/Img/log.ico" sizes="16x16 32x32">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>DENTAL ROJAS | Admin Login</title>

        <!-- CSS -->
        <link rel="stylesheet" href="../AdminPag/Archivos Varios/Css/estilos.css">
        <link rel="stylesheet" href="../AdminPag/Archivos Varios/Css/loginAdmin.css">
        <link rel="stylesheet" href="../AdminPag/Archivos Varios/Css/botones.css">
        <link rel="stylesheet" href="../AdminPag/Archivos Varios/Css/CardPro.css">
        <link rel="stylesheet" href="../AdminPag/Archivos Varios/Css/hamburguesa.css">
        <link rel="stylesheet" href="../AdminPag/Archivos Varios/Css/navbarScroll.css">
        <link rel="stylesheet" href="../AdminPag/Archivos Varios/Bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../AdminPag/Archivos Varios/Css/whats.css">
        <link rel="stylesheet" href="../AdminPag/Archivos Varios/Css/whats2.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    </head>

    <!--LOGIN-->
    <body style="background-image: url('http://localhost/PROYECTOROJAS/AdminPag/Archivos%20Varios/Img/fondo5.jpg')">

        <div class="container ">
            <div class="row offset-md-3" >
                <form action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> method="POST"  >
                    <div class="col-md-7" style="margin-left: -2px">
                        <div class="container cuadroAdmin sombraA4" align="center">  
                            <div class="content text-center" > 
                                    <h1 class="text-white sombraL" style="font-size: 6rem;" ><i class="bi bi-gear" ></i>Dental Rojas</h1>
                                <h4 class="text-white sombraL" style="font-size: 1.9rem;">Modo Administrador <i class="bi bi-folder-plus"></i> </h4>
                            <br>
                            <div class="row justify-content-center " >
                                <div class="col-md-9 ">
                                <div class="form-floating mb-3 " >
                                    <input type="text" style="border-radius: 50px;"name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                    <label for="floatingInput">Email <i class="bi bi-person"></i></label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" style="border-radius: 50px;"  name="pwd" class="form-control" id="floatingPassword" placeholder="Password">
                                    <label for="floatingPassword">Contraseña <i class="bi bi-lock"></i></label>
                                </div>
                                </div>
                            </div>

                            </div>
                            <?php if(!empty($error)):?>
                            <div>
                            <?php echo $error; ?>
                            </div>
                            <?php endif; ?>
                            <br>
                                <button type="submit" class="btn btn-outline-primary sombraB " style="border-radius: 50px;background-color: #00b7ff; color:white; width: 150px; ">INGRESAR <i class="bi bi-box-arrow-in-right"></i></i></button>
                            <p></p>
                            <br>
                        </div>
                    </div>
                </form >
            </div>
        </div>

    </body>
    <!--FIN DE LOGIN-->

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script  src="../AdminPag/Archivos Varios/Js/script2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="../AdminPag/Archivos Varios/Bootstrap/js/bootstrap.min.js"></script>
    <!--<script src="Js/navbar.js"></script>-->

</html>
<?php  
require 'login.php';
?>