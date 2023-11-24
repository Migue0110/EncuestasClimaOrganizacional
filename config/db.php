<?php
class DB
{

    private $host     = "127.0.0.1";
    private $user     = "root";
    private $password = "1234";
    private $db       = "encuestasclima";
    public $connect;

    public function conexion()
    {
        try {
            $conectar = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=utf8";

            $this->connect = new PDO($conectar, $this->user, $this->password);
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            echo "Conexion exitosa";

            return $this->connect;
        } catch (Exception $e) {
            $this->connect = "error de conexion";
            echo "ERROR: Verifique Conexion " . $e->getMessage();
        }
    }
}

$data = new DB;
$data->conexion(); 