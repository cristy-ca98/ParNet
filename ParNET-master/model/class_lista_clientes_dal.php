<?php
include('class_lista_clientes.php');
include('class_db.php');
class lista_clientes_dal extends class_db{
    function __construct(){
        parent::__construct();
    }
    function __destruct(){
        parent::__destruct();
    }

    function datos_por_id($id){
        $vid=$this->db_conn->real_escape_string($id);
        $sql="select * from cliente where ID_CLIENTE=$vid";
        $this->set_sql($sql);
        $result=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
        $total_cursos=mysqli_num_rows($result);
        $obj_det=null;
        if ($total_cursos==1) {
            $renglon=mysqli_fetch_assoc($result);
            $obj_det=new clientes($renglon["ID_CLIENTE"],$renglon["EMPRESA_CLIENTE"],$renglon["DIRECCION_CLIENTE"],$renglon["CORREO_CLIENTE"]);
        }//end if
        return $obj_det;
    } //end datos_por_id

    function obtener_lista_clientes(){
        $sql="select * from cliente";
        $this->set_sql($sql);
        $result=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
        $total_cursos=mysqli_num_rows($result);
        $obj_det=null;
        $lista=null;
        if ($total_cursos>0) {
            $i=0;
            while ($renglon=mysqli_fetch_assoc($result)) {
                $obj_det=new clientes($renglon["ID_CLIENTE"],$renglon["EMPRESA_CLIENTE"],$renglon["DIRECCION_CLIENTE"],$renglon["CORREO_CLIENTE"]);
                $i++;
                $lista[$i]=$obj_det;
                unset($obj_det);
            }//end while
            return $lista;
        }//end if 
    }//end obtener_lista_cursos

    function existe_curso($id){
        $vid=$this->db_conn->real_escape_string($id);
        $sql="select count(*) from catalogo_areas where ID_CURSO=$vid";
        $this->set_sql($sql);
        $result=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
        $renglon=mysqli_fetch_array($result);
        $cuantos=$renglon[0];
        return $cuantos;
    } //end existe_cursos

    function insertar_cliente($obj){
        $sql = "insert into cliente (";
        $sql .= "EMPRESA_CLIENTE,";
        $sql .= "DIRECCION_CLIENTE,";
        $sql .= "CORREO_CLIENTE";
        $sql .= ") ";
        $sql .= "values(";
        $sql .= "'".$obj->getEMPRESA()."',";
        $sql .= "'".$obj->getDIRECCION()."',";
        $sql .= "'".$obj->getCORREO()."',";
        $sql .= "'".$obj->getIDCLIENTE()."'";
        $sql .= ")";

        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));

        if (mysqli_affected_rows($this->db_conn)==1) {
            # code...
            $insertado=1;
        } else {
            $insertado=0;
        }
        unset($obj);
        return $insertado;
    }//end insertar_curso

    function borra_cliente($id){
        $vid=$this->db_conn->real_escape_string($id);
        $sql="delete from cliente where ID_CLIENTE=".$vid;
        $this->set_sql($sql);
        mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));

        if (mysqli_affected_rows($this->db_conn)==1) {
            $borrado=1;
        } else {
            $borrado=0;
        }
        unset($obj);
        return $borrado;
    }//end borra_curso

    function actualiza_cliente($obj){
        $vid=$this->db_conn->real_escape_string($obj->getIDCLIENTE());
        $sql = "update cliente set ";
        $sql .= "EMPRESA_CLIENTE="."'".$obj->getEMPRESA()."',";
        $sql .= "DIRECCION_CLIENTE="."'".$obj->getDIRECCION()."',";
        $sql .= "CORREO_CLIENTE="."'".$obj->getCORREO()."'";
        $sql .= " where ID_CLIENTE = '".$obj->getIDCLIENTE()."'";
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
        if (mysqli_affected_rows($this->db_conn)==1) {
            $actualizado=1;
        } else {
            $actualizado=0;
        }
        unset($obj);
        return $actualizado;
    }//end actualiza_curso
}//end class 
?>