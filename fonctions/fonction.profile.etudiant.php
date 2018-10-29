<?php
//Cette fonction va recuperer les infos de l'utilisareur connecté
  function infos_membre_connecte()
  {
	  $infos=array();
	  $login=$_SESSION['login'];
	  $query=mysql_query("SELECT * FROM etudiant WHERE matr='$login'");
	  while($rows=mysql_fetch_assoc($query))
	  {
		  $infos[]=$rows;
	  }
	  return $infos;
  }
  
//la fonction qui va compter le nombre des encadreurs inscrits
  function nombre_encadreur()
  {
	$query=mysql_query("SELECT COUNT(idencadreur) FROM encadreur");
	return mysql_result($query,0);
  } 

//la fonction qui va compter le nombre d'etudiant inscrits
  function nombre_etudiant()
  {
	$query=mysql_query("SELECT COUNT(matr) FROM etudiant");
	return mysql_result($query,0) or die;
  } 
  
//la fonction qui va compter le nombre des enseignant inscrits
  function nombre_enseignant()
  {
	$query=mysql_query("SELECT COUNT(matr) FROM etudiant");
	return mysql_result($query,0);
  } 

?>