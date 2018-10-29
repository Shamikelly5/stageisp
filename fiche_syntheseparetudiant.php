<style>
#kelly{
}
#1{
}
#2{
}
</style>
<?php
//session_start();
require("connexion.php");
//if(empty($_SESSION['login']) && empty($_SESSION['pass'])){
//header('location:index.php');

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
<li class="btn"><a href="espacesection.php">Retour </a></li>
<li class="btn"><a href="deconnexion.php">Deconnexion </a></li>
</ul></div>
</nav>

<div id="un">
<p>
<p>
			<h4>BIENVENU DANS NOTRE SITE DE SUIVI D'ENCADREMENT DE STAGIAIRE<br>
			ISP BUKAVU <br>

			</p></h4>
<!--<nav>
<ul>
<li><a href="page1.html" class="icon-open-file">sommaire</a></li>
<li><a href="deconnexion.php">deconnexion</a></li>
<li><a href="page3.html">consulter</a></li>
</ul>
</nav>-->
			</p>
			</div>
			<div id="deux">
			<center>
			<h3 class="Estilo6"><span class="Estilo8"><strong>suivi</strong> :</span></h3>
      <form method="POST" name="test" action="etatsynthese.php" class="navbar-form pull-right">
		 <div align="center">
		 <table>
		 <p>
		     <tr><td><label class="">selectionner le nom de l'etudiant ici</label></td><td><select name="c" style="width: 150px" class="input-sm form-control" required>
	     <?php
			 if ($db=mysql_select_db(BASE))
			{
			   $req=mysql_query("SELECT * FROM etudiant ORDER BY matr ASC");
                   echo "<option value=>-----------------------------</option>";
                   while($ligne=mysql_fetch_object($req))
				   {
                      echo "<option value='".$ligne->matr."'>".$ligne->nom.",".$ligne->postnom."</option>";
			       }
		    }
		 ?>
			   </select>
			   </td><td><p align="center" class="submit"><button type="submit" name="voir" value="" class="btn btn-primary" ><span
class="glyphicon glyphicon-eye-open"></span> Visualiser</button></td></tr>
		 
		   </table>
		   </div>
			
	</body>
</html>