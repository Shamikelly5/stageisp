<?php
session_start();
	if(isset($_POST['connexion']))
	{
$a=$_POST['login'];
$b=$_POST['password'];
					if($a=="admin" and $b=="ISPBUKAVU")
					{
							header('location:admin.php');
						}
						else{
						echo"<script type=\"text/javascript\">alert (\"login ou mot de pass incorrect\"); </script>";
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
						<h4>Bienvenu dans votre login Admin !<a href="utilisateur.php"></a> </h4>
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