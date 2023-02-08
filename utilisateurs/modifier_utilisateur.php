<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Modifier utilisateur</title>
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
$mail=$_POST["mail"];
$observation=$_POST["observation"];
$fonction=$_POST["fonction_utilisateur"];
$batiment=$_POST["batiment_etage"];
$societe=$_POST["societe"];
$service=$_POST["service"];
$login=$_POST["login"];
$mdp=$_POST["mdp"];

$nom_complet = $nom.' '.$prenom;


//requete de mise à jour de la table utilisateur
$requete="update utilisateur set nom_utilisateur='".$nom."', prenom_utilisateur='".$prenom."', nom_complet_utilisateur='".$nom_complet."', tel_bureau_utilisateur='".$tel."', portable_utilisateur='".$port."', email_utilisateur='".$mail."', observation_utilisateur='".$observation."', id_fonction_utilisateur='".$fonction."', login_utilisateur='".$login."', mdp_utilisateur='".$mdp."' where id_utilisateur='".$code."'";
$resultat=mysql_query($requete) or die(mysql_error());

//requete de mise à jour de la table utilisateur
$requete1="update appartenir set  id_societe='".$societe."', id_service='".$service."', id_batiment_etage='".$batiment."'   where id_utilisateur='".$code."'";
$resultat1=mysql_query($requete1) or die(mysql_error());

if($resultat && $resultat1)
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
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_utilisateur.php';\">";
echo "</form>";

// deconnexion de la base
mysql_close(); 

?>
</body>
</html>