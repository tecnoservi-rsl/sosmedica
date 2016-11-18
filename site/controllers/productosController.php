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

    public function search_product($pag_act=false,$tipo=false,$valor=false)
    {
        if($tipo==false || $valor==false || $pag_act==false){

            $this->redireccionar('principal');

        } 
        
        $this->_view->titulo = 'SOS MEDICA';
        $this->_view->setJs(array('index'));
        $this->_view->setCss(array('css'));
        $modelo=$this->loadModel('principal');
        $num_resul=10;
        if ($tipo=="like") {

            $this->_view->bnn = $valor;


            $xx=array();
            $productos=$this->_index->buscar_producto_like($valor);

            

            $this->_view->num_paginas=$numero_de_paginas=$this->num_paginas($this->contar($productos),$num_resul);
            $this->_view->tipo=$tipo;
            $this->_view->valor=$valor;
 $this->_view->pag_actual=$pag_act;
            if($pag_act==1){
                $productos=$this->_index->buscar_producto_like2(0,$num_resul,$valor);
            }
            else{

                 $productos=$this->_index->buscar_producto_like2(($pag_act*$num_resul)-$num_resul,$num_resul,$valor);
            }


            

            


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

         $this->_view->bnn = $productos[0]['categoria'];
        
         $this->_view->num_paginas=$numero_de_paginas=$this->num_paginas($this->contar($productos),$num_resul);
            $this->_view->tipo=$tipo;
            $this->_view->valor=$valor;
 $this->_view->pag_actual=$pag_act;
            if($pag_act==1){
                $productos=$this->_index->buscar_producto2(0,$num_resul,$valor);
            }
            else{

                 $productos=$this->_index->buscar_producto2(($pag_act*$num_resul)-$num_resul,$num_resul,$valor);
            }

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
        $this->_view->bnn = $productos[0]['marca'];
         $this->_view->num_paginas=$numero_de_paginas=$this->num_paginas($this->contar($productos),$num_resul);
            $this->_view->tipo=$tipo;
            $this->_view->valor=$valor;
 $this->_view->pag_actual=$pag_act;
            if($pag_act==1){
                $productos=$this->_index->buscar_producto_22(0,$num_resul,$valor);
            }
            else{

                 $productos=$this->_index->buscar_producto_22(($pag_act*$num_resul)-$num_resul,$num_resul,$valor);
            }

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