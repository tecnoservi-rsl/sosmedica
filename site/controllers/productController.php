<?php

 
class productController extends Controller
{
	
	private $_index;
    private $_principal;
    public function __construct() {
        parent::__construct();
  	$this->_index=$this->loadModel('product');
    $this->_principal=$this->loadModel('principal');	
    }

    public function index()
    {


			$this->redireccionar('principal');
							
			
	}

public function view_product($valor=false)
{





    if($valor==false){

            $this->redireccionar('principal');

        } 

    
    $this->_view->setJs(array('index','rrssb.min'));
    $this->_view->setCss(array('css','rrssb')); 
     $modelo=$this->loadModel('principal');

    $view=array();
    $mostrar=$this->_index->mostrar_producto($valor);
    $view = array 
        (
        "producto" => $mostrar,
        "img"      => $this->_index->buscar_img_por_id($valor),
        "disponibilidad" => $this->_index->buscar_almacenes_por_id($valor)
        );
    $this->_view->mostrar= $view;

    $xx=array();
    $array = array();
    $tipo=$this->_index->buscar_tipo_producto($valor);

    if($tipo['tipo'] == 'PRODUCTO'){

        $productos=$this->_index->productos_similares($mostrar[0]['id_categoria']);
        for ($i=0; $i < count($productos); $i++) 
        {  
                $xx[$i] = array 
                (
                "producto" => $productos[$i],
                "img"      => $this->_principal->buscar_img_por_id($productos[$i]["id_producto"]),
                "disponibilidad" =>  $modelo->disponibilidad($productos[$i]["id_producto"])
                );
        }
        $this->_view->productos= $xx; 
    	}else{

			 	$productos=$this->_index->equipos_similares($mostrar[0]['id_marca']);
		    for ($i=0; $i < count($productos); $i++) 
		    {  
		        $xx[$i] = array 
		        (
		        "producto" => $productos[$i],
		        "img"      => $this->_principal->buscar_img_por_id($productos[$i]["id_producto"]),
                "disponibilidad" =>  $modelo->disponibilidad($productos[$i]["id_producto"])
		        );
		    }
		            $this->_view->productos= $xx; 


	 }

/*     */

    $this->_view->titulo = $mostrar[0]['nombre'].' || SOS MEDICA - Tecnologia para la vida';
    $this->_view->renderizar('index');
}
	
}?>