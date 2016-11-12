<?php

class contactoModel extends Model
{
    public function __construct() {
        parent::__construct();
    }





public function buscar_almacenes(){

 $sql = "SELECT * FROM almacen";
     
     $rs=$this->_db->query($sql);

     return $rs->fetchall();

}  

}

?>
