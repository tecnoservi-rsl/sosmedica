<?php


class empresaController extends Controller
{
	
	private $_index;
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {

    			
			$this->_view->setJs(array('index'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = ' Nosotros || SOS MEDICA - Tecnologia para la vida';
			$this->_view->renderizar('index');
							
			
	}	
	
}


?>