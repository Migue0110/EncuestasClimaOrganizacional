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
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $info = new Informes();
    switch ($action) {
        case 'porArea':
            $info->viewArea();  // Cambiado de viewinforme a viewArea
            break;
        default:
            echo "Acción no válida";
            break;
    }
}