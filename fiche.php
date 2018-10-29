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
							print'<table align="center" class="table table-bordered table-striped table-condensed"border=1cellspacing=0 cellpadding=2 align=center>';
							print"<caption><h4>Liste d'affectation recues </h4></caption> ";
							print"<tr class='success'><th>Numero</th><th>Nom d'etudiant</th><th>promotion</th><th>proposition</th><th>Adresse</th><th>contact</th><th>encadreur</th>";
							$i=1;
							while($ligne=mysql_fetch_array($sql)){
								$a=$ligne['nom'];
								$b=$ligne['promotion'];
								$c=$ligne['denomination'];
								$d=$ligne['adresse'];
								$e=$ligne['contact'];
								
							
								//if($i%2==0){echo'<tr class="active">';}else{echo'<tr class="success">';}
								print"<tr><td>$i</td><td>$a</td><td>$b</td><td>$c</td><td>$d</td><td>$e</td>";
								$i++;
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
					
				u