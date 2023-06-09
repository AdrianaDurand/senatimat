<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['login']){
  header('Location: views/index.php');
}
?>

<!doctype html>
<html lang="es">

<head>
  <title>Bienvenido</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- Íconos de Bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

   <!--Sweet alert2-->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
        background-image: url('views/img/login/documentos.jpeg');
        background-size: contain;
        background-position: center bottom;
        background-repeat: no-repeat;
        position: relative;
        min-height: 100vh;
    }

    .background-image {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: auto;
        z-index: -1;
    }
</style>

</head>

<body>
  <div class="container">
    <div class="row mt-3">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <!-- INICIO DE CARD -->
        <div class="card" id="login">
          <div class="card-header bg-primary text-light">
           <strong>Inicio de sesión</strong>
          </div>
          
          <div class="card-body">
            <form action="" autocomplete="off">
              <div class="mb-3">
                <label for="usuario" class="form-label">Usuario:</label>
                <input type="text" id="usuario" class="form-control form-control-sm" autofocus>
              </div>
              <div class="mb-3">
                <label for="clave" class="form-label">Contraseña:</label>
                <input type="password" id="clave" class="form-control form-control-sm">
              </div>
            </form>
          </div>
          <div class="card-footer text-end">
            <button type="button" id="iniciar-sesion" class="btn btn-sm btn-success">Iniciar Sesión</button>
          </div>
        </div>
        <!-- FIN DE CARD-->
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>

  <!-- jQuery-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <script>
    $(document).ready(function (){

      function iniciarSesion(){
        const usuario = $("#usuario").val();
        const clave   = $("#clave").val();

        if(usuario != "" && clave != ""){
          
          $.ajax({
            url: 'controllers/usuario.controller.php',
            type: 'POST',
            data: {
              operacion : 'login',
              nombreusuario : usuario,
              claveIngresada : clave

            },
            dataType: 'JSON',
            success: function (result){
              console.log(result);
              if (result["status"]){
                window.location.href = "views/index.php";
              }else{
                Swal.fire({
                  icon: 'error',
                  title: 'ERROR',
                 text: result["mensaje"],
                 footer: 'Por favor revise nuevamente sus credenciales',    
              })
              }
            }
          });
        }
      }
      $("#iniciar-sesion").click(iniciarSesion);



      

    });
  </script>

</body>

</html>