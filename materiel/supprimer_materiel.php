<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php
include('../connect_base.php');

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");


//récupérer les données envoyées dans l'adresse URL après confirmation
$materiel=$_GET['code'];

// requéte affichage du nom et du libelle_type d'materiel
  $requete="SELECT nom_materiel, libelle_type_materiel
            from materiel i, type_materiel t 
	  where i.id_type_materiel=t.id_type_materiel and id_materiel=".$materiel ;
  // execution de la requète et test
  $resultat = mysql_query($requete);
  $row=mysql_fetch_array($resultat);
  
// requéte suppression de l'enregistrement
  $requete="DELETE FROM materiel WHERE id_materiel = ".$materiel ;

// execution de la requète et test
  $resultat = mysql_query($requete);

 if($resultat)
  {
    echo("<center><span class=style3>La suppression du materiel ".$row[0]." de type ".$row[1]." a correctement été effectuée</span><br>") ;
  }
  else
  {
    echo("<center><span class=style3>La suppression du materiel ".$row[0]." de type ".$row[1]." a échouée</span><br>") ;
  }
	
  // bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_mat.php?libelle=$row[1]';\">";
echo "</form>";

  // deconnexion de la base
mysql_close(); 


?>
</body>
</html>
