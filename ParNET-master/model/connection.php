<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','ParNET');

class DbConnection{
    public function __construct(){
        $this->conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $this->conn->set_charset('utf8');
        if (!$this->conn){
            echo "ERROR EN LA CONEXION";
        }
    }
    public function __destruct()
    {
        mysqli_close($this->conn);
    }
}
?>