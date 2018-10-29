<?php
session_start();
//if(empty($_SESSION['login']) && empty($_SESSION['pass'])){
//header('location:index.php');
//}
require("fonctions/connexion.php");
if (isset($_POST["ajouter"])){
$a=$_POST['nom'];
$b=$_POST['postnom'];
$c=$_POST['contact'];


  if ($db=mysql_select_db(BASE)){
   $rqt=mysql_query("insert into encadreur  (nomenca,postnomenca,tel)values ('$a','$b','$c')");
   if($rqt){
   echo"<script type=\"text/javascript\">alert (\"enregistrement a reussi\"); </script>";
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
if (isset($_POST["annuler"])){
$_POST['nom']="";
$_POST['postnom']="";
$_POST['contact']="";

}

?>
<?php 
    include('fonctions/fonction.profile.etudiant.php');
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
<?php 
    include('mwili/nav.php');
?>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="row-one">
					<!-- Mwanzo NAV2 -->
				<?php
					include('mwili/nav2.php');
				?>
                <!-- Mwisho NAV2 -->
			<!-- Div fermeture de + --></div><!-- Div fermeture de + -->
                <!-- Ndani ndani -->
		<div class="row">
            <div class="col-md-2">
                </div>          				
                <!--Debut du cadre concerné-->
                <div class="col-md-8">	
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 align='center'>Ajoutez un encadreur</h4>
                        </div>	
                            <div class="panel-body">						
                                    
								 <form method="post" action="" class="well col-md-12">

										 <!--Champ de nom-->
										 <div class="form-group">
											 <label class="control-label" for="nom">Nom:</label>
											 <input type="text" class="form-control" id="nom" name="nom" value='' required="required"/>
										 </div>
										 
										 
										 <!--Champ de Post-nom-->
										 <div class="form-group">
											 <label class="control-label" for="postnom">Post-nom:</label>
											 <input type="text" class="form-control" id="postnom" name="postnom" value=''; ?>
										 </div>
										 
										 										 <!--Champ de Prénom-->
										 <div class="form-group"> 
											 <label class="control-label" for="prenom">Telephone:</label>
											 <input type="text" class="form-control" id="prenom" name="contact" value=''; ?>
										 </div>
										 
										 <!--Champ de Departement-->
									
											 <input type="submit" class="btn btn-primary" value="Ajouter" name="ajouter"/>

								 </form>

								<h3 align='center'><a href="admin.php">Retournez à la page précedente</a></h3>	
						    </div>
									
				     </div>					
		        </div>
			<div class="col-md-2"> 
		    <!--Fin du cadre concerné-->
            <!-- Ndani ndani -->
			</div>
		</div>
	</div>
<?php 
    include('mwili/migulu.php');
?>