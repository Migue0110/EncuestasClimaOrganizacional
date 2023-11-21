<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/stylesmario.css" rel="stylesheet">
    <link href="css/stylesmiguelangel.css" rel="stylesheet">
    <link href="css/stylenickson.css" rel="stylesheet">
    <link href="css/stylesmiguelMora.css" rel="stylesheet">
</head>


<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <img class="imgheader" src="img/ep.png" alt="">
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/josue.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Josué González</h6>
                        <span>Empleado</span>
                    </div>
                </div>

                <!-- MENU -->
                
                <!-- MENU END -->
            </nav>
        </div>


        <!-- Content Start -->
        <div class="content">
            <!-- OCULTAR MENU -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
               
                <div class="navbar-nav align-items-center ms-auto">

                   
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/Josue.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">Josué González</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="login.html" class="dropdown-item">Cerrar Sesión</a>
                        </div>
                    </div>
                </div>

            </nav>
            <!-- OCULTAR MENU-->
            <div class="container-fluid pt-4 px-4">
               
                <!-- carrousel -->
                <body>

                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <!-- Agrega más indicadores si es necesario -->
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/dummi1.jpg" class="d-block w-100" alt="Imagen 1">
                            </div>
                            <div class="carousel-item">
                                <img src="img/dummi2.jpg" class="d-block w-100" alt="Imagen 2">
                            </div>
                            <div class="carousel-item">
                                <img src="img/dummi3.jpg" class="d-block w-100" alt="Imagen 3">
                            </div>
                            <!-- Agrega más imágenes aquí si es necesario -->
                        </div>
                        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Siguiente</span>
                        </a>
                    </div>
                    
                
                <!-- END carrousel -->
            </div>

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
            
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start d-flex align-items-center">
                            <h6 class="pie2 mb-0">Estudios Psicologicos S.A.S</h6>
                            <h6 class="pie mb-0 ms-2">Universidad Antonio Nariño</h6>
                        </div>
                        <!-- imgs -->
                        <div class="col-12 col-sm-6 d-flex align-items-center justify-content-center justify-content-sm-end">
                            <img class="iconhome" src="img/icoep.png" alt="" style="width: 40px; height: 40px;">
                            <img class="iconhome" src="img/icouan.png" alt="" style="width: 40px; height: 40px;">
                        </div>
                    </div>
                </div>
            </div>
            
            <form action="modulos/nickson/guardar_respuestas_bd.php" method="post" class="container-fluid pt-4 px-4">
                <!-- Suponiendo que tienes varios elementos de entrada para las preguntas, por ejemplo: -->
            <!-- Widgets End -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Encuesta Clima organizacional</h6>
                        <a href="">...</a>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    
                                    <th scope="col"></th>
                                    <th scope="col"><img class="iconhome" src="img/Muy_insatisfecho.png " alt="" style="width: 40px; height: 40px;">Muy insatisfecho</th>
                                    <th scope="col"><img class="iconhome" src="img/Insatisfecho.png" alt="" style="width: 40px; height: 40px;">Insatisfecho</th>
                                    <th scope="col"><img class="iconhome" src="img/Neutro.png" alt="" style="width: 40px; height: 40px;">Neutro</th>
                                    <th scope="col"><img class="iconhome" src="img/Satisfecho.png" alt="" style="width: 40px; height: 40px;">Satisfecho</th>
                                    <th scope="col"><img class="iconhome" src="img/Muy_satisfecho.png" alt="" style="width: 40px; height: 40px;">Muy satisfecho</th>
                                    <th scope="col"><img class="iconhome" src="img/not_apply.png" alt="" style="width: 40px; height: 40px;">No aplica</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>¿Cómo describirías el ambiente de trabajo actual?</td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_1" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_1" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_1" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_1" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_1" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_1" value="6"></td>
                                    
                                </tr>
                                <tr>
                                    <td>¿Qué aspectos crees que contribuyen más a un buen clima laboral en nuestro equipo?</td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_2" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_2" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_2" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_2" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_2" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_2" value="6"></td>
                                    
                                </tr>
                                <tr>
                                    <td>¿En qué áreas crees que podríamos mejorar para fortalecer el clima organizacional?</td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_3" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_3" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_3" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_3" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_3" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_3" value="6"></td>
                                    
                                </tr>
                                <tr>
                                    <td>¿Qué actividades o prácticas crees que podrían aumentar la satisfacción de los empleados en el trabajo?</td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_4" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_4" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_4" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_4" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_4" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_4" value="6"></td>
                                    
                                </tr>
                                <tr>
                                    <td>¿Cómo percibes la comunicación dentro del equipo?</td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_5" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_5" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_5" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_5" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_5" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_5" value="6"></td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    
                                    <th scope="col"></th>
                                    <th scope="col"><img class="iconhome" src="img/Muy_insatisfecho.png " alt="" style="width: 40px; height: 40px;">Muy insatisfecho</th>
                                    <th scope="col"><img class="iconhome" src="img/Insatisfecho.png" alt="" style="width: 40px; height: 40px;">Insatisfecho</th>
                                    <th scope="col"><img class="iconhome" src="img/Neutro.png" alt="" style="width: 40px; height: 40px;">Neutro</th>
                                    <th scope="col"><img class="iconhome" src="img/Satisfecho.png" alt="" style="width: 40px; height: 40px;">Satisfecho</th>
                                    <th scope="col"><img class="iconhome" src="img/Muy_satisfecho.png" alt="" style="width: 40px; height: 40px;">Muy satisfecho</th>
                                    <th scope="col"><img class="iconhome" src="img/not_apply.png" alt="" style="width: 40px; height: 40px;">No aplica</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>¿Cómo describirías el ambiente de trabajo actual?</td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_6" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_6" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_6" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_6" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_6" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_6" value="6"></td>
                                    
                                </tr>
                                <tr>
                                    <td>¿Qué aspectos crees que contribuyen más a un buen clima laboral en nuestro equipo?</td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_7" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_7" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_7" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_7" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_7" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_7" value="6"></td>
                                    
                                </tr>
                                <tr>
                                    <td>¿En qué áreas crees que podríamos mejorar para fortalecer el clima organizacional?</td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_8" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_8" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_8" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_8" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_8" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_8" value="6"></td>
                                    
                                </tr>
                                <tr>
                                    <td>¿Qué actividades o prácticas crees que podrían aumentar la satisfacción de los empleados en el trabajo?</td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_9" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_9" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_9" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_9" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_9" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_9" value="6"></td>
                                    
                                </tr>
                                <tr>
                                    <td>¿Cómo percibes la comunicación dentro del equipo?</td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_10" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_10" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_10" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_10" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_10" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_10" value="6"></td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    
                                    <th scope="col"></th>
                                    <th scope="col"><img class="iconhome" src="img/Muy_insatisfecho.png " alt="" style="width: 40px; height: 40px;">Muy insatisfecho</th>
                                    <th scope="col"><img class="iconhome" src="img/Insatisfecho.png" alt="" style="width: 40px; height: 40px;">Insatisfecho</th>
                                    <th scope="col"><img class="iconhome" src="img/Neutro.png" alt="" style="width: 40px; height: 40px;">Neutro</th>
                                    <th scope="col"><img class="iconhome" src="img/Satisfecho.png" alt="" style="width: 40px; height: 40px;">Satisfecho</th>
                                    <th scope="col"><img class="iconhome" src="img/Muy_satisfecho.png" alt="" style="width: 40px; height: 40px;">Muy satisfecho</th>
                                    <th scope="col"><img class="iconhome" src="img/not_apply.png" alt="" style="width: 40px; height: 40px;">No aplica</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>¿Cómo describirías el ambiente de trabajo actual?</td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_11" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_11" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_11" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_11" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_11" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_11" value="6"></td>
                                    
                                </tr>
                                <tr>
                                    <td>¿Qué aspectos crees que contribuyen más a un buen clima laboral en nuestro equipo?</td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_12" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_12" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_12" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_12" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_12" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_12" value="6"></td>
                                    
                                </tr>
                                <tr>
                                    <td>¿En qué áreas crees que podríamos mejorar para fortalecer el clima organizacional?</td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_13" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_13" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_13" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_13" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_13" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_13" value="6"></td>
                                    
                                </tr>
                                <tr>
                                    <td>¿Qué actividades o prácticas crees que podrían aumentar la satisfacción de los empleados en el trabajo?</td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_14" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_14" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_14" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_14" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_14" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_14" value="6"></td>
                                    
                                </tr>
                                <tr>
                                    <td>¿Cómo percibes la comunicación dentro del equipo?</td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_15" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_15" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_15" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_15" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_15" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="pregunta_15" value="6"></td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            
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


            <!-- indexEmpleado.html: -->
            
                

                <input type="hidden" name="empleado_idEmpleado" value="ID_DEL_EMPLEADO">

                
                <!-- Botones al final del formulario -->
                <div class="bg-light rounded-top p-4">
                    <div class="row align-items-center">
                        <!-- Texto -->
                        <div class="col">
                            <!-- Información del pie -->
                        </div>
                        <!-- Botones -->
                        <div class="col-auto">
                            <!-- Imágenes y botones -->
                            <button type="submit" id="btnGuardar" name="guardar" value="guardar" class="btn btn-sm btn-primary me-2">Guardar</button>
                            <button type="submit" id="btnFinalizar" name="finalizar" value="finalizar" class="btn btn-sm btn-primary">Finalizar</button>
                        </div>
                    </div>
                </div>
            </form>

             

            <!-- HOME AQUI AGREGUEN SU CONTENIDO -->
       





            <!-- HOME END AQUI AGREGUEN SU CONTENIDO -->
       


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
</body>

</html>