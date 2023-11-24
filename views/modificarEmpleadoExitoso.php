<?php
include("./templates/header.php");
include(".././modulos/db_connection.php");
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<style>
    .card{
        background-color: #198452;
        color: #fff;
    }
</style>
<!-- HOME AQUI AGREGUEN SU CONTENIDO -->

<div class="d-flex justify-content-center align-items-center" id="main-container" style="height: 60vh;">
  <div class="card text-bg-danger mb-3" id="card-container">
    
  <div class="card-header fs-4 tituloprincipal" id="header"><b>Empleado Modificado</b>
     <div class="circle"><i class="bi bi-check"></i></div>
  </div>
    <h5 class="card-title mb-3 textbody" id="title">El empleado se modificó con éxito</h5>
    <div class="card-body botonescentrales justify-content-center" id="body">
      <center><a href="modificarEmpleado.php" type="button" class="btn btn-danger" id="back-button"><i class="bi bi-arrow-left"></i> Regresar</a></center>
    </div>
  </div>
</div>

<!-- HOME END AQUI AGREGUEN SU CONTENIDO -->

<!-- JavaScript Libraries -->

<?php
include("./templates/foother.php");
?>