<?php
session_start();
if(empty($_SESSION['login']) && empty($_SESSION['pass'])){
header('location:index.php');
}
require("fonctions/connexion.php");
if (isset($_POST["upload"]))
{
if ($db=mysql_select_db(BASE))
														{
		$dossier = 'recu_upload/';
		$taille_maxi = 10000000;
		$taille = filesize($_FILES['reference']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg','.PNG', '.GIF', '.JPG', '.JPEG');
		$reference = basename($_FILES['reference']['name']); // indique le nom du Photo local
		$extension = strrchr($_FILES['reference']['name'], '.'); // sÈparation de l'extension ex : .jpg du nom du Photo local

		$reference = "recu_".date("YmdHis").$extension; // renomme $reference par le nom souhaitÈ en rajoutant $extension


		//DÈbut des vÈrifications de sÈcuritÈ...
		if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
		{
			 $erreur = "<div class='alert alert-info' role='alert' text-align='center'>Vous devez uploader une Photo de type png, gif, jpg, jpeg</div>";
		}
		if($taille>$taille_maxi)
		{
			 $erreur = "Le Photo est trop gros...";
		}
		if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
		{
			 //On formate le nom du Photo ici...
			 $reference = strtr($reference, 
				  '¿¡¬√ƒ≈«»… ÀÃÕŒœ“”‘’÷Ÿ⁄€‹›‡·‚„‰ÂÁËÈÍÎÏÌÓÔÚÛÙıˆ˘˙˚¸˝ˇ', 
				  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			 $reference = preg_replace('/([^.a-z0-9]+)/i', '-', $reference);
			 if(move_uploaded_file($_FILES['reference']['tmp_name'], $dossier . $reference)) //Si la fonction renvoie TRUE, c'est que ?a fonctionn?.
			 {
				$erreur="<div class='alert alert-info' role='alert' text-align='center'>Le fichier est enregistrÈ</div>";
				
			 }
		}
		else{
			echo $erreur;
		}
	
	$a=$_POST['matr'];
	$b=$_POST['idinstitution'];
	$c=$reference;
	$d=$_POST['date'];

	  if ($db=mysql_select_db(BASE)){
	   $reche=mysql_query("SELECT * FROM proposition WHERE matr ='$a' ");
				if(mysql_num_rows($reche)==0){
				$rqt=mysql_query("insert into proposition  (num_proposition,matr,idinstitution,date )values ('','$a','$b','$d')");
   if($rqt){
   echo"<div class='alert alert-info' role='alert' text-align='center'>enregistrement reussi</div>";
   }
   else{
      echo"<div class='alert alert-info' role='alert' text-align='center'>enregistrement </div>";
	  echo"erreur=".mysql_error();
        }
				}
				else{
				$makosa="<div class='alert alert-info' role='alert' text-align='center'>desolÈ vous avez deja fait une proposition </div>";
					
   }
   }

		else{
		  $makosa="<div class='alert alert-info' role='alert' text-align='center'>impossible de charger la base  </div>";
			}
}
}

?>

<?php
	if(isset($_POST['upload']))
	{
	//header('Location: proposition.php');		
	}
?>

<?php 
    include('mwili/header2.php');
?>

<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		<div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
			<?php include('mwili/left_frame_sect.php');?> 	
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
				if (isset($_POST["voir"]))
			{
				$c=$_POST['c'];
				if ($db=mysql_select_db(BASE))
														{
				echo'<form method="POST" name="test" action="#">';
				$sql=mysql_query("select * from etudiant, proposition,institution,departement,section where proposition.matr='$c' and etudiant.matr=proposition.matr and proposition.idinstitution=institution.idinstitution and departement.iddep=etudiant.departement and section.idsection=etudiant.idsection ")or die(mysql_error());  
							if($sql){
		
							
								echo' <table>';
								echo' <p>';
							   
								
							while($sol=mysql_fetch_object($sql))
							{
								echo' <tr><td><label class="">nom </label></td><td><input type="text" name="a" value="'.$sol->matr.','.$sol->nom.'" ></td></tr>';
							  
							  echo' <tr><td><label class="">departement </label></td><td><input type="text" name="b" value="'.$sol->departement.','.$sol->designdep.'" ></td></tr>';
							   
							   echo' <tr><td><label class="">institution</label></td><td><input type="text" name="c" value="'.$sol->idinstitution.','.$sol->denomination.'" ></td></tr>';
							   echo' <tr><td><label class="">Section</label></td><td><input type="text" name="d" value="'.$sol->idsection.','.$sol->designsection.'" ></td></tr>';
							  
							  
							   echo'<tr>
									   <td><label class="">selectionner le nom de l\'encadreur ici</label></td>
									   <td>
				<select name="e" class="form-control">';
				 
				 if ($db=mysql_select_db(BASE)){
				 $req=mysql_query("SELECT * FROM encadreur ORDER BY idencadreur ASC");
					   echo "<option value=>-----------------------------</option>";
						 while($ligne=mysql_fetch_object($req)){
				   echo "<option value='".$ligne->idencadreur."'>".$ligne->nomenca.",".$ligne->postnomenca."</option>";
				   }
				   }
				  
			  echo'</select></td>
					</tr>';
			  echo'<tr>
					  <td><label class="">date debut</label></td>
					  <td><input type="text" name="f" ></td>
				   </tr>';
				   echo'<tr>
					  <td><label class="">date fin</label></td>
					  <td><input type="text" name="g" ></td>
				   </tr>';
			  echo' <tr><td><label class="">objet</label></td><td><input type="text" name="h" value="" ></td>';
			  echo'<tr><td> <button type="submit" name="save" value="" class="btn btn-primary" >enregistrer</button></td>';
			   echo'<td><a type="submit"  value="" href="affectation.php" class="btn btn-primary" >Retour</a></td><tr>';
			 
			  echo'</table>';
			  echo'</form>';
				 
				}
				}
				}
				/*}
							else
								{
				echo"<script type=\"text/javascript\">alert (\"cet etudiant n'a pas encore proposer le lieu de stage\"); </script>";
							}*/
			}
				
				if(isset($_POST['save'])){
				$a=$_POST['a'];
				$b=$_POST['b'];
				$c=$_POST['c'];
				$d=$_POST['d'];
				$e=$_POST['e'];
				$f=$_POST['f'];
				$g=$_POST['g'];
				$h=$_POST['h'];
				  if ($db=mysql_select_db(BASE)){
								$rqt=mysql_query("insert into affectation  (matr,departement,numinst,idsection,idencadreur,date_debut,date_fin,observation)values ('$a','$b','$c','$d',$e,'$f','$g','$h')");
				   if($rqt){
				   echo"<script type=\"text/javascript\">alert (\"enregistrement a reussi\"); </script>";
				   header('location:affectation.php');
				   
				   }
				   else{
					  echo"<script type=\"text/javascript\">alert (\"enregistrement echouer\"); </script>";
					  echo"erreur=".mysql_error();
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
