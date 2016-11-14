<?php


class productosController extends Controller
{
	
	private $_index;
    public function __construct() {
        parent::__construct();
  	$this->_index=$this->loadModel('productos');	
    }

    public function index()
    {

    	 $this->redireccionar('principal');
							
			
	}

    public function search_product($tipo=false,$valor=false)
    {
        if($tipo==false || $valor==false){

            $this->redireccionar('principal');

        } 
        
        $this->_view->titulo = 'SOS MEDICA';
        $this->_view->setJs(array('index'));
        $this->_view->setCss(array('css'));
        $modelo=$this->loadModel('principal');

        if ($tipo=="like") {


            $xx=array();
            $productos=$this->_index->buscar_producto_like($valor);

           
            $numero_de_paginas=$this->num_paginas($this->contar($productos),3);

            

            


            for ($i=0; $i < count($productos); $i++) 
            { 
                $xx[$i] = array 
                (
                "producto" => $productos[$i],
                "img"      => $this->_index->buscar_img_por_id($productos[$i]["id_producto"]),
                "disponibilidad" =>  $modelo->disponibilidad($productos[$i]["id_producto"])
                );
            }
            $this->_view->productos= $xx;
            $this->_view->renderizar('index');

        }
        else if ($tipo=="categoria") {
        $xx=array();
        $productos=$this->_index->buscar_producto($valor);
        for ($i=0; $i < count($productos); $i++) 
        { 
            $xx[$i] = array 
            (
            "producto" => $productos[$i],
            "img"      => $this->_index->buscar_img_por_id($productos[$i]["id_producto"]),
            "disponibilidad" =>  $modelo->disponibilidad($productos[$i]["id_producto"])
            );
        }
        $this->_view->productos= $xx;
        $this->_view->renderizar('index');  
        }
        else{
        $xx=array();
        $productos=$this->_index->buscar_producto_2($valor);
        for ($i=0; $i < count($productos); $i++) 
        { 
            $xx[$i] = array 
            (
            "producto" => $productos[$i],
            "img"      => $this->_index->buscar_img_por_id($productos[$i]["id_producto"]),
            "disponibilidad" =>  $modelo->disponibilidad($productos[$i]["id_producto"])
            );
        }
        $this->_view->productos= $xx;
        $this->_view->renderizar('index');
        }







       
    }
	





}?>