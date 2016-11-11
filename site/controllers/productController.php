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

    $xx=array();
    $productos=$this->_principal->buscar_productos();
    for ($i=0; $i < count($productos); $i++) 
    { 
        $xx[$i] = array 
        (
        "producto" => $productos[$i],
        "img"      => $this->_principal->buscar_img_por_id($productos[$i]["id_producto"])
        );
    }

    	 $array = array();
       
		    $this->_view->productos= $xx; 
			$this->_view->setJs(array('index','rrssb.min'));
			$this->_view->setCss(array('css','rrssb'));
        	$this->_view->titulo = 'SOS MEDICA';
			$this->_view->renderizar('index');
							
			
	}

public function view_product($valor)
{
    $this->_view->titulo = 'SOS MEDICA';

     $xx=array();
    $productos=$this->_principal->buscar_productos();
    for ($i=0; $i < count($productos); $i++) 
    { 
        $xx[$i] = array 
        (
        "producto" => $productos[$i],
        "img"      => $this->_principal->buscar_img_por_id($productos[$i]["id_producto"])
        );
    }

         $array = array();
       
            $this->_view->productos= $xx; 



    $view=array();
    $mostrar=$this->_index->mostrar_producto($valor);
     
    $view = array 
        (
        "producto" => $mostrar,
        "img"      => $this->_index->buscar_img_por_id($valor)
        );
    
    $this->_view->mostrar= $view;

    $this->_view->setJs(array('index','rrssb.min'));
    $this->_view->setCss(array('css','rrssb'));        
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