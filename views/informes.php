<?php
include("./templates/header.php");
?>

<div class="container mb-4">
    <h1 class="my-4">Dashboard de Clima Laboral</h1>

    <!-- Gráfico de Satisfacción del Empleado -->
    <div class="card card mt-4">
        <div class="card-header">Satisfacción del Empleado</div>
        <div class="card-body">
            <canvas id="satisfaccionChart"></canvas>
        </div>
    </div>

    <!-- Gráfico de Compromiso -->
    <div class="card mt-4">
        <div class="card-header">Compromiso</div>
        <div class="card-body">
            <canvas id="compromisoChart"></canvas>
        </div>
    </div>


    <div class="card mt-4">
        <div class="card-header">Compromiso</div>
        <div class="card-body">
            <canvas id="datosChart"></canvas>
        </div>
    </div>
</div>

<?php
include("./templates/foother.php");
?>