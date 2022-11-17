<!doctype html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <link rel="icon" type="image/vnd.microsoft.icon" href="Archivos Varios/Img/log.ico" sizes="16x16 32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administración | Inicio </title>

    <link href="admin.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="Archivos Varios/Css/estilos.css">
    <link rel="stylesheet" href="Archivos Varios/Css/loginAdmin.css">
    <link rel="stylesheet" href="Archivos Varios/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <?php
     include("VistasAdmin/php_code/conexion.php")
    ?>
    <!-- Bootstrap CSS -->
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-light navColor fixed-top">
    <button id="sidebarCollapse" class="btn navbar-btn">
      <i class="bi bi-list" style="font-size:25px"></i>
    </button>
    <a class="navbar-brand" href="">
      <img src="Archivos Varios/Img/Logo.png" style="width: 100px;">
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto TextNav" >
        <li class="nav-item" style="margin-top: -10px;">
          <!--Hora-->
          <h5 id="mostrarHora" ></h5>
        </li>
          <li class="nav-item " style="margin-top: -10px;">
            <!--Fecha-->
              <h5 id="FechaHoy_Date"></h5> 
          </li>
      </ul>
    </div>
    
  </nav>

  <div class="wrapper fixed-left">
    <nav id="sidebar">
      <div class="sidebar-header">
        <center>
          <h3><u>Inicio</u></h3>
            <img src="Archivos Varios/Img/jake.jpeg" class="FotoPerfilAdmin" width="80px">
          <h3><?php echo $_SESSION['nombre']?></h3>
          <h3><?php echo $_SESSION['apellido']?></h3>
       
        </center>
      </div>

      <ul class="list-unstyled components" align="center">
        <li>
          <a href="admin.php">Inicio</a>
        </li>
        <li>
          <a href="">Calendario</a>
        </li>
        <li>
          <a href="VistasAdmin/pacientes.php">Pacientes</a>
        </li>
        <li>
          <a href="VistasAdmin/dentistas.php">Dentistas</a>
        </li>
        <li>
          <a href="VistasAdmin/ajustes.php">Ajustes</a>
        </li>
        <li class="salir">
          <a href="Archivos Varios\Inc\cerrarSession.php">Salir</a>
        </li>
      </ul>
      
    </nav>