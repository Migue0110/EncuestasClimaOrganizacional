<?php
include("./templates/header.php");
?>

<div class="container mb-4">
    <h1 class="my-4">Dashboard de Clima Laboral</h1>

    <!-- Gráfico de Satisfacción del Empleado -->
    <div class="row m-4 ">

        <div class="card mt-4 col m-1">
            <div class="card-header">Empleados por area</div>
            <div class="card-body">
                <canvas id="areaChart"></canvas>
            </div>
        </div>
        <!-- Gráfico de Compromiso -->
        <div class="card mt-4 col m-1">
            <div class="card-header">Compromiso</div>
            <div class="card-body">
                <canvas id="ambienteChart"></canvas>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="container mb-4">
            <h1 class="my-4">Temas</h1>
            <!-- Gráfico de Satisfacción del Empleado -->
            <div class="card mt-4 col m-1">
                <div class="card-header">
                    Filtrar
                </div>
                <div class="table-responsive m-5" style="margin-bottom: 20px;">
                    <table id="informe_Preguntas" class="table table-sm table-striped table-bordered table-condensed" style="margin-bottom: 20px;">
                        <thead>
                            <tr>
                                <th>Pregunta</th>
                                <th>Respuesta</th>
                                <th>Empleados</th>
                                <th>Porcentaje de respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- <script type="module" src="dimensions.js"></script> -->
<?php
include("./templates/foother.php");
?>