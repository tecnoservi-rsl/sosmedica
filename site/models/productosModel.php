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


     echo $sql = "SELECT producto.nombre, producto.presentacion, producto.modelo,producto.id_producto, categoria.id_categoria, producto.descripcion, producto.tipo, marca.marca,categoria.categoria FROM `producto` LEFT JOIN marca on marca.id_marca= producto.id_marca LEFT JOIN categoria on categoria.id_categoria= producto.id_categoria WHERE (marca.marca like '%$id%') or (categoria.categoria like '%$id%') or (producto.nombre like '%$id%')";

     



     $rs=$this->_db->query($sql);

     return $rs->fetchall();

}
public function buscar_producto_like2($l,$r,$id){

        $id = strtoupper ($id);
$sql = "SELECT producto.nombre, producto.presentacion, producto.modelo,producto.id_producto, categoria.id_categoria, producto.descripcion, producto.tipo, marca.marca,categoria.categoria FROM `producto` LEFT JOIN marca on marca.id_marca= producto.id_marca LEFT JOIN categoria on categoria.id_categoria= producto.id_categoria WHERE (marca.marca like '%$id%') or (categoria.categoria like '%$id%') or (producto.nombre like '%$id%' )LIMIT $l,$r";
       
        $rs=$this->_db->query($sql);

         

        return $rs->fetchall();

}


public function buscar_producto_2($id){

    
      $sql = "SELECT producto.nombre, producto.presentacion, producto.modelo,producto.id_producto, categoria.id_categoria, producto.descripcion, producto.tipo, marca.marca,categoria.categoria FROM `producto` LEFT JOIN marca on marca.id_marca= producto.id_marca LEFT JOIN categoria on categoria.id_categoria= producto.id_categoria WHERE marca.marca like '%$id%'";




        $rs=$this->_db->query($sql);

        return $rs->fetchall();

}

public function buscar_producto_22($l,$r,$id){


         $sql = "SELECT producto.nombre, producto.presentacion, producto.modelo, categoria.id_categoria, producto.id_producto, producto.descripcion, producto.tipo, marca.marca,categoria.categoria FROM `producto` LEFT JOIN marca on marca.id_marca= producto.id_marca LEFT JOIN categoria on categoria.id_categoria= producto.id_categoria WHERE marca.marca like '%$id%' LIMIT $l,$r   ";

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
