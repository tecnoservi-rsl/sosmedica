<?php

class producto extends Model
{
    public function __construct() {
        parent::__construct();
    }


public function guardar($datos){



echo $sql = "INSERT INTO `producto`  VALUES ('', '".$datos['producto']."', ".$datos['total'].", ".$datos['abono'].",".$datos['id_persona'].", curdate())";

 $this->_db->query($sql);
        
        



}
public function buscar($datos){



 $sql="SELECT * FROM `producto` WHERE id_persona = '$datos' ORDER BY `id_producto` DESC limit 0,1 ";

$datos = $this->_db->query($sql);


$rs=$datos->fetch();



$this->producto=$rs['productos'] ;
$this->total=$rs['total'] ;
$this->abono=$rs['abono'] ;
$this->fecha=$rs['fecha'] ;
$this->resta= $rs['total'] - $rs['abono'] ;
        


}




    
public function traer_publicasion(){



$sql="SELECT * FROM `propiedad` ORDER BY `id_propiedad` DESC limit 0,6 ";

$datos = $this->_db->query($sql);
        
        return $datos->fetchall();



}
public function traer_img($id){


$sql="select * from img where id_propiedad='$id'";

$datos = $this->_db->query($sql);
        
        return $datos->fetchall();



}


}

?>