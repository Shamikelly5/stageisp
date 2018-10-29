<?php
session_start();
//if(empty($_SESSION['login']) && empty($_SESSION['pass'])){
//header('location:index.php');
//}

require("connexion.php");
//if(!empty($_FILES))
	//{
if(isset($_POST["upload"]) )//&& isset($_FILES['fichier']))
	{
	
		echo"salut";
		if(!empty($_FILES['fichier']))
		{
			if($_FILES['fichier']['error']==0){
					
				$filename=$_FILES['fichier']['name'];
				$tmpname=$_FILES['fichier']['tmp_name'];
				$destination='recu_upload/'.$filename;
				//$filesize=$_FILES['fichier']['size'];
				$filetype=strchr($filename,'.');
				$filetype_autorise=array(".pdf",".PDF",".jpg",".JPG",".jpeg",".JPEG",".png",".PNG",".gig",".GIF");
					if(in_array($filetype,$filetype_autorise))
					{
						if(move_uploaded_file($tmpname,$destination))
						{
							$a=$_POST['matr'];
							$b=$_POST['idinst'];
							$c=$_POST['date'];
						$db=mysql_select_db("BASE");
				          if ($db)
						    {
								$enreg=("INSERT INTO proposition (matr,idinstitution,reference,date)values('$a','$b','$destination','$c')");
								$enr=mysql_query($enreg)or die ('errer SQL '.$enreg.'</br>'.mysql_error());
								echo'enregistrement reussi';
						    }
							 else
							{
							echo'error:'.mysql_error();
							}
					}
			}
					else
					{
					 echo'bd ps de connexion';
					}
	}
					else
					{
					 echo'verifiez votre bouton';
					}
}
}

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
<li class="btn"><a href="" >mis ajour </a></li>
<li class="btn"><a href="" >modifier </a></li>
<li class="btn"><a href="">apropos </a></li>
<li class="btn"><a href="deconnexion.php">deconnexion </a></li>
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
			<h3 class="Estilo6"><span class="Estilo8"><strong>PROPOSITION INSTITUTION</strong> :</span></h3>
      <form method="POST" name="test" action="#">
		 <div align="center">
		 <table>
		<p>
		     <tr><td><label class="">selectionner votre nom ici</label></td><td><select name="matr" class="form-control" placeholder ="reference du domaine" >
			 <?php if ($db=mysql_select_db(BASE)){
			 $req=mysql_query("SELECT * FROM etudiant ORDER BY matr ASC");
                   echo "<option value=>-----------------------------</option>";
                     while($ligne=mysql_fetch_object($req)){
               echo "<option value='".$ligne->matr."'>".$ligne->nom.",".$ligne->postnom."</option>";
			   }
			   }?>
			   </select>
	       </p>
		   <p>
		      <tr><td><label class="">selectionner le nom de l'institution</label></td><td><select name="idinst" class="form-control" placeholder ="reference du domaine" >
			 <?php if ($db=mysql_select_db(BASE)){
			 $req=mysql_query("SELECT * FROM institution ORDER BY idinstitution ASC");
                   echo "<option value=>-----------------------------</option>";
                     while($ligne=mysql_fetch_object($req)){
               echo "<option value='".$ligne->idinstitution."'>".$ligne->denomination.",".$ligne->adresse."</option>";
			   }
			   }?>
			   </select>
	       </p>
		   <p>
		     <tr><td><label class="">date</label></td><td><input type="text" name="date" value="" required>
	       </p>
	    </div>
	   <tr><td><label class="">uploder votre recu</label></td><td>
						<input  type="hidden"  name="MAX_FILE_SIZE" value=20000000000000> <br/>
						
						<input  type="FILE"  name="fichier" size="500px"/>
				
						<tr><td></td><td><button name="upload" type="submit" class="btn btn-primary">Uploader</button>
      </tr></table>
	  </form>
			</center>
			</div>
			<div id="trois">
			
		  </div>
		</center>
	<div id="foot">

</div>
	</body>
</html>