<?php
session_start();
include('connexion.php');
	if(isset($_POST['connexion']))
	{
			if($db=mysql_select_db(BASE))
			{
				$rqt=mysql_query("select * from user where login='".$_POST['login']."' AND password='".$_POST['password']."'");
				if(mysql_num_rows($rqt)==0)
					{
					   echo"<script type=\"text/javascript\">alert (\"mot de pass ou nom d'utilisateur incorrect veillez ressayer\"); </script>";
					}
					  else
						{
							while($ligne=mysql_fetch_array($rqt))//marche avec les noms des indices ds la base fech_row:marche avec les numero des lignes
							{
							$gr=$ligne['profil'];
							if($gr=="patient"){
							$_SESSION['login']=$ligne['login'];
							$_SESSION['pass']=$ligne['pass'];
							header('location:espacepatient.php');
							}
						if($gr=="receptioniste"){
							$_SESSION['login']=$ligne['login'];
							$_SESSION['pass']=$ligne['pass'];
							header('location:receptioniste.php');
						}
						if($gr=="docteur")
							{
							$_SESSION['login']=$ligne['login'];
							$_SESSION['pass']=$ligne['pass'];
							
							header('location:docteur.php');
							}
						if($gr=="admin")
							{
							$_SESSION['login']=$ligne['login'];
							$_SESSION['pass']=$ligne['pass'];
							header('location:admin.php');
							}
					}
			}
	}
}
	if(isset($_POST['compte'])){
	header('location:utilisateur.php');
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap-responsive.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/styl.css"/>
		
	</head>
	<?php 
		include("entete/nav.php");
		?>
	<body>
	<div id="kelly">
	suivi d'encadrement des sta giaire ISP/BUKAVU
	</div>
	
	<div id="page-wrapper">
			<div class="main-page login-page ">
				<div class="widget-shadow">
		
<div class="login-top">
						<h4>Bienvenu dans notre application de suivi de stagiaire ! <br> Vous n'étes pas encore enregistré? <a href="utilisateur.php"> Créer un compte </a> </h4>
					</div>
					<div class="login-body">
						<form  method="post" name="test" action="#">
							<input type="text" class="user" name="login" placeholder="Entrer votre identifiant" required=""/>
							<input type="password" name="password" class="lock" placeholder="Entrer le mot de passe"/>
							<input type="submit" name="connexion" value="Connexion"/>
							</form>
							</div>
							</div>
							</div>
							</div>
								<div id="kel">
									</div>
							<?php
							include("pied/pied.php");
							?>