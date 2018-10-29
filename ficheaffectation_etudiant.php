<?php
require('connexion.php');
if (isset($_POST['visualiser']))
{
$c=$_POST['matr'];

require('toolspdf/design.php');
class PDF extends PDF_MySQL_Table
{
    function Header()
    {
            $this->SetFont('Arial','',18);
            $this->Cell(0,6,utf8_decode("Institut superieur pedagogique de Bukavu"),0,1,'C');
            $this->Cell(0,6,utf8_decode("ISP/BUKAVU en sigle"),0,1,'C');
            $this->Cell(0,6,utf8_decode("information sur l'affectation d'un etudiant"),0,1,'C');
            $date =  date("F j, Y");
           // $this->Cell(40,30,'Rapport du : '.$date);
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

$pdf->Table('SELECT affectation.*,etudiant.*,institution.* FROM affectation INNER JOIN etudiant on affectation.matr=etudiant.matr INNER JOIN institution on affectation.numinst=institution.idinstitution where  affectation.matr="'.$c.'" ');
$pdf->Output('ficheaffectation_etudiant.pdf','I');
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
							<h4>Votre nom ici:</h4>
						</div>
					    <div class="sign-up2">
									
							<select name="matr" id="selector1" class="form-control1">
								<?php
										 if ($db=mysql_select_db(BASE)){
										 $req=mysql_query("SELECT * FROM etudiant ORDER BY matr ASC");
											   echo "<option value=>-----------------------------</option>";
												 while($ligne=mysql_fetch_object($req)){
										   echo "<option value='".$ligne->matr."'>".$ligne->nom."".$ligne->postnom."</option>";
										   }
										   }
										   ?>
							</select>
								
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sub_home">
						
							<p align="center" class="submit"><input type="submit" name="visualiser" value="visualiser"></p>
					
						<div class="clearfix"> </div>
					</div>
				</form>
				<br>
				<p align="left" class="submit"><a href="espacetudiant.php"><input type="submit" class="btn btn-info" value="Retournerà la page de connexion"></a></p>
				</div>
			</div>
		</div>
<?php
include("pied/pied.php");
?>