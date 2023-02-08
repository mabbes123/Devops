<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");
include('../connect_base.php');

echo("<b><u>Récapitulatif sur l'affectation du matériel :  </u></b><BR>");

//récupérer les données du formulaire "affecter_materiel_form"

$materiel=$_POST['id_materiel'];
$utilisateur=$_POST['utilisateur'];


//Gestion du nom de l'utilisateur
$requete1="select nom_complet_utilisateur from utilisateur where id_utilisateur=".$utilisateur.";";
$resultat1 = mysql_query($requete1) or die("erreur dans la requete : " . $requete1);
$row1=mysql_fetch_row($resultat1);
$nom_complet_utilisateur=$row1[0];

//Gestion du type_materiel et du nom_materiel
$requete2="select libelle_type_materiel, nom_materiel 
			from type_materiel t, materiel m 
			where t.id_type_materiel=m.id_type_materiel
				and id_materiel=".$materiel.";";
				
$resultat2 = mysql_query($requete2) or die("erreur dans la requete : " . $requete2);
$row2=mysql_fetch_row($resultat2);
$libelle_type_materiel=$row2[0];
$nom_materiel=$row2[1];


echo"<BR>";
echo("<b>Type de matériel affecté : </b>");
echo($libelle_type_materiel);echo"<BR>";
echo("<b>Nom du matériel affecté : </b>");
echo($nom_materiel);echo"<BR>";
echo("<b>Utilisateur affecté : </b>");
echo($nom_complet_utilisateur);echo"<BR>";

  // bouton de retour
  
echo "<form>";
echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='liste_mat.php?libelle=".$libelle_type_materiel."';\">";
echo "</form>";


  // requéte insertion du nouvel enregistrement dans la table materiel
  $requete5="update materiel set id_utilisateur='".$utilisateur."' where id_materiel='".$materiel."'";
  // execution de la requète
  $resultat5 = mysql_query($requete5) or die("erreur dans la requete : " .$requete5);
 

  // deconnexion de la base
mysql_close(); 

?>
</body>
</html>

