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

		$xx=63;
		$yy=47;

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
		
		$_pdf->Cell(0,6,"WWW.SOSMEDICA.COM",0,1,'C');
		$_pdf->SetFont('Arial','',10);


		$_pdf->Cell(30,4,"CODIGO: 1000". $datos["producto"][0]["id_producto"],0,1,'L');
		
		
		$_pdf->Cell(10,4,"FECHA: ". date('d-m-Y'),0,1,'L');
		$_pdf->SetFont('Arial','B',10);
		$_pdf->Cell(($_pdf->w)-36,4,'BROCHURE - '.$datos["producto"][0]["nombre"],0,1,'C');
		
		$_pdf->ln(3);
		$_pdf->Cell(($_pdf->w)-36,4,"DETALLES DEL EQUIPO",0,1,'C');
		$_pdf->SetXY(17, $yy-6);
		$_pdf->Cell(($_pdf->w)/6,4,"IMAGEN DEL EQUIPO",0,1,'L');
		$_pdf->SetFont('Arial','',10);
		$_pdf->SetXY($xx, $yy);
		$_pdf->Cell(($_pdf->w/6)-6,4,"NOMBRE: ".$datos["producto"][0]["nombre"],0,0,'L');
		$_pdf->SetXY($xx, $yy+5);
		$_pdf->Cell(($_pdf->w/6)-6,4,"MARCA: ".$datos["producto"][0]["marca"],0,0,'L');
		$_pdf->SetXY($xx, $yy+10);
		$_pdf->Cell(($_pdf->w/6)-6,4,"MODELO: ".$datos["producto"][0]["modelo"],0,0,'L');
		$_pdf->SetXY($xx, $yy+15);
		$_pdf->MultiCell(150,4,"DESCRIPCION: ".$datos["producto"][0]["descripcion"],0,'L');
		
		

	
		
		
		$_pdf->Image(BASE_URL.'public/img/publicaciones/'.$datos['img'][0]['nombre'],10,45,50,50,'PNG');
		/*
$_pdf->ln(30);
		$_pdf->Cell(($_pdf->w)-36,4,"ALMACENES",1,1,'C');

		for ($i=0; $i < count($datos["disponibilidad"]); $i++) { 
		
		$_pdf->Cell(($_pdf->w/6)-6,4,"NOMBRE: ",0,0,'L');
		$_pdf->Cell(100,4,"-->".$datos["disponibilidad"][$i]["nombre"],1,1,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"DIRECCION: ",0,0,'L');
		$_pdf->Cell(100,4,"-->".$datos["disponibilidad"][$i]["direccion"],1,1,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"TLF",1,0,'L');
		$_pdf->Cell(100,4,"-->".$datos["disponibilidad"][$i]["telefono"],1,1,'L');
		$_pdf->Cell(($_pdf->w/6)-6,4,"HORARIO",1,0,'L');
		$_pdf->Cell(100,4,"-->".$datos["disponibilidad"][$i]["horario"],1,1,'L');
		



		}*/
		
		
		$_pdf->Output();
	}
	





}

?>
