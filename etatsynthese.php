<?php
 include('mwili/header.php');
//session_start();
require("connexion.php");
//if(empty($_SESSION['login']) && empty($_SESSION['pass'])){
//header('location:index.php');

?>
<?php
			if (isset($_POST["voir"])){
			$c=$_POST['c'];
			 if ($db=mysql_select_db(BASE)){
			$sql=mysql_query("SELECT suivi.idsuivi,SUM(sujet),SUM(objectif),SUM(introduction),SUM(developpement),SUM(moyen) ,section.idsection,designsection,departement.iddep,designdep,etudiant.matr,nom,postnom FROM suivi,etudiant,section,departement  where suivi.matr=".$c." and suivi.matr=etudiant.matr and etudiant.idsection=section.idsection and etudiant.departement=departement.iddep GROUP BY matr ")or die(mysql_error());
			//$sql=mysql_query("SELECT idsection,iddep,matr,SUM(sujet),SUM(objectif),SUM(introduction),SUM(developpement),SUM(moyen)  FROM suivi where matr =".$c." GROUP BY matr ");
			//$sql=mysql_query("SELECT etudiant.nom,departement.designdep FROM etudiant,departement WHERE etudiant.departement=departement.iddep and etudiant.departement=".$c."")or die(mysql_error());
			if($sql)
			{
			echo'<CENTER>';
		echo' <TABLE BORDER="1" align:center CELLSPACING="2" WIDTH="90%" BGCOLOR="white>';
		echo'<div id="">';
		echo '<TR><TH COLSPAN="5" BGCOLOR="white" ><FONT COLOR="1">ESU<br>institut superieur pedagogique<br>B.P.854-BUKAVU<br>annee academique</FONT>';
		echo date('Y')-1.,'-'.date('Y');
		echo'<br>STAGE DIDACTIQUE RAPPORT SYNTHESE</TH></TR>';
		
		while($sol=mysql_fetch_row($sql))
		{
		    echo' <tr><td><label class="">section</label></td><td><label>'.$sol[7].' </label></td></tr>';
			 echo' <tr><td><label class="">departement </label></td><td><label>'.$sol[9].' </label></td></tr>';
			echo' <tr><td><label class="">nom du stagiaire </label></td><td><label>'.$sol[11].' </label></td></tr>';
		    echo' <tr><td><label class="">sujet </label></td><td><label>'.$sol[1].' </label></td></tr>';
			 echo' <tr><td><label class="">objectif </label></td><td><label>'.$sol[2].' </label></td></tr>';
			  echo' <tr><td><label class="">introdustion </label></td><td><label>'.$sol[3].' </label></td></tr>';
			   echo' <tr><td><label class="">developpement </label></td><td><label>'.$sol[4].' </label></td></tr>';
			    echo' <tr><td><label class="">moyen </label></td><td><label>'.$sol[5].' </label></td></tr>';
				echo'<tr><td><A HREF="http://www.example.com/papport.pdf#page=1"></td></tr>';
				echo "<tr><td><button type=\"submit\" class=\"btn btn-primary\" href=\"\"onclick=\"print();return false;\">IMPRIMER</button></td>";
				echo "<td><a type=\"submit\" class=\"btn btn-primary\" href=\"fiche_syntheseparetudiant.php\">retour</a></td></tr>";
				echo'</table>';
	   
	   }
	   }
	   else
	   {
	   $erreur="verifiez bien vos codes";
	   }
	   }
	   else
	   {
	   $erreur="bd ou requete mal faites";
	   }
	   }
	   
	   
	   ?>
