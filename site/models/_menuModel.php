<?php

class _menuModel extends Model
{
    public function __construct() {
        parent::__construct();
    }

    

public function menu($id = false){

	if ($id!=false) {
		$sql = "SELECT menu.* FROM menu,permisos,role,usuario WHERE\n"
    . "menu.id_menu=permisos.id_menu and \n"
    . "role.id_role = permisos.id_role and\n"
    . "permisos.permiso=1 and \n"
    . "role.id_role=usuario.id_role and\n"
    . "usuario.id_usuario=".$id;
	$menu = $this->_db->query($sql);
	return $menu->fetchall();
		
	}else{
		$sql = "SELECT DISTINCT menu.* FROM menu,permisos,role,usuario WHERE\n"
    . "menu.id_menu=permisos.id_menu and \n"
    . "role.id_role = permisos.id_role and\n"
    . "permisos.permiso=1 and \n"
    . "role.id_role=2";
	$menu = $this->_db->query($sql);

    

	return $menu->fetchall();


	}

	
}
public function categorias_y_marcas(){

   
    $sql = "SELECT DISTINCT * FROM categoria WHERE 1=1 ";
    $cat = $this->_db->query($sql);
     

 $sql = "SELECT DISTINCT * FROM marca WHERE 1=1 ";
    $mar = $this->_db->query($sql);



$array = array(
    "categorias" =>  $cat->fetchall(),
        "marcas" =>  $mar->fetchall()
 );

 


    return $array;
    

    
}



public function categorias_y_marcas1($valor){

   
    $sql = "SELECT DISTINCT * FROM categoria WHERE 1=1 ";
    $cat = $this->_db->query($sql);
     

 $sql = "SELECT DISTINCT * FROM marca WHERE tipo='$valor' ";
    $mar = $this->_db->query($sql);



$array = array(
    "categorias" =>  $cat->fetchall(),
        "marcas" =>  $mar->fetchall()
 );

 


    return $array;
    

    
}



    public function traer_menus(){


    $sql="select * from menu";
       

        $datos = $this->_db->query($sql);
              //  $datos->setFetchMode(PDO::FETCH_ASSOC);

        return $datos->fetchall();


    }
      public function traer_roles(){


    $sql="select * from role";
       

        $datos = $this->_db->query($sql);
              //  $datos->setFetchMode(PDO::FETCH_ASSOC);

        return $datos->fetchall();


    }

 public function traer_permisos($id,$id2){


$sql = "SELECT permisos.* FROM role,permisos,menu WHERE role.id_role = permisos.id_role and permisos.id_menu=menu.id_menu and menu.id_menu ='$id' and role.id_role='$id2'";    
        $datos = $this->_db->query($sql);
              //  $datos->setFetchMode(PDO::FETCH_ASSOC);

        return $datos->fetch();


    }



}

?>
