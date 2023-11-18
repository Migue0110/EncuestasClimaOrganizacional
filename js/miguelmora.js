// importar empleado
function importarCSV() {
    var inputFile = document.getElementById("archivoCSV");
    var file = inputFile.files[0];

    if (file) {
        var formData = new FormData();
        formData.append("archivoCSV", file);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "modulos/Empleados/importarEmpleados.php", true);
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
        alert("Selecciona un archivo CSV antes de importar.");
    }
}
// end importar empleado

// Crear Empleados
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

    return true;
}