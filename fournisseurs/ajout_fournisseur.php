<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");
include('../connect_base.php');

echo("<b><u>Récapitulatif sur la société :  </u></b><BR>");

//récupérer les données du formulaire "ajout_fournisseur_form"

$n=$_POST['nom_societe'];
$t=$_POST['type_societe'];
$tel=$_POST['tel'];
$port=$_POST['portable'];
$fax=$_POST['fax'];
$ad=$_POST['adresse'];
$vil=$_POST['ville'];
$cp=$_POST['cp'];
$site=$_POST['site_web'];
$mail=$_POST['mail'];
$o=$_POST['observation'];

//Gestion du libelle type de société
$requete1="select libelle_type_societe from type_societe where id_type_societe=".$t.";";
$resultat1 = mysql_query($requete1) or die("erreur dans la requete : " . $requete1);
$row=mysql_fetch_row($resultat1);
$type_societe=$row[0];

echo"<BR>";
echo("<b>Nom de la société : </b>");
echo($n);echo"<BR>";
echo("<b>Type de société : </b>");
echo($type_societe);echo"<BR>";
echo("<b>Téléphone : </b>");
echo($tel);echo"<BR>";
echo("<b>Fax : </b>");
echo($fax);echo"<BR>";
echo("<b>E-Mail : </b>");
echo($mail);echo"<BR>";
echo("<b>Adresse : </b>");
echo($ad);echo"<BR>";
echo("<b>Ville : </b>");
echo($vil);echo"<BR>";
echo("<b>Code postal : </b>");
echo($cp);echo"<BR>";
echo("<b>Site Web : </b>");
echo($site);echo"<BR>";
echo("<b>Observation : </b>");
echo($o);echo"<BR>";

//gestion du numero d'evenement
  $requete="select max(id_societe) from societe;";
  $resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
 while($ctItem = mysql_fetch_array($resultat))//compteur pour afficher le rang de l inscrit
{
	$id_societe = $ctItem[0]+1;
}

  // bouton de retour
  
echo "<form>";
echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='ajouter_fournisseur_form.php';\">";
echo "</form>";

  // requéte insertion du nouvel enregistrement
  $query="insert into societe values ('".$id_societe."','".$n."','".$ad."','".$vil."','".$cp."','".$site."','".$tel."','".$port."','".$fax."','".$mail."','".$o."','".$t."');";

  // execution de la requète
  $resultat = mysql_query($query) or die("erreur dans la requete : " . $query);

  // deconnexion de la base
mysql_close(); 

?>
</body>
</html>

