<?php
if (class_exists("clientes")!=true) {
class clientes{
    protected $ID_CLIENTE;
    protected $EMPRESA_CLIENTE;
    protected $DIRECCION_CLIENTE;
    PROtected $CORREO_CLIENTE;

    public function __construct($id_cliente=null,$empresa_cliente=null,$direccion_cliente=null,$correo_cliente=null){
        $this->ID_CLIENTE=$id_cliente;
        $this->EMPRESA_CLIENTE=$empresa_cliente;
        $this->DIRECCION_CLIENTE=$direccion_cliente;
        $this->CORREO_CLIENTE=$correo_cliente;
    }
    
    function getIDCLIENTE(){
        return $this->ID_CLIENTE;
    }
    function setIDCLIENTE($id_cliente){
        $this->ID_CLIENTE=$id_cliente;
    }
    function getEMPRESA(){
        return $this->EMPRESA_CLIENTE;
    }
    function setEMPRESA($empresa_cliente){
        $this->EMPRESA_CLIENTE=$empresa_cliente;
    }
    function getDIRECCION(){
        return $this->DIRECCION_CLIENTE;
    }
    function setDIRECCION($direccion_cliente){
        $this->DIRECCION_CLIENTE=$direccion_cliente;
    }
    function getCORREO(){
        return $this->CORREO_CLIENTE;
    }
    function setCORREO($correo_cliente){
        $this->CORREO_CLIENTE=$correo_cliente;
    }
} 
}

?>