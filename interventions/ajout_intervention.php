<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");
include('../connect_base.php');

echo("<b><u>Récapitulatif sur le ticket d'intervention :  </u></b><BR>");

//récupérer les données du formulaire "ajout_fournisseur_form"

$materiel=$_POST['materiel'];
$type_materiel=$_POST['type_materiel'];

$date_probleme=$_POST['date_probleme'];
// $date_probleme est une valeur récupérée au format DD/MM/YYYY
list($d,$m,$y) = explode('/', $date_probleme);
$date_probleme1=$y.'-'.$m.'-'.$d; // date au format anglais

$probleme=$_POST['probleme'];
$date_intervention=$_POST['date_intervention'];
// $date_intervention est une valeur récupérée au format DD/MM/YYYY
list($d,$m,$y) = explode('/', $date_intervention);
$date_intervention1=$y.'-'.$m.'-'.$d; // date au format anglais

$duree=$_POST['duree'];
$intervenant=$_POST['intervenant'];
$compte_rendu=$_POST['compte_rendu'];


//Gestion du nom de materiel
$requete1="select nom_materiel from materiel where id_materiel=".$materiel.";";
$resultat1 = mysql_query($requete1) or die("erreur dans la requete : " . $requete1);
$row1=mysql_fetch_row($resultat1);
$nom_materiel=$row1[0];


//Gestion du nom de l'intervenant
$requete2="select nom_complet_intervenant from intervenant where id_intervenant=".$intervenant.";";
$resultat2 = mysql_query($requete2) or die("erreur dans la requete : " . $requete2);
$row2=mysql_fetch_row($resultat2);
$nom_intervenant=$row2[0];

//Gestion du nom de materiel
$requete3="select libelle_type_materiel from type_materiel where id_type_materiel=".$type_materiel.";";
$resultat3 = mysql_query($requete3) or die("erreur dans la requete : " . $requete3);
$row3=mysql_fetch_row($resultat3);
$libelle_type_materiel=$row3[0];

echo"<BR>";
echo("<b>Type de matériel : </b>");
echo($libelle_type_materiel);echo"<BR>";
echo("<b>Nom du matériel : </b>");
echo($nom_materiel);echo"<BR>";
echo("<b>Date du problème : </b>");
echo($date_probleme);echo"<BR>";
echo("<b>Problème : </b>");
echo($probleme);echo"<BR>";
echo("<b>Date de l'intervention : </b>");
echo($date_intervention);echo"<BR>";
echo("<b>Durée de l'intervention : </b>");
echo($duree);echo"<BR>";
echo("<b>Intervenant : </b>");
echo($nom_intervenant);echo"<BR>";
echo("<b>Compte Rendu : </b>");
echo($compte_rendu);echo"<BR>";


//gestion du numero d'intervention
  $requete="select max(id_intervention) from intervention;";
  $resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
 while($ctItem = mysql_fetch_array($resultat))//compteur pour afficher le rang de l inscrit
{
	$id_intervention = $ctItem[0]+1;
}

  // bouton de retour
  
echo "<form>";
echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='ajouter_intervention_form.php';\">";
echo "</form>";

  // requéte insertion du nouvel enregistrement
  $query="insert into intervention values ('".$id_intervention."','".$probleme."','".$date_probleme1."','".$date_intervention1."','".$duree."','".$compte_rendu."','".$intervenant."','".$materiel."');";

  // execution de la requète
  $resultat = mysql_query($query) or die("erreur dans la requete : " . $query);

  // deconnexion de la base
mysql_close(); 

?>
</body>
</html>

