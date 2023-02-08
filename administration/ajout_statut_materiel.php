<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Ajouter statut de matériel</title>
<meta http-equiv="Content-statut" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" statut="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">

<?php
echo("<b><u>Récapitulatif du statut de matériel :  </u></b><BR>");
//récupérer les données du formulaire "ajout_statut_materiel_form"
$libelle=$_REQUEST['libelle'];


echo"<BR>";echo("<b>Libellé : </b>");
echo($libelle);echo"<BR>";


  $requete="select max(id_statut) from statut;";
  $resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
 while($ctItem = mysql_fetch_array($resultat))//compteur pour afficher le rang de l inscrit
{
	$id_statut_materiel = $ctItem[0]+1;
}


  // requéte insertion du nouvel enregistrement
  $query="insert into statut values ('".$id_statut_materiel."','".$libelle."');";

  // execution de la requète
  $resultat = mysql_query($query) or die("erreur dans la requete : " . $query);

  // bouton de retour
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='ajout_statut_materiel_form.php';\">";
echo "</form>";
  // deconnexion de la base
mysql_close(); 

?>
</body>
</html>