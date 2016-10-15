<?php


class ventaController extends Controller
{
	
	private $_persona;
	private $_producto;
    public function __construct() {
        parent::__construct();
  	$this->_persona=$this->includeModel('persona');	
  	$this->_producto=$this->includeModel('producto');	
    }

    public function index()
    {

    	$accion=$_GET['accion'];
    	if( $accion=='venta'){

    		$this->_venta();
    	}else{
    	$this->_consulta();
    	}
		
			
							
			
	}
 public function _venta()
    {

    	 $array = array();
       
		
			$this->_view->setJs(array('js'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = 'Ventas';
			$this->_view->renderizar('index');
							
			
	}
	 public function _consulta()
    {

    	 $array = array();
       
		
			$this->_view->setJs(array('index'));
			$this->_view->setCss(array('css'));
        	$this->_view->titulo = 'Consulta';
			$this->_view->renderizar('consulta');
							
			
	}
	 public function guardar_venta()
    {


	if ($_GET['vn']==0) {
	    		
		$persona=new persona;
   		$persona->guardar($_GET);
		$producto=new producto;
		$_GET['id_persona']=$persona->id_persona;
		$producto->guardar($_GET);
	    	} else{
	    $producto=new producto;
    	$_GET['id_persona']=$_GET['vn'];	
		$producto->guardar($_GET);

	    	}   	



			
			
	}

public function buscar()
    {

    	$persona=new persona;
   		$persona->buscar($_GET);




		$producto=new producto;

		$producto->buscar($persona->id_persona);




		$array = array( 'persona' => $persona, 'producto'=>$producto );


		if (!isset($persona->id_persona)) {
			$array=false;
			echo json_encode($array);
		}else{
		
		echo json_encode($array);
		}
		
			
			
	}
	
}