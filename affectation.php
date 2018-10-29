<?php
session_start();
require("fonctions/connexion.php");
if(empty($_SESSION['login']) && empty($_SESSION['pass'])){
header('location:index.php');
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
				<!-- Mwanzo NAV2 -->
				<?php 
					include('mwili/nav2.php');
				?>
                <!-- Mwisho NAV2 -->
                <!-- Ndani ndani -->
		<div class="row">
            <div class="col-md-2">
                </div>          				
                <!--Debut du cadre concerné-->
                <div class="col-md-8">	
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 align='center'>Ici vous devez selectionner un etudiant a affecter</h4>
                        </div>	
                            <div class="panel-body">      
								 <form method="post" action="affectation2.php" class="well col-md-12">										 
										 <!--Champ de affectation-->
										<div class="form-group">
										  <label class="control-label" for="Sexe">Selectionner le nom de l'etudiant:</label>
												<select class="form-control" name="c" required="required"/>
												    <?php
														 if ($db=mysql_select_db(BASE))
														{
														   $req=mysql_query("SELECT * FROM etudiant ORDER BY matr ASC");
															   echo "<option value=>----------------------------------------------------------</option>";
															   while($ligne=mysql_fetch_object($req))
															   {
																  echo "<option value='".$ligne->matr."'>".$ligne->nom.",".$ligne->postnom."</option>";
															   }
														}
													?>
												</select>
										</div>
										     <!-- Le Bouton du modal -->
											 <button type="submit" name="voir" value="" class="btn btn-primary" ><span
												class="glyphicon glyphicon-eye-open"></span> Chercher</button>
											 <!-- Mwisho bouton du modal -->
								 </form>

								<h3 align='center'><a href="profile.section.php">Retournez à la page précedente</a></h3>
								<!-- Apa njo mwanzo ya Modal ya modification ya photo -->
				
				        

				<!-- Mwanzo ya class Modal -->
		
				<!-- Apa njo mwisho ya Modal -->
								
					 </div>		
				    </div>					
		        </div>
			<div class="col-md-2"> 
		    <!--Fin du cadre concerné-->
            <!-- Ndani ndani -->
			</div>
		</div>
		</div>
	</div>
<?php 
    include('mwili/migulu.php');
?>
