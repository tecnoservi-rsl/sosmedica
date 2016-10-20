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

    	 $array = array();
       
		
			$this->_view->setJs(array('index'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = 'SOS MEDICA';
			$this->_view->renderizar('index');
							
			
	}

public function search_product($valor)
{
    $this->_view->titulo = 'SOS MEDICA';
    $xx=array();
    $productos=$this->_index->buscar_producto($valor);
    for ($i=0; $i < count($productos); $i++) 
    { 
        $xx[$i] = array 
        (
        "producto" => $productos[$i],
        "img"      => $this->_index->buscar_img_por_id($productos[$i]["id_producto"])
        );
    }
    $this->_view->productos= $xx;
    $this->_view->setJs(array('index'));
    $this->_view->setCss(array('css'));
    $this->_view->renderizar('index');
}
	
public function searchproduct($valor)
    {
    	$this->_view->titulo = 'SOS MEDICA';
            
    	$xx=array();

        $productos=$this->_index->buscar_product($valor);



        for ($i=0; $i < count($productos); $i++) { 
        
        
				$xx[$i] = array (

				"producto" => $productos[$i],
				"img"      => $this->_index->buscar_img_por_id($productos[$i]["id_producto"])

				);


        }
        $this->_view->productos= $xx;
        $this->_view->setJs(array('index'));
		$this->_view->setCss(array('css'));
		$this->_view->renderizar('index');
    
    }




}?>