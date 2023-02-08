<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");
include('../connect_base.php');

echo("<b><u>Récapitulatif sur l'utilisateur :  </u></b><BR>");

//récupérer les données du formulaire "ajout_utilisateur_form"

$num_serie=$_POST['num_serie'];
$tag_ceff=$_POST['tag_ceff'];
$nom=$_POST['nom'];
$date_achat=$_POST['date_achat'];
$societe=$_POST['societe'];
$statut=$_POST['statut'];
$modele_materiel=$_POST['modele_materiel'];
$type_materiel=$_POST['type_materiel'];
$adresseip=$_POST['adresseip'];
$observation=$_POST['observation'];


//Gestion de la date
//$date_achat est une valeur récupérée au format DD/MM/YYYY
$date=$date_achat;
list($d,$m,$y) = explode('/', $date);
$date=$y.'-'.$m.'-'.$d; // date au format anglais

//Gestion du nom de la société 
$requete1="select nom_societe from societe where id_societe=".$societe.";";
$resultat1 = mysql_query($requete1) or die("erreur dans la requete : " . $requete1);
$row1=mysql_fetch_row($resultat1);
$nom_societe=$row1[0];

//Gestion du libelle_statut
$requete2="select libelle_statut from statut where id_statut=".$statut.";";
$resultat2 = mysql_query($requete2) or die("erreur dans la requete : " . $requete2);
$row2=mysql_fetch_row($resultat2);
$libelle_statut=$row2[0];

//Gestion du libelle_modele_materiel
$requete3="select libelle_modele_materiel from modele_materiel where id_modele_materiel=".$modele_materiel.";";
$resultat3 = mysql_query($requete3) or die("erreur dans la requete : " . $requete3);
$row3=mysql_fetch_row($resultat3);
$libelle_modele_materiel=$row3[0];

//Gestion du libelle_service
$requete4="select libelle_type_materiel from type_materiel where id_type_materiel=".$type_materiel.";";
$resultat4 = mysql_query($requete4) or die("erreur dans la requete : " . $requete4);
$row4=mysql_fetch_row($resultat4);
$libelle_type_materiel=$row4[0];

echo"<BR>";
echo("<b>Numéro de série de l'ordinateur : </b>");
echo($num_serie);echo"<BR>";
echo("<b>Service tag CEFF : </b>");
echo($tag_ceff);echo"<BR>";
echo("<b>Nom du matériel : </b>");
echo($nom);echo"<BR>";
echo("<b>Date d'achat : </b>");
echo($date_achat);echo"<BR>";
echo("<b>Fabricant : </b>");
echo($nom_societe);echo"<BR>";
echo("<b>Statut : </b>");
echo($libelle_statut);echo"<BR>";
echo("<b>Modèle du matériel : </b>");
echo($libelle_modele_materiel);echo"<BR>";
echo("<b>Type de matériel: </b>");
echo($libelle_type_materiel);echo"<BR>";
echo("<b>Adresse IP du matériel : </b>");
echo($adresseip);echo"<BR>";
echo("<b>Observation : </b>");
echo($observation);echo"<BR><BR>";


//gestion du numero d'utilisateur
  $requete="select max(id_materiel) from materiel;";
  $resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
 while($ctItem = mysql_fetch_array($resultat))//compteur pour afficher le rang de l inscrit
{
	$id_materiel = $ctItem[0]+1;
}

  // bouton de retour
  
echo "<form>";
echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='ajouter_materiel_form.php';\">";
echo "</form>";


  // requéte insertion du nouvel enregistrement dans la table materiel
  $requete5="insert into materiel values ('".$id_materiel."','".$num_serie."','".$tag_ceff."','".$nom."','".$date."','".$adresseip."', '".$observation."','".$modele_materiel."','".$type_materiel."',null,'".$societe."','".$statut."');";
  // execution de la requète
  $resultat5 = mysql_query($requete5) or die("erreur dans la requete : " .$requete5);
 

  // deconnexion de la base
mysql_close(); 

?>
</body>
</html>

