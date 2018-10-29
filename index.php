<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<?php 
    include('entete/header.php');
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
			<div class="main-page">
				
				<div class="row">
					<div class="col-md-4 stats-info widget">
						<div class="stats-title">
							<h4 class="title">SHAMI KELLY</h4>
						</div>
						<div class="stats-body">
						<img src="images/shami.jpg" class="img-thumbnail" height='300' width='300' alt="Mon avatar"/>
						</div>
					</div>
					<div class="col-md-8 stats-info stats-last widget-shadow">
						<table class="table stats-table ">
							<thead>
								<h4 class="title">
									APPLICATION DE SUIVI D'ENCADREMENT DE STAGIAIRE A L'ISP/BUKAVU
								</h4>
							</thead>
							<tbody>
								<tr>
									<td>
									<img src="images/isp3.jpg" height='250' width='600' alt="Mon avatar"/>
									</td>
								</tr>
								
							</tbody>
						</table>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="row">
				<div class="col-md-5"></div>
				<div class="col-md-2"><a href="login.php"><input type="submit" class="btn btn-primary" value="Visitez l'application" name="register"/></a></div>
				<div class="col-md-5"></div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<?php 
    include('pied/pied.php');
?>