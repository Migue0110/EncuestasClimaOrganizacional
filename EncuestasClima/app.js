//  importar empleado

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

                    if (response.status === "success") {
                        // Mostrar alerta con información sobre la importación
                        alert(response.message);
                    } else {
                        // Mostrar alerta de error
                        alert("Error: " + response.message);
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

// end  importar empleado