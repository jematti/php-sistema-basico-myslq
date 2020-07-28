<?php
include("conexion.php");

require 'fpdf/fpdf.php';

class PDF extends fpdf
{
		function Header()
		{
			//$this->Image('images/logo.jpg',5,5,30);	
			
			$this->SetXY(40,10);
			$this->SetFont('Arial','B',14);
			$this->Cell(120,10,'Curso de Capacticacion TELETRABAJO',0,1,'L');
			$this->SetXY(40,15);
			$this->SetFont('Arial','I',8);
			date_default_timezone_set('America/La_Paz');
			$this->Cell(120,10,date('Y-m-d H:i:s'),0,1,'L');

		}

		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

			
		}
}

	$pdf = new PDF();

	$pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->SetMargins(25,20,25);

	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(120,10,'Reportes de Usuarios Inscritos',0,0,'C');
	$pdf->Ln();

	$pdf->SetFillColor(232,232,232);
    $pdf->SetFont('Times','B',13);
    $pdf->Cell(5,10,"N",1,0,'C',1);
  	$pdf->Cell(20,10,"Ci",1,0,'C',1);
    $pdf->Cell(70,10,"Nombre",1,0,'C',1);
    $pdf->Cell(55,10,"Cargo",1,0,'C',1);
    //$pdf->Cell(65,10,"Unidad",1,0,'C',1);
    $pdf->Cell(18,10,"Celular",1,0,'C',1);
    $pdf->Cell(55,10,"Correo",1,1,'C',1);
  
    $sql="SELECT x.ci, y.nom_ap,y.cargo,y.repart_uni , x.cel, x.correo_per, x.funciones_resumen FROM inscritos x, personal y WHERE x.ci=y.ci";
    $res = mysqli_query($conexion,$sql);
    if((mysqli_num_rows($res)) != 0)
    {
    	$pdf->SetFont('Times','',8);
    	$i=0;
    	while($fila = mysqli_fetch_array($res))
    	{
    		$i++;
			$pdf->Cell(5,8,$i,1,0,'C');
		    $pdf->Cell(20,8,utf8_decode($fila[0]),1,0,'C');
		    $pdf->Cell(70,8,utf8_decode($fila[1]),1,0,'C');
            $pdf->Cell(55,8,$fila[2],1,0,'C');
            //$pdf->Cell(65,8,$fila[3],1,0,'C');
            $pdf->Cell(18,8,$fila[4],1,0,'C');
			$pdf->Cell(55,8,$fila[5],1,0,'C');
			$pdf->Ln();
  
    	}
    }


	$pdf->Ln(20);

	$pdf->Output();
?>