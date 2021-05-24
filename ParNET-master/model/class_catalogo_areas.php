<?php
if (class_exists("catalogo_area")!=true) {
class catalogo_area{
    protected $ID_AREA;
    protected $NOMBRE_AREA;

    public function __construct($id_area=null,$nombre_area=null){
        $this->ID_AREA=$id_area;
        $this->NOMBRE_AREA=$nombre_area;
    }
    
    function getIDAREA(){
        return $this->ID_AREA;
    }
    function setIDAREA($id_area){
        $this->ID_AREA=$id_area;
    }
    function getNOMBREAREA(){
        return $this->NOMBRE_AREA;
    }
    function setNOMBREAREA($nombre_area){
        $this->NOMBRE_AREA=$nombre_area;
    }
} 
}

?>