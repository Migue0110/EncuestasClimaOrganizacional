<?php
include("./templates/headerEmpleado.php");
?>
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
                                <img src="../img/dummi1.jpg" class="d-block w-100" alt="Imagen 1">
                            </div>
                            <div class="carousel-item">
                                <img src="../img/dummi2.jpg" class="d-block w-100" alt="Imagen 2">
                            </div>
                            <div class="carousel-item">
                                <img src="../img/dummi3.jpg" class="d-block w-100" alt="Imagen 3">
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

            
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start d-flex align-items-center">
                            <h6 class="pie2 mb-0">Estudios Psicologicos S.A.S</h6>
                            <h6 class="pie mb-0 ms-2">Universidad Antonio Nariño</h6>
                        </div>
                        <!-- imgs -->
                        <div class="col-12 col-sm-6 d-flex align-items-center justify-content-center justify-content-sm-end">
                            <img class="iconhome" src="../img/icoep.png" alt="" style="width: 40px; height: 40px;">
                            <img class="iconhome" src="../img/icouan.png" alt="" style="width: 40px; height: 40px;">
                        </div>
                    </div>
                </div>
            </div>

            <form action="../modulos/nickson/guardar_respuestas_bd.php" method="post" class="container-fluid pt-4 px-4">
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
                                    <th scope="col"><img class="iconhome" src="../img/Muy_insatisfecho.png " alt="" style="width: 40px; height: 40px;">Muy insatisfecho</th>
                                    <th scope="col"><img class="iconhome" src="../img/Insatisfecho.png" alt="" style="width: 40px; height: 40px;">Insatisfecho</th>
                                    <th scope="col"><img class="iconhome" src="../img/Neutro.png" alt="" style="width: 40px; height: 40px;">Neutro</th>
                                    <th scope="col"><img class="iconhome" src="../img/Satisfecho.png" alt="" style="width: 40px; height: 40px;">Satisfecho</th>
                                    <th scope="col"><img class="iconhome" src="../img/Muy_satisfecho.png" alt="" style="width: 40px; height: 40px;">Muy satisfecho</th>
                                    <th scope="col"><img class="iconhome" src="../img/not_apply.png" alt="" style="width: 40px; height: 40px;">No aplica</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        ¿Está satisfecho con el entorno laboral?
                                        <input type="hidden" name="bancopreguntas_idPregunta[0]" value="2">
                                    </td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[0]" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[0]" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[0]" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[0]" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[0]" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[0]" value="6"></td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        ¿Cómo calificaría la comunicación interna en la empresa?
                                        <input type="hidden" name="bancopreguntas_idPregunta[1]" value="4">

                                    </td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[1]" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[1]" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[1]" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[1]" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[1]" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[1]" value="6"></td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        ¿Qué sugerencias tendría para mejorar el ambiente laboral?
                                        <input type="hidden" name="bancopreguntas_idPregunta[2]" value="6">

                                    </td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[2]" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[2]" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[2]" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[2]" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[2]" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[2]" value="6"></td>
                                    
                                </tr>
                                <tr>
                                    <td>
                                        ¿Está satisfecho con las oportunidades de desarrollo profesional?
                                        <input type="hidden" name="bancopreguntas_idPregunta[3]" value="8">
                                    
                                    </td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[3]" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[3]" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[3]" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[3]" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[3]" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[3]" value="6"></td>

                                </tr>
                                <tr>
                                    <td>
                                        ¿Cómo describiría la cultura organizacional de la empresa?
                                        <input type="hidden" name="bancopreguntas_idPregunta[4]" value="10">
                                    
                                    </td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[4]" value="1"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[4]" value="2"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[4]" value="3"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[4]" value="4"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[4]" value="5"></td>
                                    <td><input class="form-check-input" type="radio" name="respuesta[4]" value="6"></td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>



                    <input type="hidden" name="empleado_idEmpleado" value="1">


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
                                <button type="submit" id="btnGuardar" class="btn btn-sm btn-primary me-2">Guardar</button>
                                <button type="submit" id="btnFinalizar" name="finalizar" value="finalizar" class="btn btn-sm btn-primary">Finalizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            



            <!-- indexEmpleado.html: -->