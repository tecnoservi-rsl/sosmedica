<?php

class principalModel extends Model
{
    public function __construct() {
        parent::__construct();
    }
    


public function buscar_productos(){

  

   	$sql = "SELECT distinct producto.* FROM producto order by id_producto DESC limit 0,12 ";
     
     $rs=$this->_db->query($sql);

     return $rs->fetchall();

}

public function buscar_img_por_id($id){

  	 $sql = "SELECT * FROM img_producto WHERE id_publicacion='$id'";
     
     $rs=$this->_db->query($sql);

     return $rs->fetchall();

}

public function disponibilidad($id){

     $sql = "SELECT * FROM producto_almacen WHERE producto_almacen.id_producto=$id";
     
     $rs=$this->_db->query($sql);

     $rs=$rs->fetchall();

     $bn=0;
     for ($i=0; $i < count($rs); $i++) { 
         
        if ($rs[$i]['estatus']=="DISPONIBLE") {
            $bn=1;
        }

     }
     return $bn;

}



}

?>
