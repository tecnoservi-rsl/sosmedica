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






}
?>