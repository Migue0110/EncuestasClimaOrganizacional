<?php
include("../modulos/db_connection.php");
include("./templates/headerEmpleado.php");

if($_GET){
    $id_empleado = $_GET["empleado"];
}else{
    $id_empleado = "1";
}


$empleados = obtener_empleados($conn);
function obtener_empleados($conn){
    $registros = [];
    $sql = "SELECT idEmpleado, nombre, apellido FROM Empleado";
    $resultado = $conn->query($sql);
    if(mysqli_num_rows($resultado) > 0){
        while($empleado = $resultado->fetch_object()){
            array_push($registros, $empleado);
        }
    }
    return $registros;
}

$respuestas = obtener_respuestas($conn, $id_empleado);
function obtener_respuestas($conn, $id_empleado){
    $respuestas = [];
    $sql = "SELECT * FROM SeleccionPregunta WHERE empleado_idEmpleado = '" . $id_empleado . "'";
    $resultado = $conn->query($sql);
    if(mysqli_num_rows($resultado) > 0){
        while($respuesta = $resultado->fetch_object()){
            array_push($respuestas, $respuesta);
        }
    }
    return $respuestas;
}

$preguntas = obtener_preguntas($conn, $id_empleado);
function obtener_preguntas($conn, $id_empleado){

    $num_preguntas = 10;  //! Número de preguntas de la encuesta

    $preguntas = [];
    $sql = "SELECT bancopreguntas_idPregunta FROM SeleccionPregunta WHERE empleado_idEmpleado = '" . $id_empleado . "'";
    $resultado = $conn->query($sql);
    if(mysqli_num_rows($resultado) > 0){
        while($pregunta = $resultado->fetch_object()){
            array_push($preguntas, $pregunta);
        }
    }
    if($preguntas){
        foreach( $preguntas as $pregunta ) {
            $sql = "SELECT * FROM BancoPreguntas WHERE idPregunta = '" . $pregunta->bancopreguntas_idPregunta . "'";
            $resultado = $conn->query($sql);
            $res = $resultado->fetch_object();
            $pregunta->pregunta = $res->pregunta;
            $pregunta->idPregunta = $res->idPregunta;
        }
    }else{
        foreach(randomGen(1,80,$num_preguntas) as $id){
            $sql = "SELECT * FROM BancoPreguntas WHERE idPregunta = '" . $id . "'";
            $resultado = $conn->query($sql);
            $res = $resultado->fetch_object();
            array_push($preguntas, $res);

        }
    }
    return $preguntas;
}

function randomGen($min, $max, $cantidad) {
    $numbers = range($min, $max);
    shuffle($numbers);
    return array_slice($numbers, 0, $cantidad);
}
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

            <form action="../modulos/nickson/guardar_respuestas_bd.php" method="post" class="container-fluid pt-4 px-4">

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
                        <select id="select_empleado" class="col-6 m-2" name="empleado_idEmpleado" onchange="cargarProgreso(this.value)">
                            <?php foreach($empleados as $empleado){?>
                            <option value="<?php echo($empleado->idEmpleado)?>" <?php echo(isset($id_empleado) && $id_empleado == $empleado->idEmpleado)? 'selected' : ''?>><?php echo($empleado->nombre . ' ' . $empleado->apellido)?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
            </div>

                <!-- Suponiendo que tienes varios elementos de entrada para las preguntas, por ejemplo: -->
            <!-- Widgets End -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Encuesta Clima organizacional</h6>
                        <a href="">...</a>
                    </div>

                    <?php $mostrar_tabla = true; if($respuestas){
                        foreach($respuestas as $respuesta){
                            if(empty($respuesta->respuesta)){
                                $mostrar_tabla = true;
                                echo('<p>Hay al menos una pregunta sin responder, recuerde que una vez respondidas todas las preguntas, no será posible cambiar las respuestas</p>');
                                break;
                            }else{
                                $mostrar_tabla = false;
                            }
                        }
                    }else{
                        echo('<p>Hay al menos una pregunta sin responder, recuerde que una vez respondidas todas las preguntas, no será posible cambiar las respuestas</p>');
                    }

                    if($mostrar_tabla){
                    ?>
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
                                <?php foreach ($preguntas as $pregunta){ $posicion = array_search($pregunta,$preguntas); ?>
                                <tr>
                                    <td>
                                        <?php echo $pregunta->pregunta?>
                                        <input type="hidden" name="bancopreguntas_idPregunta[<?php echo $posicion?>]" value="<?php echo $pregunta->idPregunta?>">
                                        <?php if(!empty($respuestas)){?>
                                            <input type="hidden" name="idSeleccionPregunta[<?php echo $posicion?>]" value="<?php echo $respuestas[$posicion]->idSeleccionPregunta?>">
                                        <?php }?>

                                    </td>
                                    <?php for( $i = 1; $i <= 6; $i++ ) {?>
                                    <td><input class="form-check-input" type="radio" name="respuesta[<?php echo $posicion?>]" value="<?php echo $i?>"
                                    <?php echo(!empty($respuestas) && $respuestas[$posicion]->respuesta == "$i")? 'checked' : ''?>></td>
                                    <?php }?>

                                </tr>
                                    <?php }?>
                            </tbody>
                        </table>
                    </div>


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
                            </div>
                        </div>
                    </div>
                    <?php }else echo('<h1 style="color: green">ENCUESTA COMPLETADA<br><br><i class="fa fa-solid fa-check"></i><br><br></h1>');?>
                </div>
            </div>

            
            <script src="../js/nickson/indexEmpleado.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            

            <!-- indexEmpleado.html: -->