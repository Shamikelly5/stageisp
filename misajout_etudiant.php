<?php
 require("connexion.php");
 ?>
<!DOCTYPE html>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap-responsive.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>
<form method="POST" name="test" action="#">
		 <div align="center">
		 <table>
		 <p>
		     <tr><td><label class="">selectionner le nom de l'etudiant ici</label></td><td><select name="a" class="form-control" required>
			 
<?php 
if ($db=mysql_select_db(BASE)){
			 $req=mysql_query("SELECT * FROM etudiant ORDER BY matr ASC");
                   echo "<option value=>-----------------------------</option>";
                     while($ligne=mysql_fetch_object($req)){
               echo "<option value='".$ligne->matr."'>".$ligne->nom."</option>";
			   }
			   }
			   ?>
 </select>
 </td><td><input class="btn btn-danger" type="submit"  name="view" value="visualiser"/>
 </td><td><input class="btn btn-danger" type="submit"  name="on" value="on"/>
 </form>
 <?php
		if (isset($_POST['view'])){
		$a=$_POST['a'];
		$rq=mysql_query("SELECT * FROM etudiant WHERE matr='$a'");
		$message=mysql_error();
		if($rq){
		
		echo'<form action="#" method="post" class="col-sm-8 col-sm-8" >';
	echo'<table>';
 echo'</td></tr>';
		while($sol=mysql_fetch_object($rq)) 
			
	{
	echo' <tr><td><label class="">MATRICULE</label></td><td><input type="text" name="matr" value="'.$sol->matr.'" required>';
	      echo' </p>';
		  echo'<p>';
		  echo' <tr><td><label class="">NOM</label></td><td><input type="text" name="a" value="'.$sol->nom.'" required>';
	      echo' </p>';
		  echo'<p>';
		  echo' <tr><td><label class="">POSTNOM</label></td><td><input type="text" name="b" value="'.$sol->postnom.'" required>';
		  echo' </p>';
		  echo'<p>';
		  echo' <tr><td><label class="">PRONOM</label></td><td><input type="text" name="c" value="'.$sol->prenom.'" required>';
		  echo' </p>';
		  echo'<p>';
		  echo' <tr><td><label class="">SEXE</label></td><td><input type="text" name="d" value="'.$sol->sexe.'" required>';
		  echo' </p>';
		  echo'<p>';
		  echo' <tr><td><label class="">PROMOTION</label></td><td><input type="text" name="e" value="'.$sol->promotion.'" required>';
		  echo' </p>';
		   echo'<p>';
		  echo' <tr><td><label class="">DEPARTEMENT </label></td><td><input type="text" name="f" value="'.$sol->departement.'" required>';
	       echo'</p>';
		    echo'<p>';
		   echo' <tr><td><label class="">CONTACT</label></td><td><input type="text" name="g" value="'.$sol->contact.'" required>';
	       echo'</p>';
		  echo'<p>';
		   echo' <tr><td><label class="">Mail</label></td><td><input type="text" name="h" value="'.$sol->mail.'" required>';
	       echo'</p>';
		   echo'</div>';
 echo'<td><tr><input class="btn btn-danger" type="submit"  name="modifier" value="modifier"/></td></tr>';
 echo'<td><tr><input class="btn btn-danger" type="submit"  name="supprimer" value="supprimer"/></td></tr>';
 echo'</table>';
 echo'</form>';
}
		
		 }
		else {
		
		echo"impossible";
		echo'<br>';
			  echo"erreur" .$message;
		}
		}
	
 ?>
 <?php
 if (isset($_POST['modifier'])){
        $matr=$_POST['matr'];
		$nom=$_POST['a'];
		$postnom=$_POST['b'];
		$prenom=$_POST['c'];
        $sexe=$_POST['d'];
		$promotion=$_POST['e'];
		$dep=$_POST['f'];
        $tel=$_POST['g'];
		$mail=$_POST['h'];
        $rqt=mysql_query("UPDATE etudiant  SET matr='$matr',nom='$nom',postnom='$postnom',prenom='$prenom',sexe='$sexe',promotion='$promotion',departement='$dep',contact='$tel',mail='$mail' WHERE matr='$matr'");
            if(!$rqt){
              echo "impossible d'executer cette requette";
			  $message=mysql_error();
			  echo'<br>';
			  echo"erreur" .$message;

}
    else{
     echo"<script type=\"text/javascript\">alert (\"modification reussi\"); </script>";
}
}
?>
<?php
		if (isset($_POST['supprimer'])){
		$matr=$_POST['matr'];
        $rqt=mysql_query("DELETE FROM etudiant WHERE matr='$matr'");
		$message=mysql_error();
            if(!$rqt){
              echo "impossible d'executer cette requette".$rqt;
			  echo "<br>";
              echo "Erreur".$message;
}
    else{
	echo"<script type=\"text/javascript\">alert (\"voulez vous vraiment supprimer\"); </script>";
        echo"<script type=\"text/javascript\">alert (\"suppression reussi\"); </script>";
		echo "<script type=\"text/javascript\">;window.location='index.php';</script>";
}
}

 
 ?>

 </html>
 