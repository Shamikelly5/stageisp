<?php
require('toolspdf/design.php');
class PDF extends PDF_MySQL_Table
{
    function Header()
    {
            $this->SetFont('Arial','',18);
            $this->Cell(0,6,utf8_decode("Institut superieur pedagogique de Bukavu"),0,1,'C');
            $this->Cell(0,6,utf8_decode("ISP/BUKAVU en sigle"),0,1,'C');
            $this->Cell(0,6,utf8_decode("Liste d'affectation"),0,1,'C');
            $date =  date("F j, Y");
            $this->Cell(40,30,'Rapport du : '.$date);
            $this->Ln(20);
            parent::Header();
    }
}
//Connexion à la base
mysql_connect('localhost','root','');
mysql_select_db('ispstage');
						$pdf=new PDF('l');

$pdf->AddPage();

//Second tableau : définit 3 colonnes

$pdf->AddCol('idaffectation',60,utf8_decode(("Numero")));
$pdf->AddCol('nom',60,utf8_decode(("Nom")));
$pdf->AddCol('promotion',30,'Promotion');
$pdf->AddCol('denomination',30,'Marques');
$pdf->AddCol('adresse',30,'Adresse');
$pdf->AddCol('contact',50,'Contact ');


$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,250),
			'color2'=>array(255,255,250),
			'padding'=>2);

$pdf->Table('SELECT affectation.*,etudiant.*,institution.* FROM affectation INNER JOIN etudiant on affectation.matr=etudiant.matr INNER JOIN institution on affectation.numinst=institution.idinstitution',$prop);
$pdf->Output('liste_affectation.pdf','I');