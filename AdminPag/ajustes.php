<?php session_start();
 
  if (isset($_SESSION['email'])){
?>
<?php 
  require_once 'Archivos Varios\Inc\header.php';
?>
    <!--BODY-->
    <div id="content">
      <div class="container" style="margin-top: -25px; ;">
        <div class="row">
            <h2 align="center"><i class="bi bi-person-bounding-box"></i> Perfil </h2> 
            <div class="col-md-12 border border-primary p-2 redondo" style="width: 98%; margin:auto" >
              <div class="container">
                <div class="row">
                  <div class="col-5" align="center">
                    <img src="../Archivos Varios//Img/jake.jpeg" class="FotoPerfilAdmin" width="300px">
                  </div>
                  <div class="col-md-7">
                      <br>
                        <h2><?php echo $_SESSION['nombre']  ," ", $_SESSION['apellido']?></h2>
                        <h4><?php echo "DNI " ,$_SESSION['dni']?></h4>
                        <h4><?php echo "Telefono : " ,$_SESSION['telefono']?></h4>
                        <h4><?php echo $_SESSION['email']?></h4>
                      <br>
                      <div class="d-grid gap-2">
                        <button type="button" class="btn btn-success" style="border-radius: 50px;" data-bs-toggle="modal" data-bs-target="#EDITARPERFIL">
                          Editar Perfil <i class="bi bi-pencil-square"></i>
                        </button>
                        <button type="button" class="btn btn-info" style="border-radius: 50px; color:white" data-bs-toggle="modal" data-bs-target="#CAMBIARCONTRA">
                          Cambiar Contraseña <i class="bi bi-lock-fill"></i>
                        </button>
                      </div>
                  </div>
                  </div>
                </div>
            </div>
             <!--Fin-->
          </div>
          <!--ADMINISTRADORES-->
          <br>
          <div class="row">
            <h2 align="center"><i class="bi bi-people-fill"></i> Administradores</h2>
            <div class="col-md-12 border border-primary p-2 redondo" style="width: 98%; margin:auto">
       
              <!--BOTON-->
              <form >
                <div class="d-grid">
                  <center>
                   <button type="button" class="btn btn-primary" style="border-radius:50px; width: 95%;" data-bs-toggle="modal" data-bs-target="#AgregarPersona">
                    Agregar Administrador <i class="bi bi-person-plus-fill"></i>
                  </button>
                  </center>
                </div>
              </form>
              <!--FIN BOTON-->
              <div class="col-md-12" style="margin-top:10px;">
               <center>
              <div style="height: 13rem; overflow-y: auto;" > 
                <table class="table table-bordered border-primary" style="width: 95%;">
                  <!--HEADE DE TABLA-->
                        <thead class="tablacolor">
                          <tr style="color: rgb(230, 230, 230);">
                            <th scope="col">N°</th>
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
                          <tr>
                            <th scope="row">1</th>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>NumeroDeDni</td>
                            <td>NumTelefono</td>
                            <td>correoElect@gmail.com</td>
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
                                <td>NumeroDeDni</td>
                                <td>NumTelefono</td>
                                <td>correoElect@gmail.com</td>
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
                                    <td>NumeroDeDni</td>
                                    <td>NumTelefono</td>
                                    <td>correoElect@gmail.com</td>
                                    <td>
                                      <button type="button"style="border-radius: 50px;" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#EliminarAdmin">
                                        Eliminar <i class="bi bi-trash-fill"></i> 
                                      </button>  
                                </td>
                                  </tr>
                                   <!--FIN DE PACIENTE-->
                                   
                        </tbody>
                      </table>
                    </center>
                </div>
              </div>
            </div>
          </div>
          <br>
          <!--FIN DE ADMINISTRADORES -->
          <!--FIN DE COLUMNAS-->
        </div>
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
    <script src="../Archivos Varios//Bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>

<!-- Modal EDITAR PERFIL -->
<div class="modal fade" id="EDITARPERFIL" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="EDITARPERFIL" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="staticBackdropLabel" style="color: #fff;">Editar Perfil</h5>
      </div>
      <!--FORMULARIO EDITAR-->
      <form action="" method="post">
          <div class="modal-body ">
                <div class="row g-3"> 
                          <div class="col-md-4">
                            <label for="formAdmin01" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="validationDefault01" value="Mark" required>
                          </div>
                          <div class="col-md-4">
                            <label for="formAdmin02" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="validationDefault02" value="Otto" required>
                          </div>
                          <div class="col-md-3">
                            <label for="formAdmin03" class="form-label">DNI</label>
                            <input type="number" class="form-control" id="validationDefault03" required>
                          </div>
                          <div class="col-md-6">
                            <label for="formAdmin04" class="form-label">Email</label>
                            <input type="email" class="form-control" id="validationDefault04" required>
                          </div>
                          <div class="col-md-3">
                            <label for="formAdmin05" class="form-label">Telefono</label>
                            <input type="text" class="form-control" id="validationDefault05" required>
                          </div>
                          <div class="col-md-8">
                            <label for="formAdmin06" class="form-label">Subir Foto de Perfil</label>
                            <input class="form-control" id="formAdmin06" name="formAdmin06" type="file">
                          </div> 
                    </div>              
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" style="border-radius: 50px;" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-success" style="border-radius: 50px;" type="submit">Guardar</button>
              </div>
          <!--FIN DE FORMULARIO EDITAR-->
        </form>
    </div>
  </div>
</div>

<!--MODAL CAMBIAR CONTRASEÑA-->
<div class="modal fade" id="CAMBIARCONTRA" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="CAMBIARCONTRA" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="staticBackdropLabel" style="color: #fff;">Cambiar Contraseña</h5>
      </div>
      <!--FORMULARIO EDITAR-->
      <form action="" method="post">
          <div class="modal-body ">
                <div class="row g-3"> 
                          <div class="col-md-12">
                            <label for="ContraAdmin01" class="form-label">Contraseña Actual</label>
                            <input type="password" class="form-control" id="ContraAdmin01" required>
                          </div>
                          <div class="col-md-12">
                            <label for="ContraAdmin02" class="form-label">Nueva Contraseña</label>
                            <input type="password" class="form-control" id="ContraAdmin02" required>
                          </div>
                          <div class="col-md-12">
                            <label for="ContraAdmin03" class="form-label">Repita su Contraseña</label>
                            <input type="password" class="form-control" id="ContraAdmin03" required>
                          </div>
                    </div>              
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" style="border-radius: 50px;" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-info"style="border-radius: 50px; color:white" type="submit">Guardar</button>
              </div>
          <!--FIN DE FORMULARIO EDITAR-->
        </form>
    </div>
  </div>
</div>

<!-- Eliminar usuario -->
<div class="modal fade" id="EliminarAdmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="staticBackdropLabel" style="color: #fff;">Elimnar Administrador</h5>
      </div>
      <div class="modal-body">
        ¿Desea Elimnar a (Administrador)?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" style="border-radius: 50px;" data-bs-dismiss="modal">Cancelar</button>
        <button class="btn btn-danger"style="border-radius: 50px; color:white" type="submit">Eliminar</button>
      </div>
    </div>
  </div>
</div>
<!-- FIN DE Eliminar usuario-->



<!-- AGREGAR PERSONA  -->
<div class="modal fade" id="AgregarPersona" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="AgregarPersona" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary" style="color:#fff">
          <h5 class="modal-title" id="staticBackdropLabel">Agregar Administrador</h5>
        </div>
        <!--FORM AGREGAR-->
        <form action="" method="post">
            <div class="modal-body ">
                  <div class="row g-3"> 
                            <div class="col-md-4">
                              <label for="formAdmin01" class="form-label">Nombre</label>
                              <input type="text" class="form-control" id="validationDefault01" value="Mark" required>
                            </div>
                            <div class="col-md-4">
                              <label for="formAdmin02" class="form-label">Apellido</label>
                              <input type="text" class="form-control" id="validationDefault02" value="Otto" required>
                            </div>
                            <div class="col-md-3">
                              <label for="formAdmin03" class="form-label">DNI</label>
                              <input type="number" class="form-control" id="validationDefault03" required>
                            </div>
                            <div class="col-md-6">
                              <label for="formAdmin04" class="form-label">Email</label>
                              <input type="email" class="form-control" id="validationDefault04" required>
                            </div>
                            <div class="col-md-3">
                              <label for="formAdmin05" class="form-label">Telefono</label>
                              <input type="text" class="form-control" id="validationDefault05" required>
                            </div>
                            <div class="col-md-4">
                                <label for="ContraAdmin02" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="ContraAdmin02" required>
                              </div>
                              <div class="col-md-4">
                                <label for="ContraAdmin03" class="form-label">Repita su Contraseña</label>
                                <input type="password" class="form-control" id="ContraAdmin03" required>
                              </div>
                            <div class="col-md-8">
                              <label for="formAdmin06" class="form-label">Subir Foto de Perfil</label>
                              <input class="form-control" id="formAdmin06" name="formAdmin06" type="file">
                            </div> 
                      </div>           
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" style="border-radius: 50px;" data-bs-dismiss="modal">Cancelar</button>
                  <button class="btn btn-primary" style="border-radius: 50px;" type="submit">Guardar</button>
                </div>
            <!--FIN DE FORMULARIO AGREGAR-->
          </form>
      </div>
    </div>
  </div>
  <!--FIN DE AGREGAR PERSONA-->
<?php 
  }
  else{
    header('location: ../index.php');
  }
?>
