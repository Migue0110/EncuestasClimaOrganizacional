<?php
require('../../config/db.php');

class Informes extends DB
{
    public function __construct()
    {
        $this->connect = parent::conexion();
    }

    public function consultaArea()
    {
        try {
            $query = "
                SELECT
                    a.nombre_area, 
                    COUNT(*) AS cantidad_empleados
                FROM empleado e
                JOIN seleccionpregunta sp ON e.idEmpleado = sp.empleado_idEmpleado
                JOIN bancopreguntas bp ON sp.bancopreguntas_idPregunta = bp.idPregunta
                JOIN tema t ON bp.id_tema = t.idTema
                JOIN cargo c ON e.cargo_idCargo = c.idCargo
                JOIN area a ON e.area_idArea = a.idArea
                GROUP BY a.nombre_area
                ORDER BY a.nombre_area;
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

    public function viewArea()
    {
        $listas = $this->consultaArea();
        $data = array();

        foreach ($listas as $lista) {
            $data[] = array(
                "nombre_area" => $lista['nombre_area'],
                "cantidad_empleados" => $lista['cantidad_empleados'],
                
            );
        }
        // header('Content-Type: application/json');  // Añadido para especificar el tipo de contenido como JSON
        echo json_encode($data);
    }

    public function consultaAmbienteTrabajo()
    {
        try {
            $query = "SELECT
            tema.nombre_tema,
            seleccionpregunta.respuesta,
            COUNT(*) AS cantidad_empleados
        FROM empleado
        JOIN seleccionpregunta ON empleado.idEmpleado = seleccionpregunta.empleado_idEmpleado
        JOIN bancopreguntas ON seleccionpregunta.bancopreguntas_idPregunta = bancopreguntas.idPregunta
        JOIN tema ON bancopreguntas.id_tema = tema.idTema
        JOIN cargo ON empleado.cargo_idCargo = cargo.idCargo
        JOIN area ON empleado.area_idArea = area.idArea
        WHERE seleccionpregunta.respuesta BETWEEN 1 AND 6 AND tema.nombre_tema= 'Ambiente de Trabajo' GROUP BY tema.nombre_tema, seleccionpregunta.respuesta order by tema.nombre_tema;
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
    public function viewAmbiente_trabajo()
    {
        $listas = $this->consultaAmbienteTrabajo();
        $data = array();

        foreach ($listas as $lista) {
            $data[] = array(
                "nombre_tema" => $lista['nombre_tema'],
                "respuesta" => $lista['respuesta'],
                "cantidad_empleados" => $lista['cantidad_empleados'],
                
            );
        }
        // header('Content-Type: application/json');  // Añadido para especificar el tipo de contenido como JSON
        echo json_encode($data);
    }

}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $info = new Informes();
    switch ($action) {
        case 'porArea':
            $info->viewArea();  // Cambiado de viewinforme a viewArea
            break;
        case 'AreaAmbiente':
            $info->viewAmbiente_trabajo();  // Cambiado de viewinforme a viewArea
            break;
        // case 'porArea':
        //     $info->viewArea();  // Cambiado de viewinforme a viewArea
        //     break;
        // case 'porArea':
        //     $info->viewArea();  // Cambiado de viewinforme a viewArea
        //     break;
        // case 'porArea':
        //     $info->viewArea();  // Cambiado de viewinforme a viewArea
        //     break;
        default:
            echo "Acción no válida";
            break;
    }
}