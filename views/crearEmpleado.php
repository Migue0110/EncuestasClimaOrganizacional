<?php
include("./templates/header.php");
include(".././modulos/db_connection.php");
?>

<!-- HOME AQUI AGREGUEN SU CONTENIDO -->

<div class="container">
    <center><h3>Formulario de Nuevo Empleado</h3>
    </br>
    <form id="miFormulario" action=".././modulos/miguel/CrearEmpleados.php" method="post" onsubmit="return validarFormulario()">
        <div class="col-sm-5 mb-3">
            <label for="nombre">Nombre  (*)</label>
            <input class="form-control " type="text" id="nombre" name="nombre" required>
        </div>

        <div class="col-sm-5 mb-3"> 
            <label for="apellido">Apellido  (*)</label>
            <input class="form-control" type="text" id="apellido" name="apellido" required>
        </div>
        <div class="col-sm-5  mb-3">
            <label for="identificacion">Identificación  (*)</label>
            <input class="form-control" type="number" id="identificacion" name="identificacion" required>
        </div>
        <div class="col-sm-5 mb-3">
        <label for="area">Área (*)</label>
        <select class="form-select" aria-label="Default select example" name="area">
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
        <select class="form-select" aria-label="Default select example" name="cargo" required>
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
        <select class="form-select" aria-label="Default select example" name="rol" required>
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
            <input class="form-control" type="email" id="correo" name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        </div>
        <div class="col-sm-5  mb-3">
            <label for="telefono">Teléfono  (*)</label>
            <input class="form-control" type="tel" id="telefono" name="telefono" pattern="[0-9]{10}" required>
        </div>
        <button class="butonimportar btn btn-primary mb-2" type="submit">Registrar Empleado</button>
    </form></center>
</div>

<!-- HOME END AQUI AGREGUEN SU CONTENIDO -->

<!-- JavaScript Libraries -->

<?php
include("./templates/foother.php");
?>