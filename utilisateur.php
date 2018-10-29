<?php
require("connexion.php");
if (isset($_POST['ajouter'])){
	$b=$_POST['login'];
	$d=$_POST['pass'];
	$e=$_POST['confirm'];
	$c=$_POST['profil'];
	if($d!=$e){
		echo"<script type=\"text/javascript\">alert(\"vos mots de passe ne sont pas identique\"); </script>";
	}
	else{
		if ($db=mysql_select_db(BASE)){
			if($c=="encadreur"){
				$reche=mysql_query("SELECT * FROM encadreur WHERE idencadreur ='$b'");
				if(mysql_num_rows($reche)==0){
				
					echo"<script type=\"text/javascript\">alert (\"vous n'etes pas reconnu entant que encadreur\"); </script>";
		
				}
				else{
					$rqt=mysql_query("insert into users (login,password,profil)values('$b','$d','$c')");
					if($rqt){
						echo"<script type=\"text/javascript\">alert (\"Enregistrement a reussi\"); </script>";
					}
					else{
						echo"erreur=".mysql_error();
					}
				}
		
			}											
			else if($c=="etudiant"){
				$reche=mysql_query("SELECT * FROM etudiant WHERE matr='$b'");
				if(mysql_num_rows($reche)==0){
					echo"<script type=\"text/javascript\">alert (\"vous n'etes pas reconnu entant que etudiant\"); </script>";
				}
				else{
					$rqt=mysql_query("insert into users (login,password,profil )values('$b','$d','$c')");
					if($rqt){
						echo"<script type=\"text/javascript\">alert (\"Enregistrement a reussi\"); </script>";
						header('location:ajoutinstitution.php');
					}
					else{
						echo"erreur=".mysql_error();
					}
				}
		
			}
			else if($c=="institution"){
				$reche=mysql_query("SELECT * FROM institution WHERE idinstitution='$b'");
				if(mysql_num_rows($reche)==0){
					echo"<script type=\"text/javascript\">alert (\"vous n'etes pas reconnu entant que institution\"); </script>";
				}
				else{
					$rqt=mysql_query("insert into users (login,password,profil )values('$b','$d','$c')");
					if($rqt){
						echo"<script type=\"text/javascript\">alert (\"Enregistrement a reussi\"); </script>";
					}
					else{
						echo"erreur=".mysql_error();
					}
				}
		
			}
			else if($c=="agent section"){
				$reche=mysql_query("SELECT * FROM section WHERE idsection='$b'");
				if(mysql_num_rows($reche)==0){
					echo"<script type=\"text/javascript\">alert (\"vous n'etes pas reconnu entant que secretaire1\"); </script>";
				}
				else{
					$rqt=mysql_query("insert into users (login,password,profil )values('$b','$d','$c')");
					if($rqt){
						echo"<script type=\"text/javascript\">alert (\"Enregistrement a reussi\"); </script>";
					}
					else{
						echo"erreur=".mysql_error();
					}
				}
		
			}
			else if($c=="agent departement"){
				$reche=mysql_query("SELECT * FROM departement WHERE iddep='$b'");
				if(mysql_num_rows($reche)==0){
					echo"<script type=\"text/javascript\">alert (\"vous n'etes pas reconnu entant que secretaire2\"); </script>";
				}
				else{
					$rqt=mysql_query("insert into users (login,password,profil )values('$b','$d','$c')");
					if($rqt){
						echo"<script type=\"text/javascript\">alert (\"Enregistrement a reussi\"); </script>";
					}
					else{
						echo"erreur=".mysql_error();
					}
				}
		
			}
			}
		else{
			echo"<script type=\"text/javascript\">impossible de charger la base; </script>";
        }
	}
}
if (isset($_POST["annuler"])){
$_POST['login']="";
$_POST['pass']="";
$_POST['confirm']="";
$_POST['profil']="";
}
?>
<!DOCTYPE html>
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
					<h5>Information personnelle:</h5>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Login* :</h4>
						</div>
						<div class="sign-up2">
								<input name="login" type="text" required>
						</div>
						<div class="clearfix"> </div>
					</div>
					
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Groupe* :</h4>
						</div>
					    <div class="sign-up2">
									
							<select name="profil" id="selector1" class="form-control1">
								<option value=''>------------------------------------------------------ </option>
								<option value='encadreur'>Encadreur </option>
								<option value='etudiant'>Etudiant</option>
								<option value='agent section'>Agent section</option>
								<option value='agent departement'>Agent département</option>
								<option value='institution'>Institution</option>
							</select>
								
						</div>
						<div class="clearfix"> </div>
					</div>
					<h6>Information de connexion:</h6>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Password* :</h4>
						</div>
						<div class="sign-up2">
							
								<input name="pass" type="password" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Confirm Password* :</h4>
						</div>
						<div class="sign-up2">
							
								<input name="confirm" type="password" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sub_home">
						
							<p align="center" class="submit"><input type="submit" name="ajouter" value="Enregistrer"></p>
					
						<div class="clearfix"> </div>
					</div>
				</form>
				<br>
				<p align="left" class="submit"><a href="login.php"><input type="submit" class="btn btn-info" value="Retournerà la page de connexion"></a></p>
				</div>
			</div>
		</div>
<?php
include("pied/pied.php");
?>