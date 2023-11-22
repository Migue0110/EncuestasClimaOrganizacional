
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        
                      <!-- imgs -->
                      <div class="imghome">
                        <img class="iconhome" src="img/icoep.png" alt="">
                        <img class="iconhome" src="img/icouan.png" alt="">
                    </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/mario.js"></script>
    <script src="js/miguelangel.js"></script>
    <script src="js/miguelmora.js"></script>
    <script src="js/nickson.js"></script>

    <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Función para actualizar el estado del botón Finalizar
                function actualizarEstadoBotonFinalizar() {
                    var todasLasFilasCompletadas = true;
                    var filas = document.querySelectorAll('.table tbody tr');
                    var respuestas = [];

                    filas.forEach(function (fila, index) {
                        var checkboxes = fila.querySelectorAll('input[type="checkbox"]');
                        var seleccionados = Array.from(checkboxes).filter(function (checkbox) {
                            return checkbox.checked;
                        });

                        // Si no hay exactamente un checkbox seleccionado por fila, desactivar Finalizar
                        if (seleccionados.length !== 1) {
                            todasLasFilasCompletadas = false;
                        } else {
                            // Si hay un checkbox seleccionado, agregar a la matriz respuestas
                            respuestas[index] = {
                                pregunta: fila.cells[0].textContent.trim(),
                                respuesta: seleccionados[0].value
                            };
                        }
                    });

                    var btnFinalizar = document.getElementById('btnFinalizar');
                    if (todasLasFilasCompletadas) {
                        btnFinalizar.disabled = false;
                        // Aquí puedes hacer algo con la matriz respuestas, como enviarla por AJAX o almacenarla en un campo oculto
                    } else {
                        btnFinalizar.disabled = true;
                    }
                }

                // Agregar el evento 'click' a todos los checkboxes para que llamen a la función de actualización
                document.querySelectorAll('.table input[type="checkbox"]').forEach(function (checkbox) {
                    checkbox.addEventListener('click', actualizarEstadoBotonFinalizar);
                });

                // Inicializar el estado de la encuesta como 'pendiente' o 'en proceso' según corresponda
                var estadoEncuesta = 'pendiente'; // Este valor debería ser asignado dinámicamente con PHP según el estado actual de la encuesta en la base de datos

                var btnFinalizar = document.getElementById('btnFinalizar');
                btnFinalizar.addEventListener('click', function() {
                    if (estadoEncuesta === 'pendiente') {
                        estadoEncuesta = 'en proceso';
                    } else if (estadoEncuesta === 'en proceso') {
                        estadoEncuesta = 'finalizada';
                        // Redireccionar al index.php con mensaje de éxito
                        window.location.href = 'index.php?mensaje=Encuesta respondida exitosamente';
                    }
                });

            });
            </script>

<script>
                document.addEventListener('DOMContentLoaded', function () {
                    // Seleccionar todas las filas de la tabla
                    var filas = document.querySelectorAll('.table tbody tr');
            
                    filas.forEach(function (fila) {
                        // Agregar un evento 'click' a cada checkbox en la fila
                        var checkboxes = fila.querySelectorAll('input[type="checkbox"]');
                        checkboxes.forEach(function (checkbox) {
                            checkbox.addEventListener('click', function () {
                                // Desmarcar todos los otros checkboxes en la misma fila
                                checkboxes.forEach(function (otroCheckbox) {
                                    if (otroCheckbox !== checkbox) otroCheckbox.checked = false;
                                });
                            });
                        });
                    });
                    function verificarYActualizarBotones() {
                        var todasLasFilasCompletadas = true;
                        var filas = document.querySelectorAll('.table tbody tr');

                        filas.forEach(function (fila) {
                            var checkboxes = fila.querySelectorAll('input[type="checkbox"]');
                            var seleccionados = Array.from(checkboxes).filter(function (checkbox) {
                                return checkbox.checked;
                            });

                            if (seleccionados.length !== 1) {
                                todasLasFilasCompletadas = false;
                            }
                        });

                        var btnGuardar = document.getElementById('btnGuardar');
                        var btnSiguiente = document.getElementById('btnSiguiente');

                        if (todasLasFilasCompletadas) {
                            btnSiguiente.textContent = 'Finalizar';
                            btnGuardar.disabled = true;
                        } else {
                            btnSiguiente.textContent = 'Siguiente';
                            btnGuardar.disabled = false;
                        }
                        }

                        // Agregar el evento 'click' a todos los checkboxes para que llamen a esta función
                        document.querySelectorAll('.table input[type="checkbox"]').forEach(function (checkbox) {
                        checkbox.addEventListener('click', verificarYActualizarBotones);
                        });

                });
                
            </script>
</body>

</html>