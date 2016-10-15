<?php

class persona extends Model
{

	public $nombre;

    public function __construct() {
        parent::__construct();
    }


public function guardar($datos){



$sql = "INSERT INTO persona  VALUES ('', ".$datos["cedula"].", '".$datos["nombres"]."', '".$datos["coord"]."')";

$this->_db->query($sql);

        
$this->id_persona=$this->_db->lastinsertid();

       



}




    
public function buscar($datos){



 $sql="SELECT * FROM `persona` WHERE cedula='".$datos['cedula']."' ";

$datos = $this->_db->query($sql);
        

$rs=$datos->fetch();

$this->id_persona=$rs['id_persona'] ;
$this->nombres=$rs['nombres'] ;
$this->cedula=$rs['cedula'] ;
$this->coordinacion=$rs['coordinacion'] ;

       



}
public function traer_img($id){


$sql="select * from img where id_propiedad='$id'";

$datos = $this->_db->query($sql);
        
        return $datos->fetchall();



}


}

?>