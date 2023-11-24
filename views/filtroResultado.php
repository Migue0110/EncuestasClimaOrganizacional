<?php
include("./templates/header.php");
?>

<div class="container mb-4">
    <h1 class="my-4">Filtros de clima laboral</h1>
    <!-- Gráfico de Satisfacción del Empleado -->
    <div class="card mt-4 col m-1">
        <div class="card-header">
            Filtrar
        </div>
        <div class="table-responsive m-5" style="margin-bottom: 20px;">
            <table id="filtar" class="table table-sm table-striped table-bordered table-condensed" style="margin-bottom: 20px;">
                <thead>
                    <tr>
                        <th>Encuesta</th>
                        <th>Tema</th>
                        <th>Empleados</th>
                        <th>Promedio</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- <script type="module" src="dimensions.js"></script> -->
<?php
include("./templates/foother.php");
?>