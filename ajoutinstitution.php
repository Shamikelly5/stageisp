<?php
session_start();
if(empty($_SESSION['login']) && empty($_SESSION['pass'])){
header('location:index.php');

require("fonctions/connexion.php");

if (isset($_POST["ajouter"])){
$b=$_POST['denomination'];
$c=$_POST['adresse'];
$d=$_POST['contact'];
$e=$_POST['mail'];

  if ($db=mysql_select_db(BASE))
  {
  $reche=mysql_query("SELECT * FROM institution WHERE denomination ='$b' AND adresse='$c'");
				if(mysql_num_rows($reche)==0){
				$rqt=mysql_query("insert into institution  (denomination,adresse,phone,mail)values ('$b','$c','$d','$e')");
   if($rqt){
   echo"<script type=\"text/javascript\">alert (\"enregistrement a reussi\"); </script>";
   echo "<script type=\"text/javascript\">;window.location='proposition.php';</script>";
   }
   else{
      echo"<script type=\"text/javascript\">alert (\"enregistrement echouer\"); </script>";
	  echo"erreur=".mysql_error();
        }
				}
				else{
				echo"<script type=\"text/javascript\">alert (\"Cette institution est deja dans la base faites votre proposition maintenant\"); </script>
				";
				echo "<script type=\"text/javascript\">;window.location='proposition.php';</script>";
					
   }
   }
    else{
      echo"<script type=\"text/javascript\">impossible de charger la base; </script>";
        }
		}

             
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
			<?php include('mwili/left_frame.php');?> 	
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
				  <form  method="post" name="test" action="#">
					<h5>Information personnelle:</h5>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Denomination* :</h4>
						</div>
						<div class="sign-up2">
							
								<input name="denomination" type="text"  required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Adresse* :</h4>
						</div>
						<div class="sign-up2">
							
								<input name="adresse" type="text" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>Téléphone* :</h4>
						</div>
						<div class="sign-up2">
							
								<input name="contact" type="text" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="sign-u">
						<div class="sign-up1">
							<h4>E-mail* :</h4>
						</div>
						<div class="sign-up2">
							
								<input name="mail" type="text" required>
							
						</div>
						<div class="clearfix"> </div>
					</div>
					
					
					<div class="sub_home">
						
							<input type="submit" name="ajouter" value="Ajouter">
						
						<div class="clearfix"> </div>
					</div>
				  </form>
				</div>
			</div>
		</div>
<?php 
    include('mwili/migulu.php');
?>
