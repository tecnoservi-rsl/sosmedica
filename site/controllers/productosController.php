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

	
}


?>