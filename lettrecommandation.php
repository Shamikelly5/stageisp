<?php
 session_start();
if (empty($_SESSION['login'])&& empty($_SESSION['pass'])){
		header('location:index.php');
	} 
	require("connexion.php");
?>	
<!DOCTYPE HTML>
<html>
	<head>
		<title>Demandes recues Par ecole</title>
	</head>
	<body>
						<?php 
						
						  header("Content-type: application/vnd.ms-excel");
						header("Content-disposition: attachment; filename=demande_recues.xls");  
						//if($id=mysql_connect(SERVEUR,NOM,PASSE)){
						if($id_db=mysql_select_db(BASE))
						{
						$sql=mysql_query("select * from affectation, etudiant,institution where etudiant.matr=affectation.matr and institution.idinstitution=affectation.numinst")or die(mysql_error());
						//$sql=mysql_query("select * from affectation, etudiant,institution,section,departement,encadreur where etudiant.matr=affectation.matr and institution.idinstitution=affectation.numinst and departement.iddep=affectation.departement and encadreur.idencadreur=affectation.idencadreur")or die(mysql_error());
						//$sql1=mysql_query("select * from departement, interniste where iddep='".$_SESSION['login']."'and etudiant.departement=departement.iddep")or die(mysql_error());
						if (mysql_num_rows($sql)==0){
							print "<script type=\"text/javascript\"> alert('Votre boite aux lettres est vide!') </script>";
							print"<h1>Aucun contenu</h1>";
							//echo"<h3 class=\"btn btn-default\"><a href=\"#\">Retour</a></h3>";
						}
						else{
							print'<table align="center" class="table table-bordered table-striped table-condensed"border=cellspacing=0 cellpadding=2 align=center>';
							print"<caption><h4>lettre de recommandation </h4></caption> ";
							while($ligne=mysql_fetch_array($sql)){
							    $a=$ligne['nom'];
								$g=$ligne['denomination'];
								$d=$ligne['observation'];
								print "<td></tr>chers vous :$g </tr>";
								print "<tr>nous venons aupres de votres honneur vous recommanderl'etudiant $a</tr>";
								print "<tr>$d</tr></td>";
								
							}
							
							print"</table>";
						}
						/*mysql_close($id);*/
					}
					else
					{
						die(" erreur de connexion");
					}
				//}
		?>
	</body>
</html>
					
				