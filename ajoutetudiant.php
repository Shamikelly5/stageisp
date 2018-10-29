
<?php
session_start();
if(empty($_SESSION['login']) && empty($_SESSION['pass'])){
header('location:index.php');
} 
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
                            <h4 align='center'>Ajoutez un etudiant</h4>
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
											 <label class="control-label" for="prenom">Prénom:</label>
											 <input type="text" class="form-control" id="prenom" name="contact" value=''; ?>
										 </div>
										 
										 <!--Champ de Departement-->

										<div class="form-group">
											 <label class="control-label" for="Departement" name="departement">Departement:</label>
												 <select class="form-control" name="departement" required="required"/>
													<option > - Selectionnez un departement ici  - </option>
		                                            <option >
													
								                    </option>	 
												 </select>
										</div>
										<!--Champ de Promotion-->
										 <div class="form-group">
											 <label class="control-label" for="postnom">Promotion:</label>
											 <input type="text" class="form-control" id="postnom" name="postnom" value=''; ?>
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