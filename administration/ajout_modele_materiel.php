<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Ajouter modele de matériel</title>
<meta http-equiv="Content-modele" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" modele="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">

<?php
echo("<b><u>Récapitulatif du modèle de matériel :  </u></b><BR>");
//récupérer les données du formulaire "ajout_modele_materiel_form"
$libelle=$_REQUEST['libelle'];


echo"<BR>";echo("<b>Libellé : </b>");
echo($libelle);echo"<BR>";


  $requete="select max(id_modele_materiel) from modele_materiel;";
  $resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
 while($ctItem = mysql_fetch_array($resultat))//compteur pour afficher le rang de l inscrit
{
	$id_modele_materiel = $ctItem[0]+1;
}


  // requéte insertion du nouvel enregistrement
  $query="insert into modele_materiel values ('".$id_modele_materiel."','".$libelle."');";

  // execution de la requète
  $resultat = mysql_query($query) or die("erreur dans la requete : " . $query);

  // bouton de retour
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='ajout_modele_materiel_form.php';\">";
echo "</form>";
  // deconnexion de la base
mysql_close(); 

?>
</body>
</html>