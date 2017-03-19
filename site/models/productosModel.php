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
                      . "categoria.categoria like '%$id%'";
                     
                      $rs=$this->_db->query($sql);

                      //print_r($rs->fetchall());

                      return $rs->fetchall();

}


public function buscar_producto2($l,$r,$id){

  

    $sql = "SELECT producto.*,categoria.categoria,marca.marca FROM producto,marca,categoria WHERE \n"
    . "producto.id_categoria=categoria.id_categoria AND\n"
    . "producto.id_marca=marca.id_marca AND\n"
    . "categoria.categoria like '%$id%'   LIMIT $l,$r  ";
    $rs=$this->_db->query($sql);

    return $rs->fetchall();

}

public function buscar_producto_like($id){

    $id = strtoupper ($id);


 $sql = "SELECT DISTINCT(producto.id_producto),producto.*,categoria.categoria,marca.marca FROM producto,marca,categoria WHERE"
    . "(producto.id_categoria=categoria.id_categoria OR "
    . "producto.id_marca=marca.id_marca) AND"
    . "(producto.nombre like '%$id%' OR"
    . " producto.modelo LIKE '%$id%' OR"
    . " categoria.categoria LIKE '%$id%' OR"
    . " marca.marca LIKE '%$id%'"
    . ") GROUP BY producto.id_producto";


     $rs=$this->_db->query($sql);

     return $rs->fetchall();

}
public function buscar_producto_like2($l,$r,$id){

    $id = strtoupper ($id);

 


 $sql = "SELECT DISTINCT(producto.id_producto),producto.*,categoria.categoria,marca.marca FROM producto,marca,categoria WHERE"
    . "(producto.id_categoria=categoria.id_categoria OR "
    . "producto.id_marca=marca.id_marca) AND "
    . "(producto.nombre like '%$id%' OR"
    . " producto.modelo LIKE '%$id%' OR"
    . " categoria.categoria LIKE '%$id%' OR"
    . " marca.marca LIKE '%$id%' "
    . ") GROUP BY producto.id_producto LIMIT $l,$r";
     $rs=$this->_db->query($sql);

     return $rs->fetchall();

}


public function buscar_producto_2($id){

    
 $sql = "SELECT producto.*,marca.marca, categoria.categoria FROM producto,marca,categoria WHERE producto.id_marca=marca.id_marca AND producto.id_categoria=categoria.id_categoria AND marca.marca like '%$id%'";

        $rs=$this->_db->query($sql);

        return $rs->fetchall();

}

public function buscar_producto_22($l,$r,$id){


 $sql = "SELECT producto.*,marca.marca, categoria.categoria FROM producto,marca,categoria WHERE producto.id_marca=marca.id_marca AND producto.id_categoria=categoria.id_categoria AND marca.marca like '%$id%'  LIMIT $l,$r   ";

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
