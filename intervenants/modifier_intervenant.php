<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Modifier intervenant</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body bgcolor="#fffcd9" marginheight="25" leftmargin="25">
<?
//récupération des données à modifier
$code=$_POST["code"];
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$tel=$_POST["tel"];
$port=$_POST["port"];
$fax=$_POST["fax"];
$mail=$_POST["mail"];
$observation=$_POST["observation"];
$type_intervenant=$_POST["type_intervenant"];
$societe=$_POST["societe"];

$nom_complet = $nom.' '.$prenom;

//requete de mise à jour 
$requete="update intervenant set nom_intervenant='".$nom."', prenom_intervenant='".$prenom."', nom_complet_intervenant='".$nom_complet."', tel_intervenant='".$tel."', portable_intervenant='".$port."', fax_intervenant='".$fax."', email_intervenant='".$mail."', observation_intervenant='".$observation."', id_type_intervenant='".$type_intervenant."', id_societe='".$societe."'  where id_intervenant='".$code."'";
$resultat=mysql_query($requete) or die(mysql_error());

if($resultat)
  {
    echo("La modification à été correctement effectuée") ;
  }
  else
  {
    echo("La modification à échouée") ;
}

// bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_intervenant.php';\">";
echo "</form>";

// deconnexion de la base
mysql_close(); 

?>
</body>
</html>