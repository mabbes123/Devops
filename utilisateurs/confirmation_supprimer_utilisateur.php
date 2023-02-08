<html>
<body marginheight="20" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");

include('../connect_base.php');

//récupérer les données envoyées par l'URL
$utilisateur=$_GET['code'];

// requéte affichage du nom et du libelle_type d'utilisateur
  $requete="SELECT nom_complet_utilisateur, nom_societe
            from utilisateur u, appartenir a, societe s 
	  		where u.id_utilisateur=a.id_utilisateur and a.id_societe = s.id_societe and 			u.id_utilisateur=".$utilisateur ;
  // execution de la requète et test
  $resultat = mysql_query($requete);
  $row=mysql_fetch_array($resultat);
  
  //Titre de la page
  echo "<center>";
  echo "<span class=style2>Suppression de l'utilisateur ".$row[0]." employé de la société ".$row[1]."</span><br>";
  echo "<br><br>";
  
  
  echo "Voulez-vous vraiment supprimer cette enregistrement ?";
  echo "<br><br>";
  
  
	
  // bouton de retour
  
echo "<form>";
echo "<input type='button' value=\"OUI\" onclick=\"window.location='supprimer_utilisateur.php?code=$utilisateur';\">";
echo "&nbsp;";
echo "<input type='button' value=\"NON\" onclick=\"window.location='liste_utilisateur.php';\">";
echo "</form></center>";

  // deconnexion de la base
mysql_close(); 


?>
</p>
<p>&nbsp; </p>
</body>
</html>
