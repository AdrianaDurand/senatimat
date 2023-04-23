<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] == false){
  header('Location:../index.php');
}
?>

<!doctype html>
<html lang="es">

<head>
  <title>ESTUDIANTES</title>
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
      <a class="nav-link active" aria-current="page" href="../index.php"><i class="bi bi-house-fill"></i> Página Principal</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" aria-current="page" href="../views/estudiantes.php"><i class="bi bi-person-fill"></i> Estudiantes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" aria-current="page" href="../views/colaboradores.php"><i class="bi bi-person-square"></i> Colaboradores</a>
  </li>

  <button type="button" id="cerrar-sesion" class="btn btn-sm btn-danger ms-auto">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"></path>
        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"></path>
    </svg>
</button>

  </ul>
  
  <div class="row">
    <div class="mb-3 d-grid gap-2 text-center" style="background-color: #007bff; width: 100vw">
        <h1 class="my-3" style="text-decoration: underline; color: #ffffff">REGISTROS DE ESTUDIANTES</h1>
    </div>
</div>



<body>
  <div class="container mt-3 mb-5">
    <div class="row">

      <div class="card-body">
        <table class="table table-sm table-striped" id="tabla-estudiantes">
          <thead>
          <tr>
          <th><i class="bi bi-list-ol"></i></th>
          <th>Apellidos</th>
          <th>Nombres</th>
          <th>Tipo Doc.</th>
          <th>Documento</th>
          <th>Nacimiento</th>
          <th>Carrera</th>
          <th>Operaciones</th>
        </tr>

          </thead>
        <tbody></tbody>

        </table>

        

    </div>
    <!-- Modal trigger button -->
    <div class="col-md-6 text-left">
          <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-estudiante"><i class="bi bi-person-plus-fill"></i> Registrar</button>
    </div>

    </div>
  </div> <!-- Fin de container-->

  

  


  
  <!-- Modal Body -->
  <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
  <div class="modal fade" id="modal-estudiante" tabindex="-1" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header text-bg-secondary">
          <h5 class="modal-title" id="modalTitleId">Complete el Registro de NUEVO Estudiante:</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        <form action="" autocomplete="off" id="formulario-estudiantes" enctype="multipart/form-data">
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
              <label for="tipodocumento" class="form-label">Tipo Documento:</label>
              <select id="tipodocumento" class="form-select form-select-sm">
                <option value="">Seleccione</option>
                <option value="D">DNI</option>
                <option value="C">Carnet de Extranjería</option>
              </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="nrodocumento" class="form-label">N° Documento:</label>
                <input type="text" id="nrodocumento" pattern="\d{8}" maxlength="8" class="form-control form-control-sm" autofocus>
              </div>
          </div>

          <div class="row">
              <div class="mb-3 col-md-6">
              <label for="fechanacimiento" class="form-label">Fecha de nacimiento:</label>
              <input type="date" class="form-control form-control-sm" id="fechanacimiento">
            </div>
            <div class="mb-3 col-md-6">
              <label for="sede" class="form-label">Sede:</label>
              <select id="sede" class="form-select form-select-sm">
                <option value="">Seleccione</option>
              </select>
              </div>
          </div>

          <div class="row">
              <div class="mb-3 col-md-6">
              <label for="escuela" class="form-label">Escuela:</label>
              <select id="escuela" class="form-select form-select-sm">
                <option value="">Seleccione</option>
              </select>
              </div>
              <div class="mb-3 col-md-6">
              <label for="carrera" class="form-label">Carreras:</label>
              <select id="carrera" class="form-select form-select-sm">
                <option value="">Seleccione</option>
              </select>
              </div>
          </div>

              <div class="mb-3">
              <label for="fotografia" class="form-label">Fotografía:</label>
              <input type="file" id="fotografia" accept=".jpg" class="form-control form-control-sm" >
            </div>

        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" id="guardar-estudiante">Guardar</button>
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>


  <!--Lightbox JS-->
  <script src="../dist/lightbox2/src/js/lightbox.js"></script>

  <script>
    $(document).ready(function (){

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


      function obtenerEscuelas(){
        $.ajax({
          url: '../controllers/escuela.controller.php',
          type: 'POST',
          data: {operacion: 'listar'},
          dataType: 'text',
          success: function(result){
            $("#escuela").html(result);
          }

        });
      }

      function registrarEstudiante(){
        //Enviaremos los datos dentro de un OBJETO
        //Para adjuntar algún archico multimedia(se conoce como BINARIO) se hace con formData:
        var formData = new FormData();

        formData.append("operacion", "registrar");
        formData.append("apellidos", $("#apellidos").val());
        formData.append("nombres", $("#nombres").val());
        formData.append("tipodocumento", $("#tipodocumento").val());
        formData.append("nrodocumento", $("#nrodocumento").val());
        formData.append("fechanacimiento", $("#fechanacimiento").val());
        formData.append("idcarrera", $("#carrera").val());
        formData.append("idsede", $("#sede").val());
        formData.append("fotografia", $("#fotografia")[0].files[0]);
      

        $.ajax({
          url: '../controllers/estudiante.controller.php',
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          cache: false,
          success: function(){
            $("#formulario-estudiantes")[0].reset();
            mostrarEstudiantes();
            $("#modal-estudiante").modal("hide");

          }
        });
      }


      function preguntarRegistro(){
        Swal.fire({
          icon: 'question',
          title: 'Matriculas',
          text:'¿Estas seguro de registrar al estudiante?',
          footer: 'Desarrollado con PHP',
          confirmButtonText: 'Aceptar',
          confirmButtonColor: '#007bff',
          showCancelButton: true,
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          //Identificando la acción del usuario
          if(result.isConfirmed){
              registrarEstudiante();
          }
        });
      }

      document.getElementById('cerrar-sesion').addEventListener('click', function() {
        Swal.fire({
          title: '¿Deseas cerrar sesión?',
          text: 'Cerraremos tu sesión actual.',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sí, cerrar sesión',
          cancelButtonText: 'Cancelar'
      }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = '../controllers/usuario.controller.php?operacion=finalizar';
        }
      });
        });

      

      function mostrarEstudiantes(){
        $.ajax({
          url: '../controllers/estudiante.controller.php',
          type: 'POST',
          data: {operacion: 'listar'},
          dataType: 'text',
          success: function(result){
            $("#tabla-estudiantes tbody").html(result);
          }
        });
      }
    
      $("#guardar-estudiante").click(preguntarRegistro);

      



      //Al cambiar una escuela, se actualizarán las carreras
      $("#escuela").change(function (){
        const idescuelaFiltro = $(this).val();

        $.ajax({
          url: '../controllers/carrera.controller.php',
          type: 'POST',
          data: {
            operacion     :'listar',
            idescuela     : idescuelaFiltro  
          },
          dataType        : 'text',
          success         : function(result){
            $("#carrera").html(result);
          }     
        })
      });

      //Predeterminamos un control dentro del modal
      $("#modal-estudiante").on("shown.bs.modal", event => {
        $("#apellidos").focus();

        //EVENTOS
        obtenerSedes();
        obtenerEscuelas();
      });

      //Funciones de carga auomática
      mostrarEstudiantes();


      // ELIMINAR ESTUDIANTES
      $("#tabla-estudiantes tbody").on("click", ".eliminar", function(){
        const idestudianteEliminar = $(this).data("idestudiante");
        if (confirm("¿Está seguro de eliminar a este Estudiante?")){
          $.ajax({
            url: '../controllers/estudiante.controller.php',
            type: 'POST',
            data: {
              operacion   : 'eliminar',
              idestudiante   : idestudianteEliminar
            },
            success: function(result){
              if(result == ""){
              mostrarEstudiantes();
              }
            }
          });
        }
      });


    });
  </script>

</body>

</html>