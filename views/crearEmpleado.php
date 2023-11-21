<?php
include("./templates/header.php");
?>
<!-- OCULTAR MENU-->


<!-- HOME AQUI AGREGUEN SU CONTENIDO -->

<div class="container">
    <h1>Formulario de Nuevo Empleado</h1>
    <form action="modulos/Empleados/CrearEmpleados.php" method="post" onsubmit="return validarFormulario()">
        <div class="col-sm-5 mb-3">
            <label for="nombre">Nombre *</label>
            <input class="form-control " type="text" id="nombre" name="nombre" required>
        </div>

        <div class="col-sm-5 mb-3"> 
            <label for="apellido">Apellido *</label>
            <input class="form-control" type="text" id="apellido" name="apellido" required>
        </div>
        <div class="col-sm-5  mb-3">
            <label for="identificacion">Identificación *</label>
            <input class="form-control" type="number" id="identificacion" name="identificacion" required>
        </div>
        <div class="col-sm-5  mb-3">
            <label for="area">Área *</label>
            <input class="form-control" type="text" id="area" name="area" required>
        </div>
        <div class="col-sm-5 mb-3">
            <label for="cargo">Cargo *</label>
            <input class="form-control" type="text" id="cargo" name="cargo" required>
        </div>
        <div class="col-sm-5  mb-3">
            <label for="correo">Correo Electrónico *</label>
            <input class="form-control" type="email" id="correo" name="correo" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        </div>
        <div class="col-sm-5  mb-3">
            <label for="telefono">Teléfono *</label>
            <input class="form-control" type="tel" id="telefono" name="telefono" pattern="[0-9]{10}" required>
        </div>
        <button class="butonimportar btn btn-primary mb-2" type="submit" value="Guardar">Registrar Empleado
    </form>
</div>


<!-- HOME END AQUI AGREGUEN SU CONTENIDO -->



<!-- Footer Start -->


<!-- JavaScript Libraries -->
<?php
include("./templates/foother.php");
?>