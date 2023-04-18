<?php

require_once '../models/Colaborador.php';

if(isset($_POST['operacion'])) {

  $colaborador = new Colaborador();


  if ($_POST['operacion'] == 'registrar'){

    //PASO 1: Recolectar todos los valores enviados por la vista y almacenarlos en un array asociativo
    // ARRAY ASOCIATIVO:    clave  :  valor
    $datosGuardar = [
      "apellidos"          =>$_POST['apellidos'],
      "nombres"            =>$_POST['nombres'],
      "nrodocumento"       =>$_POST['nrodocumento'],
      "telefono"           =>$_POST['telefono'],
      "direccion"          =>$_POST['direccion'],
      "tipocontrato"       =>$_POST['tipocontrato'],
      "idcargo"            =>$_POST['idcargo'],
      "idsede"             =>$_POST['idsede'],
      "curriculumvitae"    => ''
    ];

    //Vamos a verficar si la vista nos envió una FOTOGRAFIA // NO GUARDAMOS LA IMAGEN SI NO LA RUTA
    if (isset($_FILES['curriculumvitae'])){

      $rutaDestino = '../views/document/pdf';
      $fechaActual = date('c'); //C = complete, AÑO/MES/DIA/MINUTO/SEGUNDO
      $nombreArchivo = sha1($fechaActual) . ".pdf";
      $rutaDestino .= $nombreArchivo;

      //Guardamos el CV en el servidor
      if (move_uploaded_file($_FILES['curriculumvitae']['tmp_name'], $rutaDestino)){
        $datosGuardar['curriculumvitae'] = $nombreArchivo;
      }
    }


    //PASO 2: Enviar el array al método registrar 
    $colaborador->registrarColaborador($datosGuardar);

  }




  if ($_POST['operacion'] == 'listar'){
    $data = $colaborador->listarColaboradores();

    if ($data){
      $numeroFila = 1;
      $datosColaborador = '';
      $botonNulo = " <a href='#' class='btn btn-sm btn-warning' title='No adjunto'><i class='bi bi-eye-slash-fill'></i></a>";


      foreach($data as $registro){
          $datosColaborador = $registro['apellidos'] . ' ' . $registro['nombres'];


      //La primera parte a RENDERIZAR, es lo standard (siempre se muestra)
      echo "
      <tr>
        <td>{$numeroFila}</td>
        <td>{$registro['apellidos']}</td>
        <td>{$registro['nombres']}</td>
        <td>{$registro['nrodocumento']}</td>
        <td>{$registro['telefono']}</td>
        <td>{$registro['direccion']}</td>
        <td>{$registro['tipocontrato']}</td>
        <td>{$registro['cargo']}</td>
        <td>{$registro['sede']}</td>
        <td>
            <a href='#' class='btn btn-sm btn-danger'><i class='bi bi-trash-fill'></i></a>
            <a href='#' class='btn btn-sm btn-info'><i class='bi bi-pencil-fill'></i></a>";

        //La segunda parte a RENDERIZAR, es el botón VER PDF

        if ($registro['curriculumvitae'] == ''){
          echo $botonNulo;
        }else{
          echo "<a href='../views/document/pdf/{$registro['curriculumvitae']}' target='_blank' class='btn btn-sm btn-warning'><i class='bi bi-eye-fill'></i></a>";
        }

        //La tercera parte a RENDERIZAR, cierre de la fila
        echo"
          </td>
          </tr>
        "; 

        $numeroFila++;
          

      }
    }
  } // Fin de operación listar

}