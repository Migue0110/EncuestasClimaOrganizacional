<?php
include("./templates/header.php");
include(".././modulos/db_connection.php");
?>

<!-- OCULTAR MENU-->

<!-- HOME AQUI AGREGUEN SU CONTENIDO -->

<center><div class="col-sm-5 mb-3">
<h2>Eliminar Empleado</h2>

<form id="miFormulario" action=".././modulos/miguel/eliminarEmpleados.php" method="POST">
</br>
    <label for="area">Selecciona el Área:</label>
    <select onchange="cargarEmpleados()" class="form-select" aria-label="Default select example" name="area" id="area">
        <option disabled selected hidden required>Selecciona un área ...</option>
        <?php
        $sql = "SELECT nombre_area FROM area";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["nombre_area"] . "'>" . $row["nombre_area"] . "</option>";
        }
        ?>
    </select>
    </br>
    <label for="empleados">Selecciona un Empleado:</label>
    <select onchange="habilitarEmpleado()" class="form-select" aria-label="Default select example" name="empleados" id="empleados" disabled>
        <option value="" disabled selected hidden required>Selecciona un empleado ...</option>
    </select>
    <br>
    <button class="butonimportar" type="submit">Eliminar Empleado</button></center>
</form>

<!-- HOME END AQUI AGREGUEN SU CONTENIDO -->

<!-- JavaScript Libraries -->
<?php
include("./templates/foother.php");
?>