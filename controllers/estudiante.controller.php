<?php

require_once '../models/Estudiante.php';

if(isset($_POST['operacion'])) {

  $estudiante = new Estudiante();


  if ($_POST['operacion'] == 'registrar'){

    //PASO 1: Recolectar todos los valores enviados por la vista y almacenarlos en un array asociativo
    // ARRAY ASOCIATIVO:    clave  :  valor
    $datosGuardar = [
      "apellidos"          =>$_POST['apellidos'],
      "nombres"            =>$_POST['nombres'],
      "tipodocumento"      =>$_POST['tipodocumento'],
      "nrodocumento"       =>$_POST['nrodocumento'],
      "fechanacimiento"    =>$_POST['fechanacimiento'],
      "idcarrera"          =>$_POST['idcarrera'],
      "idsede"             =>$_POST['idsede'],
      "fotografia"         => ''
    ];

    //Vamos a verficar si la vista nos envió una FOTOGRAFIA // NO GUARDAMOS LA IMAGEN SI NO LA RUTA
    if (isset($_FILES['fotografia'])){

      $rutaDestino = '../views/img/fotografias/';
      $fechaActual = date('c'); //C = complete, AÑO/MES/DIA/MINUTO/SEGUNDO
      $nombreArchivo = sha1($fechaActual) . ".jpg";
      $rutaDestino .= $nombreArchivo;

      //Guardamos la fotografia en el servidor
      if (move_uploaded_file($_FILES['fotografia']['tmp_name'], $rutaDestino)){
        $datosGuardar['fotografia'] = $nombreArchivo;
      }
    }


    //PASO 2: Enviar el array al método registrar 
    $estudiante->registrarEstudiante($datosGuardar);

  }

  if ($_POST['operacion'] == 'listar'){
    $data = $estudiante->listarEstudiantes();

    if ($data){
      $numeroFila = 1;
      $datosEstudiante = '';
      $botonNulo = " <a href='#' class='btn btn-sm btn-outline-warning' title='No tiene fotografía'><i class='bi bi-eye-slash-fill'></i></a>";
      

      foreach($data as $registro){
          $datosEstudiante = $registro['apellidos'] . ' ' . $registro['nombres'];

        //La primera parte a RENDERIZAR, es lo standard (siempre se muestra)
        echo "
          <tr>
            <td>{$numeroFila}</td>
            <td>{$registro['apellidos']}</td>
            <td>{$registro['nombres']}</td>
            <td>{$registro['tipodocumento']}</td>
            <td>{$registro['nrodocumento']}</td>
            <td>{$registro['fechanacimiento']}</td>
            <td>{$registro['carrera']}</td>
            <td>
                <a href='#' data-idestudiante='{$registro['idestudiante']}' class='btn btn-outline-danger btn-sm eliminar'><i class='bi bi-trash-fill'></i></a>

       ";

        //La segunda parte a RENDERIZAR, es el botón VER FOTOGRAFIA

        if ($registro['fotografia'] == ''){
          echo $botonNulo;
        }else{
          echo "<a href='../views/img/fotografias/{$registro['fotografia']}' data-lightbox={$registro['idestudiante']}' data-title='{$datosEstudiante}' class='btn btn-sm btn-outline-warning'><i class='bi bi-eye-fill'></i></a>";
        }

        //La tercera parte a RENDERIZAR, cierre de la fila
        echo"
          </td>
          </tr>
        ";                

        $numeroFila++;
      }
    }
  } //Fin operacion=listar
  
  if($_POST['operacion'] == 'eliminar'){
    $estudiante->eliminarEstudiante($_POST['idestudiante']);
  }

}