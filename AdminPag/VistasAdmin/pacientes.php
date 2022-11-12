<?php session_start();

  if (isset($_SESSION['email'])){
 
  
  ?>

<!doctype html>
<html lang="en">
  <head>
 
    <meta charset="UTF-8">
    <link rel="icon" type="image/vnd.microsoft.icon" href="../Archivos Varios/Img/log.ico" sizes="16x16 32x32">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administracion | Pacientes </title>

    <link href="../admin.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../Archivos Varios/Css/estilos.css">
    <link rel="stylesheet" href="../Archivos Varios/Css/loginAdmin.css">
    <link rel="stylesheet" href="../Archivos Varios/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../Tooltips.css">
     <?php
     include('php_code/conexion.php');
          // function to connect and execute the query
          function filterTable($query)
          {
              $connect = mysqli_connect("localhost", "root", "", "base_rojas");
              $filter_Result = mysqli_query($connect, $query);
              return $filter_Result;
          }
     if(isset($_POST['search']))
     {
         $valueToSearch = $_POST['valueToSearch'];
         // search in all table columns
         // using concat mysql function
         $query = "SELECT * FROM `pacientes` WHERE CONCAT(`nombre`, `apellido`, `dni`, `tel`,'mail') LIKE '%".$valueToSearch."%'";
         $search_result = filterTable($query);
         
     }
      else {
         $query = "SELECT * FROM `pacientes`";
         $search_result = filterTable($query);
     }
      

    ?>

    <!-- Bootstrap CSS -->    
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-light navColor fixed-top">
    <button id="sidebarCollapse" class="btn navbar-btn">
      <i class="bi bi-list" style="font-size:25px"></i>
    </button>
    <a class="navbar-brand" href="">
      <img src="../Archivos Varios/Img/Logo.png" style="width: 100px;">
    </a>

    <div class="collapse navbar-collapse"  id="navbarSupportedContent">
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
          <h3><u>Pacientes</u></h3>
          <img src="../Archivos Varios/Img/jake.jpeg" class="FotoPerfilAdmin" width="80px">
          <h3>Nombre</h3>
          <h3>Apellido</h3>
        </center>
      </div>

      <ul class="list-unstyled components" align="center">
        <li>
          <a href="../admin.php">Inicio</a>
        </li>
        <li>
          <a href="">Calendario</a>
        </li>
        <li>
          <a href="pacientes.php">Pacientes</a>
        </li>
        <li>
          <a href="dentistas.php">Dentistas</a>
        </li>
        <li>
          <a href="ajustes.php">Ajustes</a>
        </li>
        <li class="salir">
        <a href="../Archivos Varios/Inc/cerrarSession.php">Salir</a>

        </li>
      </ul>
      
    </nav>
    <!--BODY-->
    <div id="content">
      <div class="container">
        <div class="row">
              <div class="col-md-12 d-flex p-3">
              
             <form class="botonResponsive">
               <div class="col">
                <button type="button" class="btn btn-success" style="border-radius:50px;" data-bs-toggle="modal" data-bs-target="#AgregarPersona">
                  Agregar Paciente <i class="bi bi-person-plus-fill"></i>
                </button>
              </div>
              </form>
             
        <!-- Inicio Buscar-->
       <form action="pacientes.php" method="POST" style="width:100%" class="d-flex">
        <div class="col">
        <input class="form-control me-2 buscador"  style="border-radius: 50px;" type="text" name="valueToSearch" placeholder="Buscar">
        </div>
      <div class="col-2 ">
         <span class="iconosTool" data-tooltip="Buscar" >
         <button class="btn btn-outline-primary" style="border-radius: 50px; margin-left:3px;" type="submit" name="search"><i class="bi bi-search"></i></button> 
         </span>

         <span  class="iconosTool" data-tooltip="Borrar Busqueda">
         <a class="btn btn-outline-success" style="border-radius: 50px; margin:auto 0;"  href="pacientes.php"><i class="bi bi-x-lg"></i></a>
         </span>
    </div>
       </div>
<br>
             <div style="height: 41.9rem; overflow-y: auto;" > 
              
              <div class="col-md-12" style="margin-top:10px;">
                <table class="table  table-bordered border-primary">
                  <!--HEADE DE TABLA-->
                        <thead class="tablacolor">
                          <tr style="color: rgb(240, 240, 240);">
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Email</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                  <!--FIN DE HEAD-->
                        <tbody>
                          <!--PACIENTE FILA-->
                          <?php 
                            while($row = mysqli_fetch_array($search_result)) 
                              {
                            ?>
                          <tr>
                            <td><?php echo $row['nombre']?></td>
                            <td><?php echo $row['apellido']?></td>
                            <td><?php echo $row['dni']?></td>
                            <td><?php echo $row['tel']?></td>
                            <td><?php echo $row['mail']?></td>
                            <td>    
                              <span class="iconosTool" data-tooltip="Ver mas"><button type="button" style="border-radius: 50px; color: #fff;" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#VerPersona">
                                  <i class="bi bi-person-lines-fill"></i>
                                </button></span>
                                <span  class="iconosTool" data-tooltip="Editar"> 
                                <a class="btn btn-warning btn-sm " href= "editar_form_pac.php?id= <?php echo $row['id']; ?>" style="border-radius: 50px;">
                                  <i class="bi bi-pencil-fill"></i></a></span>
                                <!-- Boton Eliminar Paciente -->
                                <span  class="iconosTool" data-tooltip="Elimnar">
                                <a class="btn btn-danger btn-sm " href= "php_code/delet_pac.php?id= <?php echo $row['id']; ?>"  class="iconosTool" data-tooltip="Eliminar"  style="border-radius: 50px;">
                                  <i class="bi bi-trash-fill"></i></a></span>
                          </td>
                          </tr>
                          <?php
                                }
                          ?>

                          <!--FIN DE PACIENTE-->
                        </tbody>
                      </table>
                      </form>
                </div>
              </div>
            </div>
             <!--Fin-->
          </div>
          <!--FIN DE COLUMNAS-->
        </div>
     

    </div>
  </div>
    
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="../lateral.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
   <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
   <script src="../Archivos Varios/Bootstrap/js/bootstrap.min.js"></script>
  
    
  </body>
</html>


<!-- AGREGAR PERSONA  -->
<div class="modal fade" id="AgregarPersona" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="AgregarPersona" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success" style="color:#fff">
          <h5 class="modal-title" id="staticBackdropLabel">Agregar Paciente</h5>
        </div>
        <!--FORM AGREGAR-->
        <form method="post" action="php_code/insert_pac.php" >
            <div class="modal-body ">
                  <div class="row g-3"> 
                  <div class="col-md-4">
                            <label for="formAdmin01" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="validationDefault01" name ="nombre"required>
                          </div>
                          <div class="col-md-4">
                            <label for="formAdmin02" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="validationDefault02" name ="apellido" required>
                          </div>
                          <div class="col-md-3">
                            <label for="formAdmin03" class="form-label">DNI</label>
                            <input type="number" class="form-control" id="validationDefault03" name ="dni" required>
                          </div>
                          <div class="col-md-6">
                            <label for="formAdmin04" class="form-label">Email</label>
                            <input type="email" class="form-control" id="validationDefault04" name ="mail" required>
                          </div>
                          <div class="col-md-3">
                            <label for="formAdmin05" class="form-label">Teléfono</label>
                            <input type="number" class="form-control" id="validationDefault05" name ="telefono" required>
                          </div>
                      </div>           
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" style="border-radius: 50px;" data-bs-dismiss="modal">Cancelar</button>
                  <button class="btn btn-success
                  " style="border-radius: 50px;" type="submit">Guardar</button>
                </div>
            <!--FIN DE FORMULARIO AGREGAR-->
          </form>
      </div>
    </div>
  </div>
  <!--FIN DE AGREGAR PERSONA-->


  
<!-- EDITAR PERSONA  -->
<div class="modal fade" id="EditarPersona" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="AgregarPersona" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-warning" style="color:#fff">
        <h5 class="modal-title" id="staticBackdropLabel">Editar Paciente</h5>
      </div>

      
      <!--FORM AGREGAR-->
      <form method="post" action="php_code/insert_pac.php" >
          <div class="modal-body ">
                <div class="row g-3"> 
                          <div class="col-md-4">
                            <label for="formAdmin01" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="validationDefault01" name ="nombre"required>
                          </div>
                          <div class="col-md-4">
                            <label for="formAdmin02" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="validationDefault02" name ="apellido" required>
                          </div>
                          <div class="col-md-3">
                            <label for="formAdmin03" class="form-label">DNI</label>
                            <input type="number" class="form-control" id="validationDefault03" name ="dni" required>
                          </div>
                          <div class="col-md-6">
                            <label for="formAdmin04" class="form-label">Email</label>
                            <input type="email" class="form-control" id="validationDefault04" name ="mail" required>
                          </div>
                          <div class="col-md-3">
                            <label for="formAdmin05" class="form-label">Telefono</label>
                            <input type="text" class="form-control" id="validationDefault05" name ="telefono" required>
                          </div>
                    </div>           
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" style="border-radius: 50px;" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-warning" style="border-radius: 50px;" type="submit">Guardar</button>
              </div>
          <!--FIN DE FORMULARIO AGREGAR-->
        </form>



    </div>
  </div>
</div>
<!--FIN DE EDITAR PERSONA-->

<!-- VER PERSONA  -->
<div class="modal fade" id="VerPersona" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="AgregarPersona" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-info" style="color:#fff">
        <h5 class="modal-title" id="staticBackdropLabel">Ver Paciente</h5>
      </div>
      <!--VER INFO-->
          <div class="modal-body ">
                <div class="row g-3"> 
                          <div class="col-md-6">
                            <h5>Nombre Apellido</h5>
                          </div>
                          <div class="col-md-3">
                            <h5>DNI: 43628857</h5>
                          </div>
                          <div class="col-md-6">
                            <h5>Email: Email@ejemplo.com</h5>
                          </div>
                          <div class="col-md-6">
                            <h5>TEL: +54 9 1138949280</h5>
                          </div>
                  </div>           
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" style="border-radius: 50px;" data-bs-dismiss="modal">Cerrar</button>
              </div>
          <!--FIN DE VER INFO-->
    </div>
  </div>
</div>
<!--FIN DE VER PERSONA-->
<?php 
  }
?>