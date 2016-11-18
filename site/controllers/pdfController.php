<?php

class pdfController extends Controller
{
    private $_pdf;
	private $_alumno;
    public function __construct() {
        parent::__construct();
        $this->getLibrary('fpdf');
		
				
        $this->_pdf = new fpdf;
    }
    
    public function index(){}
	

  

	function pdf_equipo($id=false){

		if($id==false){

		$this->redireccionar('principal');

		} 
		
		$producto=$this->loadModel('product');
		$img=$this->loadModel('principal');	
		
		$datos = array 
		(
		"producto"         => $producto->mostrar_producto($id),
		"img"              => $producto->buscar_img_por_id($id),
		"disponibilidad"   => $producto->buscar_almacenes_por_id($id)
		);



		$_pdf= new fpdf('P','mm','A4');
		$_pdf->AddPage();
		$_pdf->SetFont('Arial','B',15);
		$_pdf->ln(2);
		
		$_pdf->Cell(0,6,"www.sosmedica.com",0,1,'C');
		$_pdf->SetFont('Arial','',10);


		$_pdf->Cell(30,4,"CODIGO",0,0,'L');
		$_pdf->Cell(2,4,":",0,0,'L');
		$_pdf->Cell(2,4,"SOSMEDICA-". $datos["producto"][0]["id_producto"] ,0,1,'L');
		
		
		$_pdf->Cell(10,4,"FECHA",0,0,'L');
		$_pdf->Cell(2,4,":",0,0,'L');
		$_pdf->Cell(20,4,date('d-m-Y'),0,1,'L');
		
		$_pdf->Cell(($_pdf->w)-36,4,"mmag aki estan todos lo datos del equipo mostalos a acomodalos ",1,1,'C');
		
		$_pdf->ln(20);
		$_pdf->Cell(($_pdf->w)-36,4,"DETALLES",1,1,'C');

		$_pdf->Cell(($_pdf->w/6)-6,4,"NOMBRE",1,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"-->".$datos["producto"][0]["nombre"],1,1,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"MARCA",1,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"-->".$datos["producto"][0]["marca"],1,1,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"MODELO",1,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"-->".$datos["producto"][0]["modelo"],1,1,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"DESCRIPCION",1,0,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"-->".$datos["producto"][0]["descripcion"],1,1,'L');
		

		$_pdf->Cell(($_pdf->w)-36,4,"IMAGENES",1,1,'C');
		
		for ($i=0; $i < count($datos["img"]); $i++) { 
		$_pdf->Cell(100,4,"-->".$datos['img'][0]['nombre'],1,1,'L');
		}

		$_pdf->Cell(($_pdf->w)-36,4,"ALMACENES",1,1,'C');

		for ($i=0; $i < count($datos["disponibilidad"]); $i++) { 
		
		$_pdf->Cell(($_pdf->w/6)-6,4,"NOMBRE",1,0,'L');
		$_pdf->Cell(100,4,"-->".$datos["disponibilidad"][$i]["nombre"],1,1,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"DIRECCION",1,0,'L');
		$_pdf->Cell(100,4,"-->".$datos["disponibilidad"][$i]["direccion"],1,1,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"TLF",1,0,'L');
		$_pdf->Cell(100,4,"-->".$datos["disponibilidad"][$i]["telefono"],1,1,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"HORARIO",1,0,'L');
		$_pdf->Cell(100,4,"-->".$datos["disponibilidad"][$i]["horario"],1,1,'L');
		



		}
		
		
		$_pdf->Output();
	}
	





}

?>
