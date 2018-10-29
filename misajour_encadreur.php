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
			 $req=mysql_query("SELECT * FROM encadreur ORDER BY idencadreur ASC");
                   echo "<option value=>-----------------------------</option>";
                     while($ligne=mysql_fetch_object($req)){
               echo "<option value='".$ligne->idencadreur."'>".$ligne->nomenca."</option>";
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
		$rq=mysql_query("SELECT * FROM encadreur WHERE idencadreur='$a'");
		$message=mysql_error();
		if($rq){
		
		echo'<form action="#" method="post" class="col-sm-8 col-sm-8" >';
	echo'<table>';
 echo'</td></tr>';
		while($sol=mysql_fetch_object($rq)) 
			
	{
	echo' <tr><td><label class="">NUM ENCADREUR</label></td><td><input type="text" name="e" value="'.$sol->idencadreur.'" required>';
	      echo' </p>';
		  echo'<p>';
		  echo' <tr><td><label class="">NOM</label></td><td><input type="text" name="b" value="'.$sol->nomenca.'" required>';
	      echo' </p>';
		  echo'<p>';
		  echo' <tr><td><label class="">POSTNOM</label></td><td><input type="text" name="c" value="'.$sol->postnomenca.'" required>';
		  echo' </p>';
		    echo'<p>';
		   echo' <tr><td><label class="">CONTACT</label></td><td><input type="text" name="d" value="'.$sol->tel.'" required>';
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
        $matr=$_POST['e'];
		$nom=$_POST['b'];
		$postnom=$_POST['c'];
        $tel=$_POST['d'];
        $rqt=mysql_query("UPDATE encadreur  SET idencadreur='$matr',nomenca='$nom',postnomenca='$postnom',tel='$tel'='$tel' WHERE idencadreur='$matr'");
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
		$id=$_POST['d'];
        $rqt=mysql_query("DELETE FROM encadreur WHERE idencadreur='$id'");
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
 