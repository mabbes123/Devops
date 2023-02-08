<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Modifier logiciel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body bgcolor="#fffcd9" marginheight="25" leftmargin="25">
<?
//récupération des données à modifier
$code=$_POST["code"];
$nom=$_POST["nom"];
$version=$_POST["version"];
$achat=$_POST["dateachat"];
$societe=$_POST["societe"];

// $achat est une valeur récupérée au format français
list($d,$m,$y) = explode('/', $achat);
$achat=$y.'-'.$m.'-'.$d; // date au format anglais

$service_pack=$_POST["service_pack"];
$observation=$_POST["observation"];

//requete de mise à jour du logiciel
$requete="update logiciel set nom_logiciel='".$nom."', version_logiciel='".$version."', date_achat_logiciel='".$achat."', observation_logiciel='".$observation."', id_service_pack='".$service_pack."', id_societe='".$societe."' where id_logiciel='".$code."'";
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
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_logiciel.php';\">";
echo "</form>";

// deconnexion de la base
mysql_close(); 

?>
</body>
</html>