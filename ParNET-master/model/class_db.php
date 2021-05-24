<?php
if(class_exists('class_db') != true)
{
    class class_db{
        var $db_conn;
        var $db_name;
        var $db_query; 
        //Método mágico que se invoca solo, cuando el objeto se está construyendo
        //Para este caso, cuando el objeto se está construyendo se conecta a la
        //Base de Datos
        function __construct(){
            $this->set_db("localhost","root","","parnet");
        }
        function __destruct(){
           $this->close_db();
        }
        function set_db ($host,$user,$passwd,$db) {
            if(!isset($this->db_conn)){
            $this->db_conn = mysqli_connect($host,$user,$passwd,$db);
            mysqli_set_charset($this->db_conn,"utf8");
            //$this->db_conn = @mysql_connect ($host,$user,$passwd);
            $this->db_name = $db;
            }
        }
        function close_db () {
            if(isset($db_conn)){
                mysqli_close ($db_conn);
            }
        }
        function set_sql ($sql) {
            $this->db_query = $sql;
        }
    }
}
?>