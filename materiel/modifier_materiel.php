<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Modifier materiel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body bgcolor="#fffcd9" marginheight="25" leftmargin="25">
<?
//récupération des données à modifier

$code=$_POST["code"];
$num_serie=$_POST["num_serie"];
$tag_ceff=$_POST["tag_ceff"];
$nom=$_POST["nom"];
$achat=$_POST["date_achat"];

// $achat est une valeur récupérée au format français
list($d,$m,$y) = explode('/', $achat);
$achat=$y.'-'.$m.'-'.$d; // date au format anglais
$societe=$_POST["societe"];
$statut=$_POST["statut"];
$modele_materiel=$_POST["modele_materiel"];
$type_materiel=$_POST["type_materiel"];
$adresseip=$_POST["adresseip"];
$observation=$_POST["observation"];

//requete de mise à jour du stock
$requete="update materiel set num_serie_materiel='".$num_serie."', tag_ceff_materiel='".$tag_ceff."', nom_materiel='".$nom."', date_achat_materiel='".$achat."', adresseip_materiel='".$adresseip."', observation_materiel='".$observation."', id_modele_materiel='".$modele_materiel."',id_type_materiel='".$type_materiel."', id_societe='".$societe."', id_statut='".$statut."' where id_materiel='".$code."'";
$resultat=mysql_query($requete) or die(mysql_error());

if($resultat)
  {
    echo("La modification à été correctement effectuée") ;
  }
  else
  {
    echo("La modification à échouée") ;
}

$requete2="select libelle_type_materiel from type_materiel where id_type_materiel=$type_materiel";
$resultat2=mysql_query($requete2) or die(mysql_error());
$row2=mysql_fetch_array($resultat2);

// bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_mat.php?libelle=$row2[0]';\">";
echo "</form>";

// deconnexion de la base
mysql_close(); 

?>
</body>
</html>