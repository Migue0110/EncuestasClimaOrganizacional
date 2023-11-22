document.addEventListener('DOMContentLoaded', function() {    
    habilitarEmpleado();   
});
// importar empleado

function importarCSV() {
    var inputFile = document.getElementById("archivoCSV");
    var file = inputFile.files[0];

    if (file) {
        // Validar la extensión del archivo
        if (file.name.toLowerCase().endsWith('.csv')) {
            var formData = new FormData();
            formData.append("archivoCSV", file);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../modulos/miguel/importarEmpleados.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Manejar la respuesta del servidor
                        var response = JSON.parse(xhr.responseText);

                        // Acumular detalles de errores en una variable
                        var detallesErrores = "";
                        for (var i = 0; i < response.length; i++) {
                            if (response[i].status === "error") {
                                detallesErrores += response[i].message + "\n";
                            }
                        }

                        // Mostrar alerta de errores con detalles si los hay
                        if (detallesErrores !== "") {
                            alert("Se encontraron los siguientes errores:\n\n" + detallesErrores);
                        }
                        if (response.length > 0 && response[response.length - 1].status === "success") {
                            alert(response[response.length - 1].message);
                        }
                        
                    } else {
                        // Mostrar alerta de error si hubo un problema con la solicitud al servidor
                        alert("Error en la solicitud al servidor. Código de estado: " + xhr.status);
                    }
                }
            };
            xhr.send(formData);
        } else {
            alert("Selecciona un archivo CSV válido.");
        }
    } else {
        alert("Selecciona un archivo CSV antes de importar.");
    }
}

// end importar empleado

// Crear Empleados.

function validarFormulario() {

    var nombre = document.getElementById("nombre").value;
    var apellido = document.getElementById("apellido").value;
    var identificacion = document.getElementById("identificacion").value;
    var area = document.getElementById("area").value;
    var cargo = document.getElementById("cargo").value;
    var correo = document.getElementById("correo").value;
    var telefono = document.getElementById("telefono").value;

    // Validación de campos vacíos
    if (nombre === "" || apellido === "" || identificacion === "" || area === "" || cargo === "" || correo === "" || telefono === "") {
        alert("Todos los campos son obligatorios");
        return false;
    }

    // Validación de formato de correo electrónico
    var correoRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    if (!correoRegex.test(correo)) {
        alert("Formato de correo electrónico inválido");
        return false;
    }

    // Validación de longitud de teléfono
    if (telefono.length !== 10 || isNaN(telefono)) {
        alert("El teléfono debe tener 10 dígitos numéricos");
        return false;
    }
    return false;
}

// end CrearEmpleado.

// validar area y cargo (FK)

   var formulario = document.getElementById('miFormulario');
   var selectArea = formulario.elements['area'];
   var selectCargo = formulario.elements['cargo'];
   var selectRol = formulario.elements['rol'];

   // Guardar la lista original de opciones de cargo
   var opcionesCargoOriginal = selectCargo.innerHTML;
   var opcionesRolOriginal = selectRol.innerHTML;

   var areasCargos = {
       'Recursos Humanos': ['Gerente'],
       'Tecnología': ['Desarrollador'],
       'Finanzas': ['Analista Financiero'],
       'Ventas': ['Asesor comercial'],
   };
   var areasRoles = {
    'Recursos Humanos': ['Administrador'],
    'Tecnología': ['Empleado'],
    'Finanzas': ['Empleado'],
    'Ventas': ['Empleado'],
   }

   // Agregar un evento de cambio al elemento select de área

   selectArea.addEventListener('change', function () {

       // Obtener el valor seleccionado en el área
       var areaSeleccionada = selectArea.value;

       // Obtener la lista de cargos correspondiente al área seleccionada
       var cargosCorrespondientes = areasCargos[areaSeleccionada] || [];
       var opcionesCargosActualizadas = cargosCorrespondientes.map(function (cargo) {
           return '<option value="' + cargo + '">' + cargo + '</option>';
       }).join('');
       selectCargo.innerHTML = '<option disabled selected hidden required>Selecciona un cargo ...</option>' + opcionesCargosActualizadas;
       var rolesCorrespondientes = areasRoles[areaSeleccionada] || [];
       var opcionesRolesActualizadas = rolesCorrespondientes.map(function (rol) {
        return '<option value="' + rol + '">' + rol + '</option>';
       }).join('');
       selectRol.innerHTML = '<option disabled selected hidden required>Selecciona un rol ...</option>' + opcionesRolesActualizadas;       
   });
   
// end validar area y cargo y rol (FK)

// mostrar empleados del area para poder modificar ...
function buscarEmpleados() {
    var areaSeleccionada = document.getElementById("area").value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("empleadosContainer").innerHTML = xhr.responseText;
        }
    };

    xhr.open("GET", "../modulos/miguel/modificarEmpleados.php" + encodeURIComponent(areaSeleccionada), true);
    xhr.send();
}
function cargarEmpleados() {
            var areaSeleccionada = document.getElementById("area").value;
            var empleadosSelect = document.getElementById("empleados");
            
            // Habilitar el segundo select
            empleadosSelect.disabled = false;

            // Limpiar las opciones anteriores
            empleadosSelect.innerHTML = '<option disabled selected hidden required>Selecciona un empleado ...</option>';

            // Realizar una solicitud AJAX para obtener los empleados en el área seleccionada
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Agregar las opciones al segundo select
                    empleadosSelect.innerHTML += xhr.responseText;
                }
            };

            xhr.open("GET", "../modulos/miguel/modificarEmpleados.php?area=" + encodeURIComponent(areaSeleccionada), true);
            xhr.send();
        }

        function mostrarFormularioModificar(idEmpleado) {

            document.getElementById("formularioModificar").style.display = "block";
        }

        function guardarModificacion() {

            document.getElementById("formularioModificar").style.display = "none";
        }
        function habilitarEmpleado() {
            var empleado = document.getElementById("empleados");
            var formulario = document.getElementById("formularioModificar");
            if(empleado.value != "")
            {
                formulario.classList.remove("oculto");
                formulario.classList.add("visible");
            }
            else if(empleado.value == ""){
                formulario.classList.remove("visible");
                formulario.classList.add("oculto");
            }
        }

        function onChangeSelect() {
            cargarEmpleados();
            var formulario = document.getElementById("formularioModificar");
            formulario.classList.remove("visible");
            formulario.classList.add("oculto");
            
        }

// END mostrar empleados del area para poder modificar ..