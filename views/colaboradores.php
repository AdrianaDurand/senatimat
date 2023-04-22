<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] == false){
  header('Location:../index.php');
}
?>

<!doctype html>
<html lang="es">

<head>
  <title>COLABORADORES</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <!-- ICONS BOOTSTRAP-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  
    <!--Lightbox CSS-->
  <link rel="stylesheet" href="../dist/lightbox2/src/css/lightbox.css">

</head>


<html>
<div class="container">

<ul class="mb-3 nav nav-tabs">
  <li class="nav-item">
      <a class="nav-link active" aria-current="page" href="../index.php">Página Principal</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" aria-current="page" href="../views/estudiantes.php">Estudiantes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="../views/colaboradores.php">Colaboradores</a>
  </li>
  </ul>

  <div class="row">
    <div class="mb-3 d-grid gap-2 text-center" style="background-color: #006400; width: 100vw">
    <h1 class="my-3" style="text-decoration: underline; color: #ffffff">REGISTROS DE COLABORADORES</h1>
    </div>
</div>



<body>
  <div class="container mt-3">
    <div class="row">

      <div class="card-body">
        <table class="table table-sm table-striped" id="tabla-colaboradores">
          <thead>
          <tr>
          <th><i class="bi bi-list-ol"></i></th>
          <th>Apellidos</th>
          <th>Nombres</th>
          <th>Telefono</th>
          <th>Direccion</th>
          <th>Tipo C.</th>
          <th>Cargo</th>
          <th>Sede</th>
          <th>Operaciones</th>
        </tr>

          </thead>
        <tbody></tbody>
        
      </table>
      </div>

      <!-- Modal trigger button -->
      <div class="col-md-6 text-left">
          <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal-colaborador"><i class="bi bi-person-plus-fill"></i> Registrar</button>
      </div>


    </div>
  </div> <!-- Fin de container-->

  
  <!-- Modal Body -->
  <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
  <div class="modal fade" id="modal-colaborador" tabindex="-1" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header text-bg-secondary">
          <h5 class="modal-title" id="modalTitleId">Complete el Registro de NUEVO Colaborador:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        <form action="" autocomplete="off" id="formulario-colaboradores" enctype="multipart/form-data">
          <div class="row">
              <div class="mb-3 col-md-6">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" id="apellidos" class="form-control form-control-sm" autofocus>
              </div>
              <div class="mb-3 col-md-6">
                <label for="nombres" class="form-label">Nombres</label>
                <input type="text" id="nombres" class="form-control form-control-sm" autofocus>
              </div>
          </div>


          <div class="row">
              <div class="mb-3 col-md-6">
                <label for="nrodocumento" class="form-label">DNI:</label>
                <input type="text" id="nrodocumento" pattern="\d{8}" maxlength="8" class="form-control form-control-sm" autofocus>
              </div>
                <div class="mb-3 col-md-6">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="text" id="telefono" pattern="\d{9}" maxlength="9" class="form-control form-control-sm" autofocus>
              </div>
          </div>

          <div class="row">
                <div class="mb-3 col-md-6">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" id="direccion" class="form-control form-control-sm" autofocus>
              </div>
              <div class="mb-3 col-md-6">
              <label for="tipocontrato" class="form-label">Tipo Contrato:</label>
              <select id="tipocontrato" class="form-select form-select-sm">
                <option value="">Seleccione</option>
                <option value="P">Parcial</option>
                <option value="C">Completo</option>
              </select>
              </div>
          </div>

          <div class="row">
              <div class="mb-3 col-md-6">
              <label for="cargo" class="form-label">Cargo:</label>
              <select id="cargo" class="form-select form-select-sm">
                <option value="">Seleccione</option>
              </select>
              </div>
              <div class="mb-3 col-md-6">
              <label for="sede" class="form-label">Sede:</label>
              <select id="sede" class="form-select form-select-sm">
                <option value="">Seleccione</option>
              </select>
              </div>
          </div>

        
              <div class="mb-3">
              <label for="curriculumvitae" class="form-label">Curriculum Vitae:</label>
              <input type="file" id="curriculumvitae" accept=".pdf" class="form-control form-control-sm" >
            </div>

        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="guardar-colaborador">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  
  

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <!--Sweet alert2-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!--Lightbox JS-->
  <script src="../dist/lightbox2/src/js/lightbox.js"></script>

  <script>
    $(document).ready(function (){


      function obtenerCargos(){
        $.ajax({
          url: '../controllers/cargo.controller.php',
          type: 'POST',
          data: {operacion: 'listar'},
          dataType: 'text',
          success: function(result){
            $("#cargo").html(result);
          }

        });
      }

      function obtenerSedes(){
        $.ajax({
          url: '../controllers/sede.controller.php',
          type: 'POST',
          data: {operacion: 'listar'},
          dataType: 'text',
          success: function(result){
            $("#sede").html(result);
          }

        });
      }


      function registrarColaborador(){
        //Enviaremos los datos dentro de un OBJETO
        //Para adjuntar algún archico multimedia(se conoce como BINARIO) se hace con formData:
        var formData = new FormData();

        formData.append("operacion", "registrar");
        formData.append("apellidos", $("#apellidos").val());
        formData.append("nombres", $("#nombres").val());
        formData.append("nrodocumento", $("#nrodocumento").val());
        formData.append("telefono", $("#telefono").val());
        formData.append("direccion", $("#direccion").val());
        formData.append("tipocontrato", $("#tipocontrato").val());
        formData.append("idcargo", $("#cargo").val());
        formData.append("idsede", $("#sede").val());
        formData.append("curriculumvitae", $("#curriculumvitae")[0].files[0]);
      

        $.ajax({
          url: '../controllers/colaborador.controller.php',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          cache: false,
          success: function(){
            $("#formulario-colaboradores")[0].reset();
            mostrarColaboradores();
            $("#modal-colaborador").modal("hide");
          }
        });
      }


      function preguntarRegistroCOLAB(){
        Swal.fire({
          icon: 'question',
          title: 'Agregar Colaborador',
          text:'¿Estas seguro de registrar a esta persona como colaborador?',
          footer: 'Desarrollado con PHP',
          confirmButtonText: 'Aceptar',
          confirmButtonColor: '#EE8509',
          showCancelButton: true,
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          //Identificando la acción del usuario
          if(result.isConfirmed){
              registrarColaborador();
          }
        });
      }

      function mostrarColaboradores(){
        $.ajax({
          url: '../controllers/colaborador.controller.php',
          type: 'POST',
          data: {operacion: 'listar'},
          dataType: 'text',
          success: function(result){
            $("#tabla-colaboradores tbody").html(result);
          }
        });
      }
    
      $("#guardar-colaborador").click(preguntarRegistroCOLAB);



    
      //Predeterminamos un control dentro del modal
      $("#modal-colaborador").on("shown.bs.modal", event => {
        $("#apellidos").focus();

        //EVENTOS
        obtenerCargos();
        obtenerSedes();
      });

      //Funciones de carga auomática
      mostrarColaboradores();
      

      
      // ELIMINAR COLABORADORES
      $("#tabla-colaboradores tbody").on("click", ".eliminar", function(){
        const idcolaboradorEliminar = $(this).data("idcolaborador");
        if (confirm("¿Está seguro de eliminar a este Colaborador?")){
          $.ajax({
            url: '../controllers/colaborador.controller.php',
            type: 'POST',
            data: {
              operacion   : 'eliminar',
              idcolaborador   : idcolaboradorEliminar
            },
            success: function(result){
              if(result == ""){
              mostrarColaboradores();
              }
            }
          });
        }
      });

    });
  </script>

</body>

</html>