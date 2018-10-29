<?php
require('connexion.php');
if (isset($_POST['voir'])){
$c=$_POST['c'];
require('toolspdf/design.php');
class PDF extends PDF_MySQL_Table
{
    function Header()
    {
            $this->SetFont('Arial','',18);
            $this->Cell(0,6,utf8_decode("Institut superieur pedagogique de Bukavu"),0,1,'C');
            $this->Cell(0,6,utf8_decode("ISP/BUKAVU en sigle"),0,1,'C');
            $this->Cell(0,6,utf8_decode("fiche d'appreciation dune lecon"),0,1,'C');
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

$pdf->SetFont('Arial','B',16);
$pdf->Write(10, "Ceci est un texte multilignes \nEt voici la deuxième ligne");
$pdf->Output();
//Second tableau : définit 3 colonnes

/*$pdf->AddCol('idsuivi',60,utf8_decode(("Numero")));
$pdf->AddCol('designsection',60,utf8_decode(("section")));
$pdf->AddCol('designdep',30,'departement');
$pdf->AddCol('nom',30,'nom stagiaire');
$pdf->AddCol('denomination',30,'institution');
$pdf->AddCol('heure',50,'heure ');
$pdf->AddCol('classe',50,'classe ');
$pdf->AddCol('visite',50,'visite ');
$pdf->AddCol('leconjr',50,'lecon du jour ');
$pdf->AddCol('objectif_lecon',50,'objectif de la lecon ');
$pdf->AddCol('date',50,'date ');
$pdf->AddCol('sujet',50,'sujet/10 ');
$pdf->AddCol('objectif',50,'objectif/10 ');
$pdf->AddCol('introduction',50,'introduction/10 ');
$pdf->AddCol('developpement',50,'developpement/10 ');
$pdf->AddCol('moyen',50,'moyen/10 ');*/






$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,250),
			'color2'=>array(255,255,250),
			'padding'=>2);

$pdf->Table=mysql_query("SELECT suivi.*,etudiant.*,institution.*,departement.*,section.* FROM suivi INNER JOIN etudiant on suivi.matr=etudiant.matr INNER JOIN departement on suivi.iddep=departement.iddep INNER JOIN section on suivi.idsection=section.idsection INNER JOIN institution on suivi.idinst=institution.idinstitution where suivi.matr=".$c." ")or die(mysql_error());
$pdf->Output('appreciation.pdf','I');
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
			   </td><td><p align="center" class="submit"><button type="submit" name="voir" value="" class="btn btn-primary" ><span
class="glyphicon glyphicon-eye-open"></span> Chercher</button></td></tr>
		 
		   </table>
		   </div>
		   </form>