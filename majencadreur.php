<?php
session_start();
include('fonctions/connexion.php');
?>
<?php 
    include('mwili/header.php');
?>
<body >
	<div class="main-content">
	
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				
			</div>
			<div class="header-right">
				<div class="clearfix"> </div>				
			</div>
				
		</div>
		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page login-page ">
				<div class="widget-shadow">
					<div class="login-top">
						<h4>Page mis ajour encadreur ! <a href="admin.php"> Retour a la page precedente </a> </h4>
					</div>
					<div class="login-body">
						<form  method="post" name="test" action="#">
							<select name="a" class="form-control" required>
			 
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
								<input type="submit" name="voir" value="Connexion">
							
						</form>
					</div>
				</div>
			</div>
		</div>
		
		
<?php 
    include('mwili/migulu.php');
?>