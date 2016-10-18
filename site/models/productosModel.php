<?php

class productosModel extends Model
{
    public function __construct() {
        parent::__construct();
    }


    public function buscar_producto($id){

  

   	$sql = "SELECT producto.*,categoria.categoria,marca.marca FROM producto,marca,categoria WHERE \n"
    . "producto.id_categoria=categoria.id_categoria AND\n"
    . "producto.id_marca=marca.id_marca AND\n"
    . "producto.id_categoria='$id'";
     
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
