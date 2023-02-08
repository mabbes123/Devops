<html>
<body marginheight="20" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");

include('../connect_base.php');

//récupérer les données du formulaire "sup_even"
$societe=$_GET['code'];

// requéte affichage du nom et du libelle_type de la société
  $requete="SELECT nom_societe, libelle_type_societe
            from societe s, type_societe t 
	  where s.id_type_societe=t.id_type_societe and id_societe=".$societe ;
  // execution de la requète et test
  $resultat = mysql_query($requete);
  $row=mysql_fetch_array($resultat);
  
  //Titre de la page
  echo "<center>";
  echo "<span class=style2>Suppression de la société ".$row[0]." de type ".$row[1]."</span><br>";
  echo "<br><br>";
  
  
  echo "Voulez-vous vraiment supprimer cette enregistrement ?";
  echo "<br><br>";
  
  
	
  // bouton de retour
  
echo "<form>";
echo "<input type='button' value=\"OUI\" onclick=\"window.location='supprimer_fournisseur.php?code=$societe';\">";
echo "&nbsp;";
echo "<input type='button' value=\"NON\" onclick=\"window.location='liste_fournisseur.php';\">";
echo "</form></center>";

  // deconnexion de la base
mysql_close(); 


?>
</p>
<p>&nbsp; </p>
</body>
</html>
