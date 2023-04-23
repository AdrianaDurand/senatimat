<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] == false){
  header('Location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de inicio</title>

     <!-- Boostrap 5.3 -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

       <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <!-- ICONS BOOTSTRAP-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">


</head>
<html>
<div class="container">
  <div class="row">
    <div class="mb-3 d-grid gap-2 text-center" style="background-color: #09032b; width: 100vw">
        <h1 class="my-3" style="text-decoration: underline; color: #ffffff">ACCESO A REGISTROS</h1>
    </div>
</div>

    <div class="row">
      <div class="mb-3 d-grid gap-2">
          <span>
            BIENVENIDO, con su acceso puede extraer los registros que necesite para cotejar y/o eliminar datos de los alumnos como tambien colaboradores.
        </span>
      </div>
      
    <div class="mb-3 d-grid gap-2" style="background-color: #e9e979a2">   <!---->
        <span>
        >RECUERDE, solo personal autorizado puede realizar la eliminación de registros!
        </span>
    </div>
    </div>
</div>


      <!-- Primer CARD-->
      <div class="container justify-content-center">
        <div class="row">
            <div class="col-md-4 col-sm-12 mx-auto">
                <div class="card" style="margin-bottom: 20px; border: 2px solid #007bff">
                    <a href="../views/estudiantes.php">
                        <img src="../views/img/inicio/estudiante.png" alt="Estudiantes" class="card-img-top mx-auto" style="max-width: 250px; max-height: 250px; display: block;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title" style="text-decoration: underline">Estudiantes</h5>
                        <p class="card-text">Dentro del siguiente registro encontrará la relación de los estudiantes matriculados, a su vez podrá añadir y eliminar la información de cada uno.</p>
                        <a href="../views/estudiantes.php" class="btn btn-primary btn-md text-center">Ir al registro</a>
                    </div>
                </div>
            </div>
    <!-- Segundo CARD-->
            <div class="col-md-4 col-sm-12 mx-auto">
                <div class="card" style="margin-bottom: 20px; border: 2px solid green">
                    <a href="../views/colaboradores.php">
                        <img src="../views/img/inicio/colaborador.png" alt="Colaboradores" class="card-img-top mx-auto" style="max-width: 250px; max-height: 250px; display: block;">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title" style="text-decoration: underline">Colaboradores</h5>
                        <p class="card-text">Dentro del siguiente registro encontrará la relación de los colaboradores activos en la institución, a su vez podrá añadir y eliminar la información de cada uno.</p>
                        <a href="../views/colaboradores.php" class="btn btn-success btn-md text-center">Ir al registro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
      

<footer>
    <div class="container">
        <div class="row">
            <div class="mb-3 d-grid gap-2 text-center" style="background-color: #09032b; width: 100vw; margin-top: 20px;">
                <table style="width:100%">
                    <tr>
                        <td style="text-align: left; color: #ffffffa9;">
                            <div style="background-color: #09032b; height: 20px; width: 100%;"></div>
                            <span style="display: inline-block; margin-top: 5px; font-weight: bold; font-size: 14px">©AdrianaDurand</span>
                        </td>
                        <td style="text-align: right; color: #ffffffa9;">
                        <div style="background-color: #09032b; height: 10px; width: 50%;"></div>
                        <button type="button" class="btn btn-sm btn-danger" id="cerrar-sesion" onclick="location.href='../controllers/usuario.controller.php?operacion=finalizar'"><i class="bi bi-box-arrow-left"></i> Cerrar sesión</button>
                        </td>
                        
                        
                    </tr>
                </table>
            </div>
        </div>
    </div>
</footer>


</html>