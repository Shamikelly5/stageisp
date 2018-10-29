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
$pdf->Output('liste_et.pdf','I');
}
?>
<html>
		<link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap-responsive.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/styl.css"/>
	<body>
	<?php 
			include ("entete/header.php");
			?>
	<div class="main-content">
	
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				
			</div>
			<div class="header-right">
				<div class="clearfix"> </div>				
			</div>
				
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<div class="sign-up-row widget-shadow">
				<?php
				if(isset($makosa)){
					echo $makosa;
				}
				?>
				<form method="POST" action="">
					<h5>visualisez votre fiche d'affectation:</h5>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Designation departement:</h4>
						</div>
					    <div class="sign-up2">
									
							<select name="c" class="form-control"  required>
			 <?php
			 
			 if ($db=mysql_select_db(BASE)){
			 $req=mysql_query("SELECT * FROM departement ORDER BY iddep ASC");
                   echo "<option value=>-----------------------------</option>";
                     while($ligne=mysql_fetch_object($req)){
               echo "<option value='".$ligne->iddep."'>".$ligne->designdep."</option>";
			   }
			   }?>
			   </select>
								
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sub_home">
						
							<p align="center" class="submit"><input type="submit" name="voir" value="visualiser"></p>
					
						<div class="clearfix"> </div>
					</div>
				</form>
				<br>
				<p align="left" class="submit"><a href="espacetudiant.php"><input type="submit" class="btn btn-info" value="Retourner a la page de connexion"></a></p>
				</div>
			</div>
		</div>
<?php
include("pied/pied.php");
?>