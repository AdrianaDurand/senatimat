<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  
  <!-- Modal trigger button -->
  <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalId">
    Registro
  </button>
  
  <!-- Modal Body -->
  <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
  <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header text-bg-secondary">
          <h5 class="modal-title" id="modalTitleId">Complete el Registro</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        <form action="" autocomplete="off">
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
              </select>
              </div>
              <div class="mb-3 col-md-6">
                <label for="nrodocumento" class="form-label">N° Documento:</label>
                <input type="text" id="nrodocumento" class="form-control form-control-sm" autofocus>
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
              <input type="file" class="form-control form-control-sm" id="fotografia">
            </div>

        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  
  
  <!-- Optional: Place to the bottom of scripts -->
  <script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
  
  </script>

  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>