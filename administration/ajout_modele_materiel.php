<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Ajouter modele de mat�riel</title>
<meta http-equiv="Content-modele" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" modele="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">

<?php
echo("<b><u>R�capitulatif du mod�le de mat�riel :  </u></b><BR>");
//r�cup�rer les donn�es du formulaire "ajout_modele_materiel_form"
$libelle=$_REQUEST['libelle'];


echo"<BR>";echo("<b>Libell� : </b>");
echo($libelle);echo"<BR>";


  $requete="select max(id_modele_materiel) from modele_materiel;";
  $resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
 while($ctItem = mysql_fetch_array($resultat))//compteur pour afficher le rang de l inscrit
{
	$id_modele_materiel = $ctItem[0]+1;
}


  // requ�te insertion du nouvel enregistrement
  $query="insert into modele_materiel values ('".$id_modele_materiel."','".$libelle."');";

  // execution de la requ�te
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