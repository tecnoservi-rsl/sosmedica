<?php
 
class productModel extends Model
{
    public function __construct() {
        parent::__construct();
    }




public function mostrar_producto($id){
echo $id.'----';
 $sql1="select tipo from producto where id_producto=$id";

$xx=$this->_db->query($sql1);

$tipo=$xx->fetch();

if($tipo['tipo'] == 'PRODUCTO'){

    $sql = "Select producto.*, marca.marca, categoria.categoria from producto, marca, categoria where producto.id_marca=marca.id_marca and producto.id_categoria=categoria.id_categoria and producto.id_producto='$id'";
     
     $rs=$this->_db->query($sql);

     return $rs->fetchall();
}
else{

   $sql = "SELECT producto.*,marca.marca FROM producto,marca WHERE \n"
    . "producto.id_marca=marca.id_marca AND\n"
    . "producto.id_producto=$id";
     
     $rs=$this->_db->query($sql);

     return $rs->fetchall();
}
}




public function buscar_img_por_id($id){

  $sql = "SELECT * FROM img_producto WHERE id_publicacion='$id'";
     
     $rs=$this->_db->query($sql);

     return $rs->fetchall();

}

public function buscar_almacenes_por_id($id){

 $sql = "SELECT almacen.*, producto_almacen.estatus FROM producto_almacen,producto,almacen WHERE \n"
    . "producto.id_producto=producto_almacen.id_producto AND\n"
    . "producto_almacen.id_almacen=almacen.id_almacen AND\n"
    . "producto.id_producto=$id";
     
     $rs=$this->_db->query($sql);

     return $rs->fetchall();

}  


public function buscar_tipo_producto($valor){

	$sql ="select tipo from producto where id_producto=$valor";


	$rs=$this->_db->query($sql);

     return $rs->fetch();
}


public function productos_similares($valor){

	$sql = "SELECT distinct producto.* FROM producto where id_categoria=$valor";
     
     $rs=$this->_db->query($sql);

     return $rs->fetchall();
}


public function equipos_similares($valor){

	$sql = "SELECT distinct producto.* FROM producto where id_marca=$valor";
     
     $rs=$this->_db->query($sql);

     return $rs->fetchall();
}



}

?>
