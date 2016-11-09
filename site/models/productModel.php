<?php

class productModel extends Model
{
    public function __construct() {
        parent::__construct();
    }




public function mostrar_producto($id){

  

    $sql = "Select producto.*, marca.marca, categoria.categoria from producto, marca, categoria where producto.id_marca=marca.id_marca and producto.id_categoria=categoria.id_categoria and producto.id_producto='$id'";
     
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
