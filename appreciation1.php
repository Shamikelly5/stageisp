<?php
require('connexion.php');
if (isset($_POST['voir'])){
$c=$_POST['c'];
$d=$_POST['d'];
require('toolspdf/design.php');
class PDF extends PDF_MySQL_Table
{
    function Header()
    {
	//Connexion à la base
mysql_connect('localhost','root','');
mysql_select_db('ispstage');
	
            $this->SetFont('Arial','',18);
            $this->Cell(0,6,utf8_decode("Institut superieur pedagogique de Bukavu"),0,1,'C');
            $this->Cell(0,6,utf8_decode("ISP/BUKAVU en sigle"),0,1,'C');
            $this->Cell(0,6,utf8_decode("fiche appreciation d'une lecon"),0,1,'C');
            $date =  date("F j, Y");
            $this->Cell(40,30,'Rapport du : '.$date);
            $this->Ln(20);
            parent::Header();
			
    }
}
//$pdf->gabarit : template['productHead'];
						$pdf=new PDF('l');

$pdf->AddPage();
//$pdf->Add();

//Second tableau : définit 3 colonnes
//$pdf->productAddRow('idsuivi', 25, utf8_decode(("Numero")));
//$pdf->AddRow('nom', 40, 'C');
/*$pdf->productHeaderAddRow('Prix HT', 25, 'C');
$pdf->productHeaderAddRow('designsection', 15, 'C');
$pdf->productHeaderAddRow('designdep', 25, 'R');*/

$pdf->AddCol('idsuivi',25,utf8_decode(("Numero")));
$pdf->AddCol('nom',25,utf8_decode(("Nom")));
$pdf->AddCol('designsection',30,'section');
$pdf->AddCol('designdep',35,'departement');
$pdf->AddCol('heure',20,'heure');
$pdf->AddCol('classe',15,'slasse ');
$pdf->AddCol('visite',15,'visite');
$pdf->AddCol('leconjr',15,'lecon du jour');
$pdf->AddCol('objectif_lecon',30,'objectif de la lecon');
$pdf->AddCol('sujet',20,'sujet/10 ');
$pdf->AddCol('visite',20,'visite/10');
$pdf->AddCol('introduction',20,'introduction/10 ');
$pdf->AddCol('moyen',25,'moyen/10 ');
//$pdf->AddCol('developpement',30,'developpement/10');

$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,250),
			'color2'=>array(255,255,250),
			'padding'=>0);

$pdf->Table('SELECT suivi.*,etudiant.*,section.*,departement.* FROM suivi INNER JOIN etudiant on suivi.matr=etudiant.matr INNER JOIN section on suivi.idsection=section.idsection INNER JOIN departement on suivi.iddep=departement.iddep where suivi.matr='.$c.' and suivi.visite='.$d.' ');
$pdf->Output('appreciation1.pdf','I');
}
?>
<h3 class="Estilo6"><span class="Estilo8"><h6>visualiser fiche d'affectation par encadreur</h6></span></h3>
      <form method="POST" name="test" action="#" class="navbar-form pull-right">
		 <div align="center">
		 <table>
		 <p>
		     <tr><td><label class="">selectionner votre nom ici</label></td><td><select name="c" class="form-control" placeholder ="reference du domaine" required>
			 <?php
			 
			 if ($db=mysql_select_db(BASE)){
			 $req=mysql_query("SELECT * FROM etudiant ORDER BY matr ASC");
                   echo "<option value=>-----------------------------</option>";
                     while($ligne=mysql_fetch_object($req)){
               echo "<option value='".$ligne->matr."'>".$ligne->nom."</option>";
			   }
			   }?>
			   </select>
			   <p>
		     <tr><td><label class="">visite</label></td><td><select name="d" class="form-control" placeholder ="reference du domaine" required>
			 <?php
			 
			 if ($db=mysql_select_db(BASE)){
			 $req=mysql_query("SELECT * FROM suivi ORDER BY matr ASC");
                   echo "<option value=>-----------------------------</option>";
                     while($ligne=mysql_fetch_object($req)){
               echo "<option value='".$ligne->visite."'>".$ligne->visite."</option>";
			   }
			   }?>
			   </select>
			   </td><td><p align="center" class="submit"><button type="submit" name="voir" value="" class="btn btn-primary" ><span
class="glyphicon glyphicon-eye-open"></span> Chercher</button></td></tr>
		 
		   </table>
		   </div>
		   </form>