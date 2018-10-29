<?php
session_start();
require("connexion.php");
if(empty($_SESSION['login']) && empty($_SESSION['pass'])){
header('location:index.php');
}


?>

<html>
	<head>
		<link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap-responsive.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		<div class=" sidebar" role="navigation">
		
		<div class="nav navbar-fluid pull-left">
<ul class="navbar nav-tabs">
<li class="btn"><a href="suivi.php">Retour </a></li></nav></li></ul>
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
<?php
if (isset($_POST["voir"])){
$c=$_POST['c'];
 if ($db=mysql_select_db(BASE)){
$rech=mysql_query("select * from etudiant, affectation,institution,departement,section where affectation.matr='$c'and affectation.matr=etudiant.matr and institution.idinstitution=affectation.numinst and departement.iddep=etudiant.departement and section.idsection=etudiant.idsection ")or die(mysql_error());  
		if($rech)
			
			{
			echo'<form method="POST" name="test" action="#" class="navbar-form pull-center">';
		 echo'<div align="center">';
		echo' <table>';
		
           
			
		while($sol=mysql_fetch_object($rech))
		{

		    echo' <tr><td><label class="">section </label></td><td><input type="text" name="a" value="'.$sol->idsection.','.$sol->designsection.'" required></td></tr>';
		    echo' <tr><td><label class="">section </label></td><td><input type="text" name="b" value="'.$sol->iddep.','.$sol->designdep.'" required></td></tr>';
		  echo' <tr><td><label class="">departement </label></td><td><input type="text" name="c" value="'.$sol->matr.','.$sol->nom.'" required></td></tr>';
	       echo' <tr><td><label class="">institution</label></td><td><input type="text" name="d"value="'.$sol->idinstitution.','.$sol->denomination.'" required></td></tr>
	         <tr><td><label class="">heure</label></td><td><input type="text" name="e" required></td></tr>';
		    echo' <tr><td><label class="">classe</label></td><td><input type="mail" name="f" value="" required></td></tr>
	         <tr><td><label class="">visite</label></td><td><input type="mail" name="g" value="" required></td></tr>
		     <tr><td><label class="">lecon du jour</label></td><td><input type="mail" name="h" value="" required></td></tr>';
		   echo'  <tr><td><label class="">objectif de la lecon</label></td><td><input type="mail" name="i" value="" required></td></tr>';
		   echo'<tr><td><label class="">date</label></td><td><input type="mail" name="j" value="" required></td></tr>';
	        echo' <tr><td><label class="">sujet</label></td><td><input type="mail" name="k" value="" required</td></tr>>
	         <tr><td><label class="">objectif</label></td><td><input type="text" name="s" value="" required></td></tr>
			 <tr><td><label class="">introduction</label></td><td><input type="text" name="l" value="" required></td></tr>';
		   echo'<tr><td><label class="">developpement</label></td><td><input type="mail" name="m" value="" required></td></tr>';
		   echo'  <tr><td><label class="">moyen</label></td><td><input type="mail" name="n" value="" required></td></tr>';
	    echo'</div>
	   <tr><td> <p align="center" class="submit"><button type="submit" name="save" value="propose" class="btn btn-primary" >enregistrer</button></p>
		   </td><td><p align="center" class="submit"><a  type="submit" name="retour" href="suivi.php" value="" class="btn btn-success">Retour</a></p>
      </tr></table>';
	  echo'</form>
			</center>
			</div>';
			}
			}
			}
			
			else
{
echo"erreur=".mysql_error();
}
}



?>
<?php
if(isset($_POST['save'])){
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['e'];
$f=$_POST['f'];
$g=$_POST['g'];
$h=$_POST['h'];
$i=$_POST['i'];
$j=$_POST['j'];
$k=$_POST['k'];
$s=$_POST['s'];
$l=$_POST['l'];
$m=$_POST['m'];
$n=$_POST['n'];
$o=($n+$m+$l+$k);

  if ($db=mysql_select_db(BASE)){
  $co=mysql_query("select * from suivi where visite='".$g."'");
  if(mysql_num_rows($co)==1){
  echo"<script type=\"text/javascript\">alert (\"vous avesz deja effectuer cette visite\"); </script>";
  }
  else{
  //while($sol=mysql_fetch_object($c)))
  				$rqt=mysql_query("insert into suivi  (idsection,iddep,matr,idinst,heure,classe,visite,leconjr,objectif_lecon,date,sujet,objectif,introduction,developpement,moyen,total)values ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$s','$l','$m','$n','$o')");
   if($rqt){
   echo"<script type=\"text/javascript\">alert (\"enregistrement a reussi\"); </script>";
   }
   else{
      echo"<script type=\"text/javascript\">alert (\"enregistrement echouer\"); </script>";
	  echo"erreur=".mysql_error();
        }
				}
				}
    else{
      echo"<script type=\"text/javascript\">impossible de charger la base; </script>";
        }
		
}

?>
			
		  
</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
		</div>
<?php 
    include('mwili/migulu.php');
?>