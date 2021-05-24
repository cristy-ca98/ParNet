<?php
if(class_exists('class_lista_servicios_areas') != true)
{
	class lista_servicios_areas{
		public $id_servicio;
		public $nombre_servicio;
		public $id_area;
		public $nombre_area;
        public $detalle;

public function __construct($id_servicio=NULL,$nombre_servicio=NULL,$id_area=NULL,$nombre_area=NULL,$detalle)
  		{
		   $this->id_servicio=$id_servicio;
		   $this->nombre_servicio=$nombre_servicio;
		   $this->id_area=$id_area;
		   $this->nombre_area=$nombre_area;
           $this->detalle=$detalle;
  		}

  

	}
}
?>