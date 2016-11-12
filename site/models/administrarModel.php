<?php

class administrarModel extends Model
      {
      public $nombre;
      public function __construct()
      {
            parent::__construct();
      }
      public function guardar_publicacion($datos,$fotos)
      {
            $sql="insert into producto values ('','".$datos['nombre']."', '".$datos['presentacion']."',NULL,'".$datos['marca']."','".$datos['categoria']."','PRODUCTO')";
            $this->_db->query($sql);
            $id_publicacion=$this->_db->lastInsertId();
            $rs_almacen=$this->almacen_all();
            for ($j=0; $j < count($rs_almacen) ; $j++)
            { 
                  $sql="insert into producto_almacen values('',$id_publicacion,".$rs_almacen[$j]['id_almacen'].",'no disponible')";
                  $this->_db->query($sql);
            }
            for ($i=0; $i < count($datos['disponibilidad']) ; $i++) { 
                  $this->update_disponibilidad($id_publicacion,$datos['disponibilidad'][$i]);
            }

            for ($i=0; $i < count($fotos['foto']['name']) ; $i++) 
            { 
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
      public function guardar_equipo($datos,$fotos)
      {
              $sql="insert into producto values ('','".$datos['nombre']."',NULL,'".$datos['modelo']."','".$datos['marca']."',NULL,'EQUIPO_MEDICO')";
            $this->_db->query($sql);
            $id_publicacion=$this->_db->lastInsertId();
            $rs_almacen=$this->almacen_all();
            for ($j=0; $j < count($rs_almacen) ; $j++)
            { 
                  $sql="insert into producto_almacen values('',$id_publicacion,".$rs_almacen[$j]['id_almacen'].",'no disponible')";
                  $this->_db->query($sql);
            }
            for ($i=0; $i < count($datos['disponibilidad']) ; $i++)
            { 
                  $this->update_disponibilidad($id_publicacion,$datos['disponibilidad'][$i]);
            }
            for ($i=0; $i < count($fotos['foto']['name']) ; $i++)
            { 
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

      public function guardar_categoria($valor)
      {
            $sql="insert into categoria values ('','".$valor."')";
            $this->_db->query($sql);
      }
      public function guardar_marca($valor)
      {
            $sql="insert into marca values ('','".$valor."','PRODUCTO')";
            $this->_db->query($sql);
      }
      public function guardar_marca_equipo($valor)
      {
            $sql="insert into marca values ('','".$valor."','EQUIPO')";
            $this->_db->query($sql);
      }

      public function guardar_almacen($datos)
      {
            $sql="insert into almacen values ('','".$datos['nombre']."','".$datos['direccion']."','".$datos['telefono']."','".$datos['horario']."')";
            $this->_db->query($sql);
            $id_almacen=$this->_db->lastInsertId();
            $sql="SELECT * FROM producto";
            $rsbd=$this->_db->query($sql);
            $array=$rsbd->fetchall();

            for ($i=0; $i < count($array); $i++) { 
                  
                  $sql="insert into producto_almacen values ('',".$array[$i]['id_producto'].",$id_almacen,'no disponible') ";
                  $this->_db->query($sql);

            }


      }

      public function buscar_producto($strin)
      {
            $sql = "SELECT producto.*,categoria.categoria,marca.marca FROM producto,marca,categoria WHERE \n"
            . "producto.id_categoria=categoria.id_categoria AND\n"
            . "producto.id_marca=marca.id_marca AND\n"
            . "producto.nombre like '%".$strin."%' AND producto.tipo='PRODUCTO'";

            $rs=$this->_db->query($sql);
            return $rs->fetchall();
      }
      public function eliminar_producto($id)
      {


             echo $sql="SELECT nombre FROM img_producto where id_publicacion=$id";

            $rs=$this->_db->query($sql);

            $RSR=$rs->fetchall();

            for ($i=0; $i < count($RSR) ; $i++) { 
                unlink('public'.DS.'img' . DS . 'publicaciones' . DS . $RSR[$i]['nombre']);
            }


            $sql = "delete FROM producto where id_producto=$id";    
            $this->_db->query($sql);
      }
      public function buscar_equipo($strin)
      {
            $sql = "SELECT producto.*,marca.marca FROM producto,marca WHERE \n"
            . "producto.id_marca=marca.id_marca AND\n"
            . "producto.nombre like '%".$strin."%' AND producto.tipo='EQUIPO_MEDICO'  ";
            $rs=$this->_db->query($sql);
            return $rs->fetchall();
      }

      public function eliminar_categoria($id)
      {
            $sql = "delete FROM categoria where id_categoria=$id";
            $this->_db->query($sql);
      }

      public function eliminar_marca($id)
      {
            $sql = "delete FROM marca where id_marca=$id";
            $this->_db->query($sql);
      }
      public function buscar_producto_id($id)
      {
            $sql = "SELECT * FROM producto WHERE id_producto = $id ";
            $rs=$this->_db->query($sql);
            return $rs->fetch();
      }
      public function buscar_almacen_id($id)
      {
            $sql = "SELECT * FROM almacen WHERE id_almacen = $id ";
            $rs=$this->_db->query($sql);
            return $rs->fetch();
      }
      public function buscar_fotos_id($id)
      {
            $sql = "SELECT * FROM img_producto WHERE id_publicacion = $id ";
            $rs=$this->_db->query($sql);
            return $rs->fetchall();
      }
      public function eliminar_foto($id)
      {

            echo $sql="SELECT nombre FROM img_producto where id_img_producto=$id";

            $rs=$this->_db->query($sql);

            $RSR=$rs->fetch();

           

            unlink('public'.DS.'img' . DS . 'publicaciones' . DS . $RSR['nombre']);


            $sql = "DELETE FROM `img_producto` WHERE `img_producto`.`id_img_producto` = $id";     
           $this->_db->query($sql);
        
      }
      public function editar_publicacion($datos,$fotos)
      {
            $sql="UPDATE `producto` SET `nombre` = '".$datos['nombre']."', `presentacion` = '".$datos['presentacion']."', `id_marca` = '".$datos['marca']."', `id_categoria` = '".$datos['categoria']."' WHERE `producto`.`id_producto` = ".$datos['id_producto']." ";
            $this->_db->query($sql);
            $rs_almacen=$this->almacen_all();
            for ($j=0; $j < count($rs_almacen) ; $j++)
            { 
                  $this->update_disponibilidad2($datos['id_producto'],$rs_almacen[$j]['id_almacen']);
            }
            for ($i=0; $i < count($datos['disponibilidad']) ; $i++)
            { 
                  $this->update_disponibilidad($datos['id_producto'],$datos['disponibilidad'][$i]);
            }
            if ($fotos['foto']['name'][0]!="")
            {  
                  for ($i=0; $i < count($fotos['foto']['name']) ; $i++) 
                  { 
                        
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
      public function editar_equipo($datos,$fotos)
      {
            $sql="UPDATE `producto` SET `nombre` = '".$datos['nombre']."', `id_marca` = '".$datos['marca']."', `modelo` = '".$datos['modelo']."' WHERE `producto`.`id_producto` = ".$datos['id_producto']." ";
            $this->_db->query($sql);
            $rs_almacen=$this->almacen_all();
            for ($j=0; $j < count($rs_almacen) ; $j++)
            { 
                  $this->update_disponibilidad2($datos['id_producto'],$rs_almacen[$j]['id_almacen']);
            }
            for ($i=0; $i < count($datos['disponibilidad']) ; $i++)
            { 
                  $this->update_disponibilidad($datos['id_producto'],$datos['disponibilidad'][$i]);
            }
            if ($fotos['foto']['name'][0]!="")
            {  
                  for ($i=0; $i < count($fotos['foto']['name']) ; $i++) 
                  { 
                
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
      public function editar_almacen($datos)
      {
             $sql="UPDATE `almacen` SET `nombre` = '".$datos['nombre']."', `direccion` = '".$datos['direccion']."', `telefono` = '".$datos['telefono']."', `horario` = '".$datos['horario']."' WHERE `almacen`.`id_almacen` = ".$datos['id_almacen']." ";
            $this->_db->query($sql);
      }
      public function buscar_almacenes()
      {
            $sql = "SELECT * FROM almacen";    
            $rs=$this->_db->query($sql);
            return $rs->fetchall();
      }
      public function eliminar_almacen($id)
      {
            $sql = "DELETE FROM almacen WHERE id_almacen= $id";    
            $this->_db->query($sql);
      }

      public function almacen_all()
      {
            $sql = "SELECT * FROM almacen WHERE 1=1";    
            $rs=$this->_db->query($sql);
            return $rs->fetchall();
      }
       public function almacen_for_produc($id)
      {
            $sql = "SELECT almacen.*,producto_almacen.estatus FROM almacen,producto_almacen,producto WHERE almacen.id_almacen=producto_almacen.id_almacen AND producto.id_producto=producto_almacen.id_producto AND producto.id_producto=$id";    
            $rs=$this->_db->query($sql);
            return $rs->fetchall();
      }

      public function update_disponibilidad($id_p,$id_al)
      {
             $sql = "update producto_almacen set estatus='disponible' where id_producto=$id_p and id_almacen=$id_al";    
            $this->_db->query($sql);

      }
      public function update_disponibilidad2($id_p,$id_al)
      {
        $sql = "update producto_almacen set estatus='no disponible' where id_producto=$id_p and id_almacen=$id_al";    
            $this->_db->query($sql);
      }





}
?>