<?php
include("./templates/header.php");
?>


<!-- OCULTAR MENU-->


<!-- HOME AQUI AGREGUEN SU CONTENIDO -->


<h1>Crear Pregunta</h1>



<!-- HOME END AQUI AGREGUEN SU CONTENIDO -->

    <form action=".././modulos/mario/crear_pregunta.php" method="post">
        <label for="nueva_pregunta">Nueva Pregunta:</label>
        <input type="text" id="nueva_pregunta" name="nueva_pregunta" required>
        <button type="submit" name="crear_pregunta">Crear Nueva Pregunta.</button>
    </form>


<!-- Footer Start -->


<?php
include("./templates/foother.php");
?>