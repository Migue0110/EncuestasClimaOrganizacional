<?php
require('../../config/db.php');

class Lista99 extends DB
{
    public function __construct()
    {
        $this->connect = parent::conexion();
    }

    public function encuesta()
    {
        try {
            $query = "SELECT * FROM ";
            $ejecutar = $this->connect->prepare($query);
            $ejecutar->execute();
            if ($row = $ejecutar->fetchAll(PDO::FETCH_ASSOC)) {
                return $row;
            };
        } catch (Exception $e) {
            die('Error Administrator(Certificado)' . $e->getMessage());
        }
    }

    public function viewAllLista99()
    {
        $listas = $this->get_Lista99();
        $data = array();

        foreach ($listas as $lista) {

            $data[] = array(
          
                "COD_ACTIVO"              => $lista['COD_ACTIVO'],
                "BODEGA"                  => $lista['BODEGA'],
                "DESC_ACTIVO_ALM"         => $lista['DESC_ACTIVO_ALM'],
                "UNI_MED"                 => $lista['UNI_MED'],
                "COD_UBICACION_REAL"      => $lista['COD_UBICACION_REAL'],
                "DESC_UBICACION_REAL"     => $lista['DESC_UBICACION_REAL'],
                "COD_UBICACION"           => $lista['COD_UBICACION'],
                "DESC_UBICACION"          => $lista['DESC_UBICACION'],
                "ZONA"                    => $lista['ZONA'],
                "FUENTE_DATOS"            => $lista['FUENTE_DATOS'],
                "KEY_PARCIAL"             => $lista['KEY_PARCIAL'],
                "KEY_DEFINITIVO"          => $lista['KEY_DEFINITIVO'],
                "SUB_INDICE"              => $lista['SUB_INDICE'],
                "CANTI_ALMALOGIX"         => $lista['CANTI_ALMALOGIX'],
                "EXISTE_INV"              => $lista['EXISTE_INV'],
            
            );

        }
        echo json_encode($data);
    }
}
    


if (isset($_POST['actionT'])) {
    $action = $_POST['actionT'];
    $listas99 = new Lista99();
    switch ($action) {
        case 'view_all_lista99':
            $listas99->viewAllLista99();
            break;

        default:
            echo "Acción no válida";
            break;
    }
}
