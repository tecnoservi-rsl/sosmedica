<?php


class contactoController extends Controller
{
	
	private $_index;
    public function __construct() {
        parent::__construct();
		$this->_index=$this->loadModel('contacto');
    }

    public function index()
    {
			$this->_view->mostrar=$this->_index->buscar_almacenes();
			$this->_view->setJs(array('index'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = 'Contactenos || SOS MEDICA - Tu tienda medica online';
			$this->_view->renderizar('index');
							
			
	}	
	
}


?>