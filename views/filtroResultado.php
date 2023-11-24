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
            <table id="informe_tema" class="table table-sm table-striped table-bordered table-condensed" style="margin-bottom: 20px;">
                <thead>
                    <tr>
                        <th>Tema</th>
                        <th>Encuesta</th>
                        <th>Nombre Empleado</th>
                        <th>Area del Empleado</th>
                        <th>Cargo</th>
                        <th>pregunta</th>
                        <th>respuesta</th>
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