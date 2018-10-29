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
		     <tr><td><label class="">selectionner le nom de l'institution</label></td><td><select name="a" class="form-control" required>
			 
<?php 
if ($db=mysql_select_db(BASE)){
			 $req=mysql_query("SELECT * FROM institution ORDER BY idinstitution ASC");
                   echo "<option value=>-----------------------------</option>";
                     while($ligne=mysql_fetch_object($req)){
               echo "<option value='".$ligne->idinstitution."'>".$ligne->denomination."</option>";
			   }
			   }
			   ?>
 </select>
 </td><td><input class="btn btn-danger" type="submit"  name="view" value="visualiser"/>
 </form>
 <?php
		if (isset($_POST['view'])){
		$a=$_POST['a'];
		$rq=mysql_query("SELECT * FROM institution WHERE idinstitution='$a'");
		$message=mysql_error();
		if($rq){
		
		echo'<form action="#" method="post" class="col-sm-8 col-sm-8" >';
	echo'<table>';
 echo'</td></tr>';
		while($sol=mysql_fetch_object($rq)) 
			
	{
	echo' <tr><td><label class="">NUM institution</label></td><td><input type="text" name="d" value="'.$sol->iinstitution.'" required>';
	      echo' </p>';
		  echo'<p>';
		  echo' <tr><td><label class="">DENOMINATION</label></td><td><input type="text" name="a" value="'.$sol->denomination.'" required>';
	      echo' </p>';
		  echo'<p>';
		  echo' <tr><td><label class="">ADRESSE</label></td><td><input type="text" name="b" value="'.$sol->adresse.'" required>';
		  echo' </p>';
		    echo'<p>';
		   echo' <tr><td><label class="">CONTACT</label></td><td><input type="text" name="c" value="'.$sol->contact.'" required>';
	       echo'</p>';
		   echo'<p>';
		   echo' <tr><td><label class="">MAIL</label></td><td><input type="text" name="e" value="'.$sol->mail.'" required>';
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
        $id=$_POST['d'];
		$denomination=$_POST['a'];
		$adresse=$_POST['b'];
        $tel=$_POST['c'];
		$mail=$_POST['e'];
        $rqt=mysql_query("UPDATE institution  SET idinstitution='$id',denomination='$denomination',adresse='$adresse',contact='$tel',mail='$mail' WHERE idinstitution='$id'");
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
        $rqt=mysql_query("DELETE FROM institution WHERE idinstitution='$id'");
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
 