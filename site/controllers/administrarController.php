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
        	$modelo = $this->loadModel('_menu');
        	$this->_view->cama1 = $modelo->categorias_y_marcas1('PRODUCTO');
			$this->_view->renderizar('agregar');
							
			
	}



	 public function agregarequipo()
    {
		
			$this->_view->setJs(array('agregarequipo',"validacion"));
			$this->_view->setCss(array('agregar'));
        	$this->_view->titulo = 'Agregar Equipo';
        	$modelo = $this->loadModel('_menu');
        	$this->_view->cama1 = $modelo->categorias_y_marcas1('EQUIPO');
			$this->_view->renderizar('agregarequipo');
							
			
	}

	    public function guardar_publicacion(){

    	$this->_pb->guardar_publicacion($_POST,$_FILES);
    
    	$this->redireccionar('administrar/agregar');
    }


    public function guardar_equipo(){

    	$this->_pb->guardar_equipo($_POST,$_FILES);
    
    	$this->redireccionar('administrar/agregarmarca');
    }


    

    public function guardar_categoria(){

    	$this->_pb->guardar_categoria($_POST['valor']);


    	$modelo = $this->loadModel('_menu');



        echo json_encode($modelo->categorias_y_marcas1('PRODUCTO'));  



    	

    
    }

    public function guardar_marca(){

    	$this->_pb->guardar_marca($_POST['valor']);


    	$modelo = $this->loadModel('_menu');



        echo json_encode($modelo->categorias_y_marcas1('PRODUCTO'));  

    
    }



    public function guardar_marca_equipo(){

    	$this->_pb->guardar_marca_equipo($_POST['valor']);


    	$modelo = $this->loadModel('_menu');



        echo json_encode($modelo->categorias_y_marcas1('EQUIPO'));  

    
    }
      public function add_almacen(){

            $this->_view->setJs(array('add_almacen',"validacion"));
            $this->_view->setCss(array('agregar'));
            $this->_view->titulo = 'Agregar Almacen';
           
            $this->_view->renderizar('add_almacen');

    
    }


        public function guardar_almacen(){

        $this->_pb->guardar_almacen($_POST);

        $this->redireccionar('administrar/add_almacen');
    
        }


     public function ges_producto(){

            $this->_view->setJs(array('ges_producto'));
            $this->_view->setCss(array('agregar'));
            $this->_view->titulo = 'Gestionar Producto';
            $this->_view->renderizar('ges_producto');

    
    }


       public function buscar_producto(){

            

        echo json_encode($this->_pb->buscar_producto($_POST['valor']));

    
    }


    public function elimiar_producto (){

            

       $this->_pb->elimiar_producto($_POST['valor']);

    
    }



     public function ges_equipo(){

            $this->_view->setJs(array('ges_equipo'));
            $this->_view->setCss(array('agregar'));
            $this->_view->titulo = 'Gestionar Equipo';
            $this->_view->renderizar('ges_equipo');

    
    }

    public function buscar_equipo(){

            

        echo json_encode($this->_pb->buscar_equipo($_POST['valor']));

    
    }


    public function eliminar_equipo(){

            

       $this->_pb->eliminar_producto($_POST['valor']);

    
    }


     public function add_mc(){

            $this->_view->setJs(array('add_mc'));
            $this->_view->setCss(array('agregar'));
            $this->_view->titulo = 'Administrar';
            $modelo = $this->loadModel('_menu');
            $this->_view->cama1 = $modelo->categorias_y_marcas1('PRODUCTO');
            $this->_view->cama2 = $modelo->categorias_y_marcas1('EQUIPO');
            $this->_view->renderizar('add_mc');

    
    }



public function eliminar_categoria(){

            

       $this->_pb->eliminar_categoria($_POST['valor']);


        $modelo = $this->loadModel('_menu');



        echo json_encode($modelo->categorias_y_marcas1('PRODUCTO'));  

    
    }

public function eliminar_marca(){

            

       $this->_pb->eliminar_marca($_POST['valor']);

    $modelo = $this->loadModel('_menu');



        echo json_encode($modelo->categorias_y_marcas1('PRODUCTO'));  
    }


    public function eliminar_marca_equipo(){

            

       $this->_pb->eliminar_marca($_POST['valor']);

    $modelo = $this->loadModel('_menu');



        echo json_encode($modelo->categorias_y_marcas1('EQUIPO'));  
    }




	
}

?>