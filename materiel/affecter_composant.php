<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Modifier materiel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">

</head>

<body bgcolor="#fffcd9" marginheight="25" leftmargin="25">
<?
//récupération des données à modifier

$id_materiel=$_POST["code"];
$id_composant=$_POST["composant"];
$precision=$_POST["precision"];
$qte=$_POST["qte"];


//requete de mise à jour du stock
$requete="insert into composer set id_materiel='".$id_materiel."', id_composant='".$id_composant."', precision_composant='".$precision."', qte_composant='".$qte."'";
$resultat=mysql_query($requete) or die(mysql_error());

if($resultat)
  {
    echo("<center><span class=style3>L'insertion a correctement été effectué</span><br>") ;
  }
  else
  {
    echo("<center><span class=style3>L'insertion a échouée</span><br>") ;
}


// bouton de retour
echo "<br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='modifier_materiel_form.php?code=$id_materiel';\">";
echo "</form>";

// deconnexion de la base
mysql_close(); 

?>
</body>
</html>