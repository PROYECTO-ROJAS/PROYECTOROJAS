<?php 
    include("php_code/conexion.php");

$legajo=$_GET['legajo'];

$sql="SELECT   * FROM doctores WHERE legajo=$legajo";
$query=mysqli_query($conexion,$sql);

$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administracion | Editar Dentista</title>
    <link href="../admin.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../Archivos Varios/Css/estilos.css">
    <link rel="stylesheet" href="../Archivos Varios/Css/loginAdmin.css">
    <link rel="stylesheet" href="../Archivos Varios/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body style="background-image: url('../Archivos Varios/Img/fondo6.jpg')">
<style>
.editarForm{
    background-image: linear-gradient(-225deg, rgb(85, 76, 243,0.8) 0%, rgb(29, 143, 225,0.8) 48%, rgb(34, 225, 255,0.8) 100%);
    border-radius: 50px;
    margin-top:10rem;
    color:white;
}    
</style>
    <div class="container">
        <div class="row">
            <center>
                 <div class="col-8 editarForm sombraA4">
                    <br>
                        <h3>Editar a Dentista <?php echo $row['nombre']; ?></h3>
                    <form method="post" action="php_code/update_doc.php" >
                        <div class="modal-body ">
                              <div class="row g-3"> 
                              <input type="hidden" name="legajo" value="<?php echo $row['legajo'] ;  ?> " >
                                        <div class="col-md-4">
                                          <label for="formAdmin01" class="form-label">Nombre</label>
                                          <input type="text" class="form-control" id="validationDefault01" value =<?php echo $row['nombre'] ?> name ="nombre"required>
                                        </div>
                                        <div class="col-md-4">
                                          <label for="formAdmin02" class="form-label">Apellido</label>
                                          <input type="text" class="form-control" id="validationDefault02" value =<?php echo $row['apellido'] ?> name ="apellido" required>
                                        </div>
                                        <div class="col-md-4">
                                          <label for="formAdmin03" class="form-label">DNI</label>
                                          <input type="number" class="form-control" id="validationDefault03" value =<?php echo $row['dni'] ?> name ="dni" required>
                                        </div>
                                        <div class="col-md-5">
                                          <label for="formAdmin04" class="form-label">Email</label>
                                          <input type="email" class="form-control" id="validationDefault04" value =<?php echo $row['correo'] ?> name ="correo" required>
                                        </div>
                                        <div class="col-md-4">
                                          <label for="formAdmin05" class="form-label">Telefono</label>
                                          <input type="text" class="form-control" id="validationDefault05" value =<?php echo $row['tel'] ?> name ="tel" required>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="especialidad" class="form-label">Especialidad</label>
                                            <select name="especialidad" id="especialidad" class="form-select" >
                                              <option>Ortodoncia</option>
                                              <option>Cirugía</option>
                                              <option>Implantes</option>
                                              <option>Prótesis</option>
                                              <option>Cirugía</option>
                                              <option>Prótesis</option>
                                              <option>Estética</option>
                                              <option>Endodoncia</option>
                                            </select>
                                          </div>
                                  </div>           
                            </div>
                            <div class="modal-footer">
                              <a href="dentistas.php" type="button" class="btn btn-secondary" style="border-radius: 50px;" data-bs-dismiss="modal">Cancelar</a>
                              <button class="btn btn-primary" style="border-radius: 50px;" type="submit">Guardar</button>
                            </div>
                        <!--FIN DE FORMULARIO AGREGAR-->
                      </form>
                </div>
            </center>
        </div>
    </div>
</body>
</html>