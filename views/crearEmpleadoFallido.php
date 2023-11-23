<?php
include("./templates/header.php");
include(".././modulos/db_connection.php");
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<style>
    .card{
        background-color: #009dff;
        color: #fff;
    }
</style>
<!-- HOME AQUI AGREGUEN SU CONTENIDO -->

    <div class="d-flex justify-content-center align-items-center" style="height:60vh;">
       <div class="card text-bg-danger mb-3" style="max-width: 18rem;">
        <div class="card-header fs-4"><b>Registro Fallido</b></div>
        <div class="card-body justify-content-center">
            <h5 class="card-title mb-3">El empleado ya existe ...</h5>
            <center><a href="crearEmpleado.php" type="button" class="btn btn-danger"><i class="bi bi-arrow-left"></i> Regresar</a></center>
        </div>
        </div>
    </div>

<!-- HOME END AQUI AGREGUEN SU CONTENIDO -->

<!-- JavaScript Libraries -->

<?php
include("./templates/foother.php");
?>