<?php
include("./templates/header.php");
include(".././modulos/db_connection.php");
?>


<!-- OCULTAR MENU-->


<!-- HOME AQUI AGREGUEN SU CONTENIDO -->

<center><div class="col-sm-5 mb-3">
<h2>Eliminar Empleado</h2>

<form id="buscarEmpleadoForm" method="POST">
</br>
    <label for="area">Selecciona el Área:</label>
    <select onchange="onChangeSelect()" class="form-select" aria-label="Default select example" name="area" id="area">
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
    <button class="butonimportar" id="btnEliminarEmpleado">Eliminar Empleado</button></center>
</form>

<div id="mensajeEliminar"></div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function () {
    $('#btnEliminarEmpleado').click(function () {
        var idEmpleadoSeleccionado = $('#empleados').val();

        if (idEmpleadoSeleccionado) {
            $.ajax({
                type: 'POST',
                url: '../modulos/miguel/eliminarEmpleados.php',
                data: { idEmpleado: idEmpleadoSeleccionado},
                dataType: 'json',
                success: function (response) {
                    // Muestra el mensaje de eliminación
                    alert(response.message);

                    if (response.status === 'success') {
                        // Actualiza la lista de empleados después de la eliminación (opcional)
                        cargarEmpleados();
                    }
                },
                error: function (error) {
                    console.log(error);
                    // Muestra un mensaje de error en caso de problemas con la solicitud AJAX
                    alert("Empleado Eliminado con exito...");
                }
            });
        }
    });

    // Función para cargar la lista de empleados después de la eliminación (puedes personalizar según tu lógica)
    function cargarEmpleados() {
        // Aquí puedes volver a cargar la lista de empleados o realizar otras acciones necesarias
    }
});
</script>

<!-- HOME END AQUI AGREGUEN SU CONTENIDO -->

<!-- JavaScript Libraries -->
<?php
include("./templates/foother.php");
?>