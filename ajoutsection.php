<?php
session_start();
//if(empty($_SESSION['login']) && empty($_SESSION['pass'])){
//header('location:index.php');
//}
require("connexion.php");
if (isset($_POST["ajouter"])){
$a=$_POST['b'];


  if ($db=mysql_select_db(BASE)){
  
  if(mysql_num_rows($reche)==1){
				echo'<div class="alert alert-warning alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span></button>
								cette section existe deja  </div>';
				}
				else
				{
   $rqt=mysql_query("insert into section  (nomenca,postnomenca,tel)values ('$a','$b','$c')");
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
                            <h4 align='center'>Ajoutez une section </h4>
                        </div>	
                            <div class="panel-body">						
                                    
								 <form method="post" action="" class="well col-md-12">
										 <!--Champ de nom-->
										 <div class="form-group">
											 <label class="control-label" for="postnom">Designation section:</label>
											 <input type="text" class="form-control" id="postnom" name="b" value=''; ?>
										 </div>
	
										 
											 <input type="submit" class="btn btn-primary" value="Ajouter" name="ajouter"/>

								 </form>

								<h3 align='center'><a href="profile.section.php">Retournez à la page précedente</a></h3>	
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