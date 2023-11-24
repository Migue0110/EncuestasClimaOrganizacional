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
                <canvas id="compromisoChart"></canvas>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card mt-4 col m-2">
            <div class="card-header">Compromiso</div>
            <div class="card-body">
                <canvas id="datosChart"></canvas>
            </div>
        </div>
        <div class="card mt-4 col m-2">
        <div class="card-header">Temas</div>
            <div>
                <canvas id="polarChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- <script type="module" src="dimensions.js"></script> -->
<?php
include("./templates/foother.php");
?>