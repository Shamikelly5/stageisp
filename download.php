<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap-responsive.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
	<div id="tete">
	<center></h1 style ="align:center">cours en ligne</h1></center>
	</div>
		<div id="corps">
<nav class="navbar navbar-inverse">
<div class="nav navbar-fluid pull-right">
<ul class="navbar nav-tabs">
<li class="btn"><a href="" >mis ajour </a></li>
<li class="btn"><a href="" >modifier </a></li>
<li class="btn"><a href="">apropos </a></li>
<li class="btn"><a href="deconnexion.php">deconnexion </a></li>
</ul></div>
</nav>
			<div id="un">
			
			<h2>telechargement cours en ligne</h2><br>
			</p>
			</div>
			<div id="deux">
			<center>
			<h3 class="Estilo6"><span class="Estilo8"><strong>RECHERCHE</strong> :</span></h3>
      <form method="post" class="form-search" name="test" action="#">
		 <div align="center">
		   <table> <tr><td> <input type="text" name="recherche" value="" placeholder="recherche" required></td><td>
	    <align="right" class="submit"><button type="submit" name="search" value="" class="btn btn-primary" >Rechercher</button></tr></td></table>
      </form>
	  <p>
	  <?php
require("connexion.php");
if (isset($_POST["search"])){
    if($db=mysql_select_db(BASE)){
	$cours=$_POST['recherche'];
         $rqt=mysql_query('select* from proposition where reference like "%'.$recu.'%"');
		 if(mysql_num_rows($rqt)==0)//verifie s'il ya une information ds la bd ou verifie si la requete a renconter au moins un element ds la bd
		 {
		    echo"<script type=\"text/javascript\">alert (\"aucun element de la base n'abouti a votre requete\"); </script>";
			}
		  else
		 {
		 while ($ligne=mysql_fetch_row($rqt)){
		 echo'<li class="span3" ><div  class="thumbmail" ><img src="cours_upload/pf-pdf-icon.gif"'.$ligne[1].'alt="image ici"><button class="btn btn-danger">'.$ligne[1].'</button>
		 <a href="recu_upload/'.$ligne[1].'" class="btn btn-success">Telecharger</a></div></li>';
		 
		 }
		 
		 }
		 }
		 }

?>
</p>
			</center>
			</div>
			<div id="trois">
			
		  </div>
		</center>
	<div id="foot">

</div>
	</body>
</html>