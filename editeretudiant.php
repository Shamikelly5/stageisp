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
            $this->Cell(0,6,utf8_decode("Liste des etudiants"),0,1,'C');
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

$pdf->AddCol('matr',60,utf8_decode(("Matricule")));
$pdf->AddCol('nom',60,utf8_decode(("Nom")));
$pdf->AddCol('postnom',30,'postnom');
$pdf->AddCol('prenom',30,'prenom');
$pdf->AddCol('designdep',30,'Departement');
$pdf->AddCol('promotion',50,'Promotion ');
/*$prop=array('HeaderColor'=>array(255,150,100),
			'color1'=>array(210,245,255),
			'color2'=>array(255,255,250),
			'color2'=>array(255,255,250),
			'padding'=>2);*/
$pdf->Table('SELECT etudiant.*,section.*,departement.* FROM etudiant INNER JOIN section on etudiant.idsection=section.idsection INNER JOIN departement on etudiant.departement=departement.iddep where etudiant.departement='.$c.'');
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
<h3 class="Estilo6" id="kelly"><span class="Estilo8"><h6>liste des etudiants par section</h6></span></h3>
      <form method="POST" name="test" action="#" class="navbar-form pull-right">
		 <div align="center">
		 <table>
		 <p>
		     <tr><td><label class="">selectionner le nom du departement</label></td><td><select name="c" class="form-control" placeholder ="reference du domaine" required>
			 <?php
			 
			 if ($db=mysql_select_db(BASE)){
			 $req=mysql_query("SELECT * FROM departement ORDER BY iddep ASC");
                   echo "<option value=>-----------------------------</option>";
                     while($ligne=mysql_fetch_object($req)){
               echo "<option value='".$ligne->iddep."'>".$ligne->designdep."</option>";
			   }
			   }?>
			   </select>
			   </td><td><p align="center" class="submit"><button type="submit" name="voir" value="" class="btn btn-primary" ><span
class="glyphicon glyphicon-eye-open"></span> visualiser</button></td></tr>
		 
		   </table>
		   </div>
		   </form>