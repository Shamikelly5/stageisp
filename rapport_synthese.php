<?php
 session_start();
	if(empty($_SESSION['login'])&&empty($_SESSION['pass'])){
		header('location:frm_connexion.php');
	} 
	require("connexion.php");
	ob_start();
	require("fpdf.php");
?>	
<!DOCTYPE HTML>
<html>
	<head>
		<title>Demandes recues Par ecole</title>
	</head>
	<body>
<?php

						/* header("Content-type: application/vnd.ms-excel");
						header("Content-disposition: attachment; filename=demande_recues.xls");  
						 */
						 
			//if($id=mysql_connect(SERVEUR,NOM,PASSE)){
						if($id_db=mysql_select_db(BASE)){
						$x = '10';
						$y = '10';
						$pdf=new fpdf();
						$pdf->AddPage();
						$x = '10';
						$y = '10';
						$pdf->SetFont('Times', 'BI', 18);// défint l'écriture pour tous ce qui suit 
						$pdf->Cell(190,10,'Liste d\'affectation',1,1,'C');
						$pdf->Ln();
						$nb_col = 6;
						$largeur_total_page = 210;
						$largeure_colonne = ($largeur_total_page -20) / $nb_col;
						$pdf->SetXY($x, $y+10);
						$pdf->SetFont('Times', '', 7);// défint l'écriture pour tous ce qui suit 
						$sql=mysql_query("select * from suivi, etudiant,institution,section,departement,encadreur where suivi.matr=$c and etudiant.matr=suivi.matr and institution.idinstitution=suivi.numinst and departement.departement=suivi.iddep and encadreur.idencadreur=suivi.idencadeur")or die(mysql_error());
						if (mysql_num_rows($sql)==0){
							/* print "<script type=\"text/javascript\"> alert('Votre boite aux lettres est vide!') </script>";
							print"<h1>Aucun contenu</h1>";
							 *///echo"<h3 class=\"btn btn-default\"><a href=\"#\">Retour</a></h3>";
						}
						else{
							//print'<table class="table table-bordered table-striped table-condensed"border=1cellspacing=0 cellpadding=2 align=center>';
							$pdf->write('Liste d\'affectation',40,'');
														}
							//print"<tr class='success'><th>Numero</th><th>Nom de l'eleve</th><th>classe de l'eleve</th><th>Nom du Parent</th><th>Adresse</th><th>E mail</th>";
							$pdf->Cell($largeure_colonne, 5,'Numero', 1, 0, 'C', 0);
							$pdf->Cell($largeure_colonne, 5,'Nom', 1, 0, 'C', 0);
							$pdf->Cell($largeure_colonne, 5,'promotion', 1, 0, 'C', 0);
							$pdf->Cell($largeure_colonne, 5,'proposition', 1, 0, 'C', 0);
							$pdf->Cell($largeure_colonne, 5,'Adresse', 1, 0, 'C', 0);
							$pdf->Cell($largeure_colonne, 5,'contact', 1, 0, 'C', 0);
							$pdf->Ln();
							$i=1;
							while($ligne=mysql_fetch_array($sql)){
								$a=$ligne['nom'];
								$b=$ligne['postnom'];
								$c=$ligne['denomination'];
								$d=$ligne['designdep'];
								$e=$ligne['contact'];
								$f=$ligne['nomenca'];
								$g=$ligne['designsection'];
								$pdf->Cell($largeure_colonne, 5, $i, 1, 0, 'C', 0);
								$pdf->Cell($largeure_colonne, 5, $a, 1, 0, 'C', 0);
								$pdf->Cell($largeure_colonne, 5, $b, 1, 0, 'C', 0);
								$pdf->Cell($largeure_colonne, 5, $c, 1, 0, 'C', 0);
								$pdf->Cell($largeure_colonne, 5, $d, 1, 0, 'C', 0);
								$pdf->Cell($largeure_colonne, 5, $e, 1, 0, 'C', 0);
								$pdf->Ln();
								$i++;
							}
							
						}
						ob_end_clean(); 
						$pdf->Output();
						mysql_close($id);
					}
					else
					{
						die(" erreur de connexion");
					}
				}
		?>
	</body>
</html>
					
				