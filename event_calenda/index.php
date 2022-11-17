<?php require_once('db-connect.php') ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/vnd.microsoft.icon" href="../../Img/log.ico" sizes="16x16 32x32">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALENDARI</title>
    <link href="admin.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light navColor fixed-top">
    <button id="sidebarCollapse" class="btn navbar-btn">W
      <i class="bi bi-list" style="font-size:25px"></i>
    </button>
    <a class="navbar-brand" href="">
      <img src="./Img/Logo.png" style="width: 100px;">
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
            <img src="./Img/jake.jpeg" class="FotoPerfilAdmin" width="80px">
          <h3>Nombre</h3>
          <h3>Apellido</h3>
        </center>
      </div>

      <ul class="list-unstyled components" align="center">
        <li>
          <a href="admin.html">Inicio</a>
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
          <a href="">Salir</a>
        </li>
      </ul>
      
    </nav>
    <div class="wrapper">
      <div class="tablacolor">
        <center>
        <div style=" overflow-y: auto;" > 
  <table class="table table-bordered border-primary" style='width: 100%;margin-top:100px;'>
    <!--HEADE DE TABLA-->
          <thead class="tablacolor">
            <tr style="color: rgb(230, 230, 230);">
              <th scope="col">N°</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apellido</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
    <!--FIN DE HEAD-->
          <tbody>
            <!--PACIENTE FILA-->
            <tr>
              <th scope="row">1</th>
              <td>Nombre</td>
              <td>Apellido</td>
              <td>
                <button type="button"style="border-radius: 50px;" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#EliminarAdmin">
                  Eliminar <i class="bi bi-trash-fill"></i> 
                </button>                              
              </td>
            </tr>
            <!--FIN DE PACIENTE-->
             <!--PACIENTE FILA-->
            <tr>
                  <th scope="row">2</th>
                  <td>Nombre</td>
                  <td>Apellido</td>
                  <td>
                    <button type="button"style="border-radius: 50px;" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#EliminarAdmin">
                      Eliminar <i class="bi bi-trash-fill"></i> 
                    </button>  
              </td>
                </tr>
                 <!--FIN DE PACIENTE-->
             <!--PACIENTE FILA-->
                <tr>
                      <th scope="row">3</th>
                      <td>Nombre</td>
                      <td>Apellido</td>
                      <td>
                        <button type="button"style="border-radius: 50px;" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#EliminarAdmin">
                          Eliminar <i class="bi bi-trash-fill"></i> 
                        </button>  
                  </td>
                    </tr>
                     <!--FIN DE PACIENTE-->
          </tbody>
        </table>
</div>
        </center>
        </div>
    <div class="container py-5" id="page-container">
        <div class="row">
            <div class="col-md-9">
                <div id="calendar" style="margin-top:40px;"></div>
            </div>
                    <!--FLOATING CREATE-->
            <div class="modal fade" id=myModal data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="titulo"></h5>
                  </div>
                  <form action="save_schedule.php" method="post" id="formulario">
                    <input type="hidden" name="id" value="">
                    <div class="modal-body">
                      <div class="form-floating">
                        <input type="text" class="form-control" id="title" name="title">
                        <label for="title" class="form-label">Evento</label>
                      </div>
                      <div class="form-floating">
                        <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                        <label for="description" class="control-label"></label>
                      </div>
                      <div class="form-floating">
                        <input type="datetime-local" class="form-control" id="start_datetime" name="start_datetime">
                        <label for="start_datetime" class="form-label">Fecha</label>
                      </div>
                      <div class="form-floating">
                        <input type="datetime-local" class="form-control" id="end-datetime" name="end_datetime">
                        <label for="end-datetime" class="control-label"></label> 
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" type="submit"  form="formulario"><i class="fa fa-save"></i>sum</button>
                      <button class="btn btn-warning" type="reset" data-bs-dismiss="modal" form="formulario"><i class="fa fa-reset"></i>Cancelar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
                    <!--END FLOATIN CREATE-->

    <!-- Event Details Modal -->
    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Detalles de evento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Nombre</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted"></dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Inicio</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">Fin</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Editar</button>
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Eliminar</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Event Details Modal -->

<?php 
$schedules = $conn->query("SELECT * FROM `schedule_list`");
$sched_res = [];
foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
    $sched_res[$row['id']] = $row;
}
?>
<?php 
if(isset($conn)) $conn->close();
?>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="lateral.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
  <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
  <script src="./js/bootstrap.min.js"></script>
  <script src='fullcalendar\lib\main.js'></script>
  <script src='fullcalendar\lib\locales\es.js'></script>
  <script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="./js/script.js"></script>
</body>


</html>