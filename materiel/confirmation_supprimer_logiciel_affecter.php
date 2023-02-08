<html>
<body marginheight="20" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");

include('../connect_base.php');

//récupérer les données envoyées par l'URL
$id_materiel=$_GET['id_materiel'];
$id_logiciel=$_GET['id_logiciel'];


// requéte affichage du nom du logiciel, version, service_pack et du nom du materiel auquel le composant était affecter
  $requete="SELECT nom_materiel, nom_logiciel, version_logiciel, libelle_service_pack
            from installer i, logiciel l, service_pack s, materiel m
	  		where s.id_service_pack=l.id_service_pack
					and m.id_materiel=i.id_materiel
					and l.id_logiciel=i.id_logiciel 
					and i.id_materiel=".$id_materiel."
					and i.id_logiciel=".$id_logiciel.";";
							
  // execution de la requète et test
  $resultat = mysql_query($requete);
  $row=mysql_fetch_array($resultat);

  //Titre de la page
  echo "<center>";
  echo "<span class=style2>Suppression du logiciel ".$row[1]." ".$row[2]." ".$row[3]." affecté au matériel ".$row[0]."</span><br>";
  echo "<br><br>";
  

  echo "Voulez-vous vraiment supprimer cette enregistrement ?";
  echo "<br><br>";
  
  
	
  // bouton de retour

echo "<form>";
echo "<input type='button' value=\"OUI\" onclick=\"window.location='supprimer_logiciel_affecter.php?id_logiciel=$id_logiciel&&id_materiel=$id_materiel'\">";
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
