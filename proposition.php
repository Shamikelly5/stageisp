<?php
session_start();
//if(empty($_SESSION['login']) && empty($_SESSION['pass'])){
//header('location:index.php');
//}
require("fonctions/connexion.php");
if (isset($_POST["upload"]))
{
		$dossier = 'recu_upload/';
		$taille_maxi = 10000000;
		$taille = filesize($_FILES['reference']['tmp_name']);
		$extensions = array('.png', '.gif', '.jpg', '.jpeg','.PNG', '.GIF', '.JPG', '.JPEG');
		$reference = basename($_FILES['reference']['name']); // indique le nom du Photo local
		$extension = strrchr($_FILES['reference']['name'], '.'); // séparation de l'extension ex : .jpg du nom du Photo local

		$reference = "recu_".date("YmdHis").$extension; // renomme $reference par le nom souhaité en rajoutant $extension


		//Début des vérifications de sécurité...
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
				  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
				  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
			 $reference = preg_replace('/([^.a-z0-9]+)/i', '-', $reference);
			 if(move_uploaded_file($_FILES['reference']['tmp_name'], $dossier . $reference)) //Si la fonction renvoie TRUE, c'est que �a a fonctionn�...
			 {
				$erreur="<div class='alert alert-info' role='alert' text-align='center'>Le fichier est enregistré</div>";
				
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
				$makosa="<div class='alert alert-info' role='alert' text-align='center'>desolé vous avez deja fait une proposition </div>";
					
   }
   }

		else{
		  $makosa="<div class='alert alert-info' role='alert' text-align='center'>impossible de charger la base  </div>";
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
			<?php include('mwili/left_frame_etd.php');?> 	
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
					if(isset($makosa))
					{
					echo $makosa;
					}
				?>
				   <form enctype="multipart/form-data" method="Post"  action="">
					<h5>Information personnelle:</h5>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Date* :</h4>
						</div>
						<div class="sign-up2">
						
								<input name="date" type="text"  required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Votre nom* :</h4>
						</div>
					    <div class="sign-up2">
									
							<select name="matr" id="selector1" class="form-control1">
							<?php if ($db=mysql_select_db(BASE))
								{
			                        $req=mysql_query("SELECT * FROM etudiant ORDER BY matr ASC");
                                    echo "<option value=>-----------------------------</option>";
                                    while($ligne=mysql_fetch_object($req))
									{
                                    echo "<option value='".$ligne->matr."'>".$ligne->nom."</option>";
			                        }
			                    }
							?>
							</select>
								
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Votre institution* :</h4>
						</div>
					    <div class="sign-up2">
									
							<select name="idinstitution" id="selector1" class="form-control1">
							<?php if ($db=mysql_select_db(BASE))
							    {
			                        $req=mysql_query("SELECT * FROM institution ORDER BY idinstitution ASC");
                                    echo "<option value=>-----------------------------</option>";
                                    while($ligne=mysql_fetch_object($req))
									{
                                    echo "<option value='".$ligne->idinstitution."'>".$ligne->denomination."</option>";
			                        }
			                    }
							?>
							</select>
								
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
					    <div class="sign-up1">
							<h4>UpLoadez le reçu* :</h4>
						</div>
					<div class="sign-up2">
					<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
				    <input name="reference" type="FILE" id="recu">
					</div>
					</div>
					<br><br><br>
					
					
					<div class="sub_home">
						
							<input name="upload" type="submit" value="Enregistrer">
						
						<div class="clearfix"> </div>
					</div>
				  </form>
				</div>
			</div>
		</div>
<?php 
    include('mwili/migulu.php');
?>
