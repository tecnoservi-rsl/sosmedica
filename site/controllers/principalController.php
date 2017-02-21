<?php


class principalController extends Controller
{
	
	private $_index;
    public function __construct() {
        parent::__construct();
  	$this->_index=$this->loadModel('principal');	
    }

    public function index()
    {

    $xx=array();
    $productos=$this->_index->buscar_productos();
    for ($i=0; $i < count($productos); $i++) 
    { 
        $xx[$i] = array 
        (
        "producto" => $productos[$i],
        "img"      => $this->_index->buscar_img_por_id($productos[$i]["id_producto"]),
        "disponibilidad" =>  $this->_index->disponibilidad($productos[$i]["id_producto"])
        );
    }
    	 $array = array();
       
			$this->_view->productos= $xx;		
			$this->_view->setJs(array('index'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = 'SOS MEDICA - Tecnologia para la vida';
			$this->_view->renderizar('index');
							
			
	}	
	
}


?>