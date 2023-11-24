<?php
require('../../config/db.php');

class Informes extends DB
{
    public function __construct()
    {
        $this->connect = parent::conexion();
    }

    public function encuesta()
    {
        try {
            $query = "SELECT
            seleccionpregunta.respuesta,
            seleccionpregunta.encuesta,
            bancopreguntas.pregunta,
            cargo.nombre_cargo,
            tema.nombre_tema,
            area.nombre_area,
            CONCAT(empleado.nombre, ' ', empleado.apellido) AS nombre_completo
        FROM empleado
        JOIN seleccionpregunta ON empleado.idEmpleado = seleccionpregunta.empleado_idEmpleado
        JOIN bancopreguntas ON seleccionpregunta.bancopreguntas_idPregunta = bancopreguntas.idPregunta
        JOIN tema ON bancopreguntas.id_tema = tema.idTema
        JOIN cargo ON empleado.cargo_idCargo = cargo.idCargo
        JOIN area ON empleado.area_idArea = area.idArea
        ";
            $ejecutar = $this->connect->prepare($query);
            $ejecutar->execute();
            if ($row = $ejecutar->fetchAll(PDO::FETCH_ASSOC)) {
                return $row;
            };
        } catch (Exception $e) {
            die('Error Administrator(Certificado)' . $e->getMessage());
        }
    }

    public function viewinforme()
    {
        $listas = $this->encuesta();
        $data = array();

        foreach ($listas as $lista) {

            $data[] = array(
                // respuesta,encuesta,pregunta,nombre_cargo,nombre_tema,nombre_area,nombre_completo
                "respuesta"=> $lista['respuesta'],
                "encuesta"=> $lista['encuesta'],
                "pregunta"=> $lista['pregunta'],
                "nombre_cargo"=> $lista['nombre_cargo'],
                "nombre_tema"=> $lista['nombre_tema'],
                "nombre_area"=> $lista['nombre_area'],
                "nombre_completo"=> $lista['nombre_completo'],
          
            
            );

        }
        echo json_encode($data);
    }
}
    


if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $info = new Informes();
    switch ($action) {
        case 'informeTema':
            $info->viewinforme();
            break;

        default:
            echo "Acción no válida";
            break;
    }
}
