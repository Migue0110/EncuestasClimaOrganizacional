// Obtener las preguntas desde la base de datos (usando AJAX)
window.onload = function() {
    const preguntasList = document.getElementById('preguntasList');
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../modulos/mario/obtener_preguntas.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const preguntas = JSON.parse(xhr.responseText);
                preguntas.forEach((pregunta) => {
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.name = 'pregunta';
                    checkbox.value = pregunta.idPregunta;
                    const label = document.createElement('label');
                    label.textContent = pregunta.pregunta;
                    preguntasList.appendChild(checkbox);
                    preguntasList.appendChild(label);
                    preguntasList.appendChild(document.createElement('br'));
                });
            } else {
                console.error('Error al obtener las preguntas');
            }
        }
    };
    xhr.send();
  };
  
  // Agregar evento al botón de Agregar Pregunta
  document.getElementById('agregarBtn').addEventListener('click', function() {
    const checkboxes = document.querySelectorAll('input[name=pregunta]:checked');
    const preguntasSeleccionadas = Array.from(checkboxes).map(checkbox => checkbox.value);
    // Aquí podrías enviar las preguntas seleccionadas al servidor para guardarlas
    // mediante una petición AJAX o form submit
    // Luego, mostrar el mensaje de éxito
    alert('Preguntas agregadas con éxito: ' + preguntasSeleccionadas.join(', '));
  });
  
  // Agregar evento al botón de Eliminar Pregunta
  document.getElementById('eliminarBtn').addEventListener('click', function() {
    const checkboxes = document.querySelectorAll('input[name=pregunta]:checked');
    const preguntasAEliminar = Array.from(checkboxes).map(checkbox => checkbox.value);
    // Aquí podrías enviar las preguntas seleccionadas al servidor para eliminarlas de la base de datos
    // mediante una petición AJAX o form submit
    // Luego, actualizar la lista de preguntas en el front-end
  });
  
  
  
  
  // Agregar evento al botón de Eliminar Pregunta
  document.getElementById('eliminarBtn').addEventListener('click', function() {
    const checkboxes = document.querySelectorAll('input[name=pregunta]:checked');
    const preguntasAEliminar = Array.from(checkboxes).map(checkbox => checkbox.value);
  
    // Enviar las preguntas seleccionadas al servidor para eliminarlas
    const xhrEliminar = new XMLHttpRequest();
    xhrEliminar.open('POST', '../modulos/mario/eliminar_preguntas.php', true);
    xhrEliminar.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhrEliminar.onreadystatechange = function() {
        if (xhrEliminar.readyState === XMLHttpRequest.DONE) {
            if (xhrEliminar.status === 200) {
                alert('Preguntas eliminadas con éxito');
                // Aquí podrías actualizar la lista de preguntas en el front-end si lo necesitas
            } else {
                console.error('Error al eliminar las preguntas');
            }
        }
    };
    xhrEliminar.send('preguntas=' + JSON.stringify(preguntasAEliminar));
  });
  
  // agregar preguntas a la bd
  // ... (código previo)
  
  // Agregar evento al botón de Agregar Pregunta
  document.getElementById('agregarBtn').addEventListener('click', function() {
    const checkboxes = document.querySelectorAll('input[name=pregunta]:checked');
    const preguntasAAgregar = Array.from(checkboxes).map(checkbox => checkbox.value);
  
    // Enviar las preguntas seleccionadas al servidor para guardarlas
    const xhrAgregar = new XMLHttpRequest();
    xhrAgregar.open('POST', '../modulos/mario/guardar_preguntas.php', true);
    xhrAgregar.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhrAgregar.onreadystatechange = function() {
        if (xhrAgregar.readyState === XMLHttpRequest.DONE) {
            if (xhrAgregar.status === 200) {
                alert('Preguntas agregadas con éxito');
                // Puedes realizar alguna acción adicional si es necesario
            } else {
                console.error('Error al agregar las preguntas');
            }
        }
    };
    xhrAgregar.send('preguntas=' + JSON.stringify(preguntasAAgregar));
  });

// LOGICA CREAR PREGUNTA

        function validarFormulario() {
            var nuevaPregunta = document.getElementById("nueva_pregunta").value.trim();
            if (nuevaPregunta === "") {
                alert("Por favor, ingresa una pregunta.");
                return false; // Evita que el formulario se envíe si el campo está vacío
            }
            return true; // Envía el formulario si la validación es exitosa
        }
   
// END LOGICA CREAR PREGUNTA
