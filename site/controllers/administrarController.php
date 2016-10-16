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
		
			$this->_view->setJs(array('agregar'));
			$this->_view->setCss(array('agregar'));
        	$this->_view->titulo = 'Agregar Producto';
			$this->_view->renderizar('agregar');
							
			
	}

	    public function guardar_publicacion(){

    	$this->_pb->guardar_publicacion($_POST,$_FILES);
    
    	$this->redireccionar('administrar/agregar');
    }
	
}

?>