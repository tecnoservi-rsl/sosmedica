<?php


class administrarController extends Controller
{
	
	public $_pb;
	
    public function __construct() {
        parent::__construct();
        $this->getLibrary('simpleimage');
        $this->_pb = $this->loadModel('administrar');
    }

    public function index()
    {
			$this->_view->setJs(array('index','js'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = 'adminitrar';
			$this->_view->renderizar('index');
							
			
	}

	 public function agregar()
    {
		
			$this->_view->setJs(array('agregar',"validacion"));
			$this->_view->setCss(array('agregar'));
        	$this->_view->titulo = 'Agregar Producto';
			$this->_view->renderizar('agregar');
							
			
	}

	    public function guardar_publicacion(){

    	$this->_pb->guardar_publicacion($_POST,$_FILES);
    
    	$this->redireccionar('administrar/agregar');
    }


    public function guardar_categoria(){

    	$this->_pb->guardar_categoria($_POST['valor']);


    	$modelo = $this->loadModel('_menu');



        echo json_encode($modelo->categorias_y_marcas());  



    	

    
    }

    public function guardar_marca(){

    	$this->_pb->guardar_marca($_POST['valor']);


    	$modelo = $this->loadModel('_menu');



        echo json_encode($modelo->categorias_y_marcas());  



    	

    
    }


	
}

?>