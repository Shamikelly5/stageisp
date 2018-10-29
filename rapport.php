<?php
require('connexion.php');
		
		require('toolspdf/design.php');

		class PDF extends PDF_MySQL_Table
		{
			function Header()
			{
					$this->SetFont('Arial','',18);
					$this->Cell(0,6,utf8_decode("Institut superieur pedqgogique de Bukavu"),0,1,'C');
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
		//$i=1;

		//Second tableau : définit 3 colonnes

		//$pdf->AddCol('$i',60,utf8_decode(("Numero")));
		$pdf->AddCol('nom',60,utf8_decode(("Nom")));
		//$pdf->AddCol('promotion',30,'Promotion');
		$pdf->AddCol('denomination',30,'Denomination');
		$pdf->AddCol('adresse',30,'Adresse');
		$pdf->AddCol('".$sol->sujet."',50,'Sujet ');
		$pdf->AddCol('".$sol->objectif."',50,'Objectif ');
		$pdf->AddCol('".$sol->introduction."',50,'Introduction ');
        $pdf->AddCol('".$sol->developpement."',50,'Developpement ');
		$pdf->AddCol('".$sol->moyen."',50,'Moyen ');
		//$i++;



		$prop=array('HeaderColor'=>array(255,150,100),
					'color1'=>array(210,245,255),
					'color2'=>array(255,255,250),
					'color2'=>array(255,255,250),
					'padding'=>2);

		
		//$pdf->Table('SELECT suivi.*,etudiant.*,institution.* FROM suivi INNER JOIN etudiant on suivi.matr=etudiant.matr INNER JOIN institution on suivi.idinst=institution.idinstitution ');
		//$pdf->Table('$i');
		$req=mysql_query("SELECT visite, SUM(sujet),SUM(objectif),SUM(introduction),SUM(developpement),SUM(moyen) FROM suivi  GROUP BY visite");
		while($sol=mysql_fetch_object($req))
		{
		$pdf->Table('$req');
		$pdf->Output('liste_affectation.pdf','I');
		}
		}
		
		?>
		