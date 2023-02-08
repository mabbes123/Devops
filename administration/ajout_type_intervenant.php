<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Ajouter Type d'intervenant</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">

<?php
echo("<b><u>Récapitulatif du type d'intervenant :  </u></b><BR>");
//récupérer les données du formulaire "ajout_type_intervenant_form"
$libelle=$_REQUEST['libelle'];


echo"<BR>";echo("<b>Libellé : </b>");
echo($libelle);echo"<BR>";


  $requete="select max(id_type_intervenant) from type_intervenant;";
  $resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
 while($ctItem = mysql_fetch_array($resultat))//compteur pour afficher le rang de l inscrit
{
	$id_type_intervenant = $ctItem[0]+1;
}


  // requéte insertion du nouvel enregistrement
  $query="insert into type_intervenant values ('".$id_type_intervenant."','".$libelle."');";

  // execution de la requète
  $resultat = mysql_query($query) or die("erreur dans la requete : " . $query);

  // bouton de retour
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='ajout_type_intervenant_form.php';\">";
echo "</form>";
  // deconnexion de la base
mysql_close(); 

?>
</body>
</html>