<html>
<body marginheight="20" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");

include('../connect_base.php');

//récupérer les données envoyées par l'URL
$intervenant=$_GET['code'];

// requéte affichage du nom et du libelle_type d'intervenant
  $requete="SELECT nom_intervenant, libelle_type_intervenant
            from intervenant i, type_intervenant t 
	  where i.id_type_intervenant=t.id_type_intervenant and id_intervenant=".$intervenant ;
  // execution de la requète et test
  $resultat = mysql_query($requete);
  $row=mysql_fetch_array($resultat);
  
  //Titre de la page
  echo "<center>";
  echo "<span class=style2>Suppression de l'intervenant ".$row[0]." de type ".$row[1]."</span><br>";
  echo "<br><br>";
  
  
  echo "Voulez-vous vraiment supprimer cette enregistrement ?";
  echo "<br><br>";
  
  
	
  // bouton de retour
  
echo "<form>";
echo "<input type='button' value=\"OUI\" onclick=\"window.location='supprimer_intervenant.php?code=$intervenant';\">";
echo "&nbsp;";
echo "<input type='button' value=\"NON\" onclick=\"window.location='liste_intervenant.php';\">";
echo "</form></center>";

  // deconnexion de la base
mysql_close(); 


?>
</p>
<p>&nbsp; </p>
</body>
</html>
