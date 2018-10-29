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

//Second tableau : définit 3 colonnes

$pdf->AddCol('idaffectation',60,utf8_decode(("Numero")));
$pdf->AddCol('nom',60,utf8_decode(("Nom")));
$pdf->AddCol('promotion',30,'Promotion');
$pdf->AddCol('denomination',30,'Denomination');
$pdf->AddCol('adresse',30,'Adresse');
$pdf->AddCol('contact',50,'Contact ');


$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,250),
			'color2'=>array(255,255,250),
			'padding'=>2);

$pdf->Table('SELECT affectation.*,etudiant.*,institution.*,encadreur.* FROM affectation INNER JOIN etudiant on affectation.matr=etudiant.matr INNER JOIN institution on affectation.numinst=institution.idinstitution INNER JOIN encadreur on affectation.idencadreur=encadreur.idencadreur  where affectation.numinst="'.$c.'"');
$pdf->Output('liste_affectation.pdf','I');
}
?>
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->
<!-- chart -->
<script src="js/Chart.js"></script>
<!-- //chart -->
<!--Calender-->
<link rel="stylesheet" href="css/clndr.css" type="text/css" />
<script src="js/underscore-min.js" type="text/javascript"></script>
<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
<script src="js/clndr.js" type="text/javascript"></script>
<script src="js/site.js" type="text/javascript"></script>
<!--End Calender-->
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
<!--//Metis Menu -->
<h3 class="Estilo6" id="kelly"><span class="Estilo8"><h6>visualiser fiche d'affectation par encadreur</h6></span></h3>
      <form method="POST" name="test" action="#" class="navbar-form pull-right">
		 <div align="center">
		 <table>
		 <p>
		     <tr><td><label class="">selectionner votre nom ici</label></td><td><select name="c" class="form-control" placeholder ="reference du domaine" required>
			 <?php
			 
			 if ($db=mysql_select_db(BASE)){
			 $req=mysql_query("SELECT * FROM institution ORDER BY idinstitution ASC");
                   echo "<option value=>-----------------------------</option>";
                     while($ligne=mysql_fetch_object($req)){
               echo "<option value='".$ligne->idinstitution."'>".$ligne->denomination."</option>";
			   }
			   }?>
			   </select>
			   </td><td><p align="center" class="submit"><button type="submit" name="voir" value="" class="btn btn-primary" ><span
class="glyphicon glyphicon-eye-open"></span> Chercher</button></td></tr>
		 
		   </table>
		   </div>
		   </form>