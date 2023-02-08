<html>
<body marginheight="20" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");

include('../connect_base.php');

//récupérer les données envoyées par l'URL
$id_materiel=$_GET['id_materiel'];
$id_composant=$_GET['id_composant'];


// requéte affichage du nom du composant et du nom du materiel auquel le composant était affecter
  $requete="SELECT nom_materiel, libelle_composant
            from materiel m, composer co, composant c
	  where m.id_materiel=co.id_materiel and c.id_composant=co.id_composant and m.id_materiel=".$id_materiel ;
  // execution de la requète et test
  $resultat = mysql_query($requete);
  $row=mysql_fetch_array($resultat);

  //Titre de la page
  echo "<center>";
  echo "<span class=style2>Suppression du composant ".$row[1]." affecté au matériel ".$row[0]."</span><br>";
  echo "<br><br>";
  
  
  echo "Voulez-vous vraiment supprimer cette enregistrement ?";
  echo "<br><br>";
  
  
	
  // bouton de retour
  
echo "<form>";
echo "<input type='button' value=\"OUI\" onclick=\"window.location='supprimer_composant_affecter.php?id_composant=$id_composant&&id_materiel=$id_materiel'\">";
echo "&nbsp;";
echo "<input type='button' value=\"NON\" onclick=\"window.location='modifier_materiel_form.php?code=$id_materiel';\">";
echo "</form></center>";

  // deconnexion de la base
mysql_close(); 


?>
</p>
<p>&nbsp; </p>
</body>
</html>
