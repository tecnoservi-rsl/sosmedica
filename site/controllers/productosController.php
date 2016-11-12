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

    public function search_product($tipo,$valor)
    {
        $this->_view->titulo = 'SOS MEDICA';
        $this->_view->setJs(array('index'));
        $this->_view->setCss(array('css'));
        $modelo=$this->loadModel('principal');

        if ($tipo=="like") {


            $xx=array();
            $productos=$this->_index->buscar_producto_like($valor);
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