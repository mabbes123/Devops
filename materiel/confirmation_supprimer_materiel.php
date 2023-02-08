<html>
<body marginheight="20" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");

include('../connect_base.php');

//récupérer les données envoyées par l'URL
$materiel=$_GET['code'];

// requéte affichage du nom et du libelle_type de materiel
  $requete="SELECT nom_materiel, libelle_type_materiel
            from materiel m, type_materiel t 
	  where m.id_type_materiel=t.id_type_materiel and id_materiel=".$materiel ;
  // execution de la requète et test
  $resultat = mysql_query($requete);
  $row=mysql_fetch_array($resultat);
  
  //Titre de la page
  echo "<center>";
  echo "<span class=style2>Suppression du materiel ".$row[0]." de type ".$row[1]."</span><br>";
  echo "<br><br>";
  
  
  echo "Voulez-vous vraiment supprimer cette enregistrement ?";
  echo "<br><br>";
  
  
	
  // bouton de retour
  
echo "<form>";
echo "<input type='button' value=\"OUI\" onclick=\"window.location='supprimer_materiel.php?code=$materiel';\">";
echo "&nbsp;";
echo "<input type='button' value=\"NON\" onclick=\"window.location='liste_mat.php?libelle=$row[1]';\">";
echo "</form></center>";

  // deconnexion de la base
mysql_close(); 


?>
</p>
<p>&nbsp; </p>
</body>
</html>
