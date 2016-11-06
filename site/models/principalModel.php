<?php

class principalModel extends Model
{
    public function __construct() {
        parent::__construct();
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

public function buscar_productos(){

  

   	$sql = "SELECT distinct producto.* FROM producto order by id_producto DESC";
     
     $rs=$this->_db->query($sql);

     return $rs->fetchall();

}

public function buscar_img_por_id($id){

  	 $sql = "SELECT * FROM img_producto WHERE id_publicacion='$id'";
     
     $rs=$this->_db->query($sql);

     return $rs->fetchall();

}


}

?>
