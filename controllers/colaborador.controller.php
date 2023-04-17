<?php

require_once '../models/Colaborador.php';

if(isset($_POST['operacion'])) {

  $colaborador = new Colaborador();

  if ($_POST['operacion'] == 'listar'){
    $data = $colaborador->listarColaboradores();

    if ($data){
      $numeroFila = 1;
      $datosColaborador = '';
      

      foreach($data as $registro){
          $datosColaborador = $registro['apellidos'] . ' ' . $registro['nombres'];


      //La primera parte a RENDERIZAR, es lo standard (siempre se muestra)
      echo "
      <tr>
        <td>{$numeroFila}</td>
        <td>{$registro['apellidos']}</td>
        <td>{$registro['nombres']}</td>
        <td>{$registro['cargo']}</td>
        <td>{$registro['sede']}</td>
        <td>{$registro['telefono']}</td>
        <td>{$registro['tipocontrato']}</td>
        <td>{$registro['direccion']}</td>
        <td>{$registro['curriculumvitae']}</td>
        <td>
            <a href='#' class='btn btn-sm btn-danger'><i class='bi bi-trash-fill'></i></a>

            <a href='#' class='btn btn-sm btn-info'><i class='bi bi-pencil-fill'></i></a>";


          $numeroFila++;

      }
    }
  } // Fin de operación listar









}