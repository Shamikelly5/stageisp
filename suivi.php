<?php
session_start();
require("connexion.php");
//if(empty($_SESSION['login']) && empty($_SESSION['pass'])){
//header('location:index.php');
//}


?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap-responsive.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
	<div id="tete">
	<center></h1 style ="align:center">SUIVI STAGIAIRES</h1></center>
	</div>
		<div id="corps">
<nav class="navbar navbar-inverse">
<div class="nav navbar-fluid pull-right">
<ul class="navbar nav-tabs">
<li class="btn"><a href="retour.php">Retour </a></li>
<li class="btn"><a href="deconnexion.php">Deconnexion </a></li>
</ul></div>
</nav>

<div id="un">
<p>
<p>
			<h4>BIENVENU DANS NOTRE SITE DE SUIVI D'ENCADREMENT DE STAGIAIRE<br>
			ISP BUKAVU <br>

			<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		<div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
			<?php include('mwili/left_frame_en.php');?> 	
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<?php include('mwili/nav.php'); ?>
		<!-- //header-ends -->
		<!-- main content start-->
	
		<div id="page-wrapper">
			<div class="main-page signup-page">
				<div class="sign-up-row widget-shadow">		

			<h3 class="Estilo6"><span class="Estilo8"><h6>suivi</h6></span></h3>
      <form method="POST" name="test" action="suivi2.php" class="navbar-form pull-center">
		 <div align="center">
		 <table>
		 <p>
		     <tr><td><label class="">selectionner le nom de l'etudiant ici</label></td><td><select name="c" class="form-control" placeholder ="reference du domaine" required>
			 <?php
			 
			 if ($db=mysql_select_db(BASE)){
			 $req=mysql_query("SELECT * FROM etudiant ORDER BY matr ASC");
                   echo "<option value=>-----------------------------</option>";
                     while($ligne=mysql_fetch_object($req)){
               echo "<option value='".$ligne->matr."'>".$ligne->nom.",".$ligne->postnom."</option>";
			   }
			   }?>
			   </select>
			   </td><td><p align="center" class="submit"><button type="submit" name="voir" value="" class="btn btn-primary" ><span
class="glyphicon glyphicon-eye-open"></span> Chercher</button></td></tr>
		 
		   </table>
		   </div>

      
			</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
<?php 
    include('mwili/migulu.php');
?>