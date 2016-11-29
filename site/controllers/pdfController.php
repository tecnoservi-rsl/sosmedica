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
		$yy=67;

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


		$_pdf=new fpdf('P','mm','Letter');
		//$_pdf= new fpdf('P','mm','A4');
		$_pdf->AddPage();
		$_pdf->Image(BASE_URL.'public/img/banner_pdf.png',-10,5,220);
		//$_pdf->Image('logo.png',30,10,160);	
		$_pdf->SetFont('Times','B',15);
		$_pdf->ln(10);
		
		$_pdf->Cell(0,6,"WWW.SOSMEDICA.COM",0,1,'C');
		$_pdf->SetFont('Times','',10);


		$_pdf->Cell(30,4,"CODIGO: 1000". $datos["producto"][0]["id_producto"],0,1,'L');
		$_pdf->Cell(10,4,"FECHA: ". date('d-m-Y'),0,1,'L');
		$_pdf->SetFont('Times','B',10);
		$_pdf->ln(20);
		$_pdf->Cell(($_pdf->w)-15,4,'BROCHURE - '.$datos["producto"][0]["nombre"],0,1,'C');
		
		$_pdf->ln(3);
		$_pdf->Cell(($_pdf->w)-15,4,"DETALLES DEL EQUIPO",0,1,'C');
		$_pdf->SetXY(17, $yy+5);
		$_pdf->Cell(($_pdf->w)/6,4,"IMAGEN DEL EQUIPO",0,1,'L');
		$_pdf->SetFont('Times','',10);
		$_pdf->SetXY($xx, $yy+10);
		$_pdf->SetFont('Times','B');
		$_pdf->Cell(($_pdf->w/6)-6,10,"NOMBRE:",0,0,'L');
		$_pdf->SetFont('Times','');
		$_pdf->SetXY($xx+18, $yy+10);
		$_pdf->Cell(($_pdf->w/6)-6,10,"".$datos["producto"][0]["nombre"],0,0,'L');
		$_pdf->SetXY($xx, $yy+15);
		$_pdf->SetFont('Times','B');
		$_pdf->Cell(($_pdf->w/6)-6,10,"MARCA:",0,0,'L');
		$_pdf->SetFont('Times','');
		$_pdf->SetXY($xx+15, $yy+15);
		$_pdf->Cell(($_pdf->w/6)-6,10,"".$datos["producto"][0]["marca"],0,0,'L');
		$_pdf->SetXY($xx, $yy+20);
		$_pdf->SetFont('Times','B');
		$_pdf->Cell(($_pdf->w/6)-6,10,"MODELO:",0,0,'L');
		$_pdf->SetFont('Times','');
		$_pdf->SetXY($xx+18, $yy+20);
		$_pdf->Cell(($_pdf->w/6)-6,10,"".$datos["producto"][0]["modelo"],0,0,'L');
		$_pdf->SetXY($xx, $yy+28);
		$_pdf->SetFont('Times','B');
		$_pdf->MultiCell(120,5,"DESCRIPCION: ",0,'L');
		$_pdf->SetFont('Times','');
		$_pdf->SetXY($xx, $yy+34);
		$_pdf->MultiCell(120,5,"										".$datos["producto"][0]["descripcion"],0,'J');
		
		

	
		
		
		$_pdf->Image(BASE_URL.'public/img/publicaciones/'.$datos['img'][0]['nombre'],10,77,50,50,'');

		
		$_pdf->Image(BASE_URL.'public/img/pie_pdf.png',5,225,220);

		$_pdf->Output();
	}
	





}

?>
