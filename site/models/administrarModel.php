<?php

class administrarModel extends Model
{

	public $nombre;

    public function __construct() {
        parent::__construct();
    }


public function guardar_publicacion($datos,$fotos){

$sql="insert into producto values ('','".$datos['nombre']."', '".$datos['presentacion']."', '".$datos['marca']."','".$datos['categoria']."')";
      $this->_db->query($sql);

    $id_publicacion=$this->_db->lastInsertId();


   
 for ($i=0; $i < count($fotos['foto']['name']) ; $i++) { 
    	
    	$target_path = "public/img/publicaciones/";
        $nombre=uniqid('sosmedica').$fotos['foto']['name'][$i];
		$target_path = $target_path .$nombre;

 $sql="insert into img_producto values ('','".$id_publicacion."','".$nombre."')";
      $this->_db->query($sql);


		move_uploaded_file($fotos['foto']['tmp_name'][$i], $target_path); 

        $obj_img = new SimpleImage();
        $obj_img->load($target_path);
        $obj_img->resize(300,300);
        $obj_img->save($target_path);
    	
        }
}




public function guardar_equipo($datos,$fotos){

$sql="insert into equipo values ('','".$datos['nombre']."', '".$datos['modelo']."', '".$datos['marca']."')";
      $this->_db->query($sql);

    $id_publicacion=$this->_db->lastInsertId();


   
 for ($i=0; $i < count($fotos['foto']['name']) ; $i++) { 
        
        $target_path = "public/img/publicaciones/";
        $nombre=uniqid('sosmedica').$fotos['foto']['name'][$i];
        $target_path = $target_path .$nombre;

 $sql="insert into img_equipo values ('','".$id_publicacion."','".$nombre."')";
      $this->_db->query($sql);


        move_uploaded_file($fotos['foto']['tmp_name'][$i], $target_path); 

        $obj_img = new SimpleImage();
        $obj_img->load($target_path);
        $obj_img->resize(300,300);
        $obj_img->save($target_path);
        
        }
}

public function guardar_categoria($valor){

$sql="insert into categoria values ('','".$valor."')";
      $this->_db->query($sql);


}


public function guardar_marca($valor){

$sql="insert into marca values ('','".$valor."','PRODUCTO')";
      $this->_db->query($sql);


}


public function guardar_marca_equipo($valor){

$sql="insert into marca values ('','".$valor."','EQUIPO')";
      $this->_db->query($sql);


}

public function guardar_almacen($datos){

 $sql="insert into almacen values ('','".$datos['nombre']."','".$datos['direccion']."','".$datos['telefono']."','".$datos['horario']."')";
      $this->_db->query($sql);


}

public function buscar_producto($strin){

  $sql = "SELECT producto.*,categoria.categoria,marca.marca FROM producto,marca,categoria WHERE \n"
    . "producto.id_categoria=categoria.id_categoria AND\n"
    . "producto.id_marca=marca.id_marca AND\n"
    . "producto.nombre like '%".$strin."%'";
     
     $rs=$this->_db->query($sql);

     return $rs->fetchall();

}

public function elimiar_producto($id){

  $sql = "delete FROM producto where id_producto=$id";
     
    $this->_db->query($sql);

   
}



public function buscar_equipo($strin){

  $sql = "SELECT equipo.*,marca.marca FROM equipo,marca WHERE \n"
    . "equipo.id_marca=marca.id_marca AND\n"
    . "equipo.nombre like '%".$strin."%'";
     
     $rs=$this->_db->query($sql);

     return $rs->fetchall();

}

public function eliminar_equipo($id){

  $sql = "delete FROM equipo where id_equipo=$id";
     
    $this->_db->query($sql);

   
}



public function buscar_producto_id($id){

  $sql = "SELECT * FROM producto WHERE id_producto = $id ";
     
     $rs=$this->_db->query($sql);

     return $rs->fetch();

}


public function buscar_fotos_id($id){

   $sql = "SELECT * FROM img_producto WHERE id_publicacion = $id ";
     
     $rs=$this->_db->query($sql);

     return $rs->fetchall();

}


public function eliminar_foto($id){

   $sql = "DELETE FROM `img_producto` WHERE `img_producto`.`id_img_producto` = $id";
     
     $rs=$this->_db->query($sql);

     return $rs->fetchall();

}


public function editar_publicacion($datos,$fotos){



$sql="UPDATE `producto` SET `nombre` = '".$datos['nombre']."', `presentacion` = '".$datos['presentacion']."', `id_marca` = '".$datos['marca']."', `id_categoria` = '".$datos['categoria']."' WHERE `producto`.`id_producto` = ".$datos['id_producto']." ";
    $this->_db->query($sql);

   


   
 for ($i=0; $i < count($fotos['foto']['name']) ; $i++) { 
      
      $target_path = "public/img/publicaciones/";
        $nombre='nueva'.uniqid('sosmedica').$fotos['foto']['name'][$i];
    $target_path = $target_path .$nombre;

 $sql="insert into img_producto values ('','".$datos['id_producto']."','".$nombre."')";
      $this->_db->query($sql);


    move_uploaded_file($fotos['foto']['tmp_name'][$i], $target_path); 

        $obj_img = new SimpleImage();
        $obj_img->load($target_path);
        $obj_img->resize(300,300);
        $obj_img->save($target_path);
      
        }
}



}
?>