<?php
include("./templates/header.php");
?>


<!-- OCULTAR MENU-->


<!-- HOME AQUI AGREGUEN SU CONTENIDO -->


<h1 class="titulopreguntas" >Crear Pregunta</h1>
<h3 class="subtitulopreguntas">Aqui podra crear preguntas que luego estaran disponibles en el banco de preguntas.</h3>



<!-- HOME END AQUI AGREGUEN SU CONTENIDO -->
<div class="creapregunta">
    <form class="formario" action=".././modulos/mario/crear_pregunta.php" method="post">
        <label class="newpreg" for="nueva_pregunta">Nueva Pregunta:</label>
        <input type="text" id="nueva_pregunta" name="nueva_pregunta" required>
        <button class="butonimportar" type="submit" name="crear_pregunta">Crear Nueva Pregunta.</button>
    </form>
</div>

<!-- Footer Start -->


<?php
include("./templates/foother.php");
?>