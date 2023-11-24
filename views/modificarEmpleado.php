<?php
include("./templates/header.php");
include(".././modulos/db_connection.php");
?>

<!-- HOME AQUI AGREGUEN SU CONTENIDO -->

<div class="container">
    </br>
        <center><div class="col-sm-5 mb-3">
        <h2>Modificar Empleado</h2>
        <form>
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
        </form>
            </div>
        <div id="empleadosContainer"></div>

            <div id="formularioModificar"  class="oculto" onchange="mostrarFormularioModificar()">
                <h3>Datos Empleado:</h3>
                <form id="miFormulario" action=".././modulos/miguel/modificarEmpleados.php" method="POST" onsubmit="return validarFormulario()">
                <div class="col-sm-5 mb-3">
                    <label for="nombre">Nombre  (*)</label>
                    <input class="form-control" type="text" id="nombre" name="nombreEmpleado" required>
                </div>

                <div class="col-sm-5 mb-3">
                    <label for="apellido">Apellido  (*)</label>
                    <input class="form-control" type="text" id="apellido" name="apellidoEmpleado" required>
                </div>

                <div class="col-sm-5  mb-3">
                    <label for="identificacion">Identificación  (*)</label>
                    <input class="form-control" type="number" id="identificacion" name="identificacionEmpleado" required>
                </div>

                <div class="col-sm-5 mb-3">
                <label for="area">Área (*)</label>
                <select class="form-select" aria-label="Default select example" name="areaEmpleado">
                    <option disabled selected hidden required>Selecciona un área ...</option>
                    <?php
                    $sql = "SELECT nombre_area FROM area";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["nombre_area"] . "'>" . $row["nombre_area"] . "</option>";
                    }
                    ?>
                </select>
                </div>

                <div class="col-sm-5 mb-3">
                <label for="cargo">Cargo (*)</label>
                <select class="form-select" aria-label="Default select example" name="cargoEmpleado" required>
                    <option disabled selected hidden required>Selecciona un cargo ...</option>
                    <?php
                    $sql = "SELECT nombre_cargo FROM cargo";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["nombre_cargo"] . "'>" . $row["nombre_cargo"] . "</option>";
                    }
                    ?>
                </select>
                </div>

                <div class="col-sm-5 mb-3">
                <label for="rol">Rol (*)</label>
                <select class="form-select" aria-label="Default select example" name="rolEmpleado" required>
                    <option disabled selected hidden required>Selecciona un rol ...</option>
                    <?php
                    $sql = "SELECT nombre_rol FROM rol";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["nombre_rol"] . "'>" . $row["nombre_rol"] . "</option>";
                    }
                    ?>
                </select>
                </div>

                <div class="col-sm-5  mb-3">
                    <label for="correo">Correo Electrónico  (*)</label>
                    <input class="form-control" type="email" id="correo" name="correoEmpleado" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                </div>
                <div class="col-sm-5  mb-3">
                    <label for="telefono">Teléfono  (*)</label>
                    <input class="form-control" type="tel" id="telefono" name="telefonoEmpleado" pattern="[0-9]{10}" required>
                </div>
                <div class="col-sm-5  mb-3">
                    <label for="ID">ID Empleado (*)</label>
                    <input class="form-control" type="number" id="ID" name="ID" required>
                </div>
                <input type="hidden" name="formType" value="miFormulario">
                    <button class="butonimportar" type="submit">Guardar Modificación</button>
                </form>
            </div>
        </div></center>

<!-- HOME END AQUI AGREGUEN SU CONTENIDO -->

<!-- JavaScript Libraries -->
<?php
include("./templates/foother.php");
?>