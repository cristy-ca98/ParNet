<?php
include('class_catalogo_areas.php');
include('class_db.php');
class catalogo_area_dal extends class_db{
    function __construct(){
        parent::__construct();
    }
    function __destruct(){
        parent::__destruct();
    }

    function datos_por_id($id){
        $vid=$this->db_conn->real_escape_string($id);
        $sql="select * from catalogo_areas where ID_AREA=$vid";
        $this->set_sql($sql);
        $result=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
        $total_cursos=mysqli_num_rows($result);
        $obj_det=null;
        if ($total_cursos==1) {
            $renglon=mysqli_fetch_assoc($result);
            $obj_det=new catalogo_area($renglon["ID_AREA"],$renglon["NOMBRE_AREA"]);
        }//end if
        return $obj_det;
    } //end datos_por_id

    function obtener_lista_areas(){
        $sql="select * from catalogo_areas";
        $this->set_sql($sql);
        $result=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
        $total_cursos=mysqli_num_rows($result);
        $obj_det=null;
        $lista=null;
        if ($total_cursos>0) {
            $i=0;
            while ($renglon=mysqli_fetch_assoc($result)) {
                $obj_det=new catalogo_area($renglon["ID_AREA"],$renglon["NOMBRE_AREA"]);
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

    function insertar_area($obj){
        $sql="insert into catalogo_areas(";
        $sql.="NOMBRE_AREA)";
        $sql.=" values (";
        $sql.="'".$obj->getNOMBREAREA()."'";
        $sql.=")";

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

    function borra_area($id){
        $vid=$this->db_conn->real_escape_string($id);
        $sql="delete from catalogo_areas where ID_AREA=".$vid;
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

    function actualiza_area($obj){
        $vid=$this->db_conn->real_escape_string($obj->getIDAREA());
        $sql="update catalogo_areas set";
        $sql.=" NOMBRE_AREA="."'".$obj->getNOMBREAREA()."'";
        $sql.=" where ID_AREA=".$vid;

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