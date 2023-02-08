<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");
include('../connect_base.php');

echo("<b><u>Récapitulatif du logiciel :  </u></b><BR>");

//récupérer les données du formulaire "ajout_logiciel_form"

$n=$_POST['nom_logiciel'];
$v=$_POST['version_logiciel'];
$sp=$_POST['service_pack'];
$so=$_POST['societe'];
$date_achat=$_POST['date_achat'];
$o=$_POST['observation'];




//Gestion du libelle service pack
$requete1="select libelle_service_pack from service_pack where id_service_pack=".$sp.";";
$resultat = mysql_query($requete1) or die("erreur dans la requete : " . $requete1);
$row=mysql_fetch_row($resultat);
$service_pack=$row[0];

//Gestion du libelle société
$requete2="select nom_societe from societe where id_societe=".$so.";";
$resultat1 = mysql_query($requete2) or die("erreur dans la requete : " . $requete2);
$row1=mysql_fetch_row($resultat1);
$societe=$row1[0];

//Gestion de la date
//$date_achat est une valeur récupérée au format DD/MM/YYYY
$date=$date_achat;
list($d,$m,$y) = explode('/', $date);
$date=$y.'-'.$m.'-'.$d; // date au format anglais

echo"<BR>";
echo("<b>Nom du logiciel : </b>");
echo($n);echo"<BR>";
echo("<b>Version du logiciel : </b>");
echo($v);echo"<BR>";
echo("<b>Service pack : </b>");
echo($service_pack);echo"<BR>";
echo("<b>Fabricant : </b>");
echo($societe);echo"<BR>";
echo("<b>Date d'achat : </b>");
echo($date_achat);echo"<BR>";
echo("<b>Observation : </b>");
echo($o);echo"<BR>";

//gestion du numero d'evenement
  $requete="select max(id_logiciel) from logiciel;";
  $resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
 while($ctItem = mysql_fetch_array($resultat))//compteur pour afficher le rang de l inscrit
{
	$id_logiciel = $ctItem[0]+1;
}

  // bouton de retour
  
echo "<form>";
echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='ajouter_logiciel_form.php';\">";
echo "</form>";

  // requéte insertion du nouvel enregistrement
  $query="insert into logiciel values ('".$id_logiciel."','".$n."','".$v."','".$date."','".$o."','".$so."','".$sp."');";

  // execution de la requète
  $resultat = mysql_query($query) or die("erreur dans la requete : " . $query);

  // deconnexion de la base
mysql_close(); 

?>
</body>
</html>

