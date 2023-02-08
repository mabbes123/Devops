<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"lien.css\">");
include('../connect_base.php');

echo("<b><u>Récapitulatif du composant :  </u></b><BR>");

//récupérer les données du formulaire "ajout_composant_form"

$t=$_POST['type_composant'];
$n=$_POST['nom_composant'];
$s=$_POST['societe'];

//Gestion du libelle type_composant
$requete1="select libelle_type_composant from type_composant where id_type_composant=".$t.";";
$resultat = mysql_query($requete1) or die("erreur dans la requete : " . $requete1);
$row=mysql_fetch_row($resultat);
$type_composant=$row[0];

//Gestion du libelle société
$requete2="select nom_societe from societe where id_societe=".$s.";";
$resultat1 = mysql_query($requete2) or die("erreur dans la requete : " . $requete2);
$row1=mysql_fetch_row($resultat1);
$societe=$row1[0];

echo"<BR>";
echo("<b>Type de composant : </b>");
echo($type_composant);echo"<BR>";
echo("<b>Nom du composant : </b>");
echo($n);echo"<BR>";
echo("<b>Fabriquant : </b>");
echo($societe);echo"<BR>";

//gestion du numero d'evenement
  $requete="select max(id_composant) from composant;";
  $resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
 while($ctItem = mysql_fetch_array($resultat))//compteur pour afficher le rang de l inscrit
{
	$id_composant = $ctItem[0]+1;
}

  // bouton de retour
  
echo "<form>";
echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='ajout_composant_form.php';\">";
echo "</form>";

  // requéte insertion du nouvel enregistrement
  $query="insert into composant values ('".$id_composant."','".$n."','".$s."','".$t."');";

  // execution de la requète
  $resultat = mysql_query($query) or die("erreur dans la requete : " . $query);

  // deconnexion de la base
mysql_close(); 

?>
</body>
</html>
