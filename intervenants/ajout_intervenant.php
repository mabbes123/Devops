<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");
include('../connect_base.php');

echo("<b><u>Récapitulatif sur l'intervenant :  </u></b><BR>");

//récupérer les données du formulaire "ajout_intervenant_form"

$n=$_POST['nom'];
$p=$_POST['prenom'];
$tel=$_POST['tel'];
$port=$_POST['port'];
$fax=$_POST['fax'];
$mail=$_POST['mail'];
$o=$_POST['observation'];
$t=$_POST['type_intervenant'];
$s=$_POST['societe'];

//Gestion du nom de la société 
$requete1="select nom_societe from societe where id_societe=".$s.";";
$resultat1 = mysql_query($requete1) or die("erreur dans la requete : " . $requete1);
$row=mysql_fetch_row($resultat1);
$societe=$row[0];

//Gestion du libelle_type_intervenant
$requete2="select libelle_type_intervenant from type_intervenant where id_type_intervenant=".$t.";";
$resultat2 = mysql_query($requete2) or die("erreur dans la requete : " . $requete2);
$row1=mysql_fetch_row($resultat2);
$type=$row1[0];


echo"<BR>";
echo("<b>Nom de l'intervenant : </b>");
echo($n);echo"<BR>";
echo("<b>Prénom de l'intervenant : </b>");
echo($p);echo"<BR>";
echo("<b>Téléphone : </b>");
echo($tel);echo"<BR>";
echo("<b>Téléphone portable: </b>");
echo($port);echo"<BR>";
echo("<b>Fax : </b>");
echo($fax);echo"<BR>";
echo("<b>E-Mail : </b>");
echo($mail);echo"<BR>";
echo("<b>Observation : </b>");
echo($o);echo"<BR>";
echo("<b>Type : </b>");
echo($type);echo"<BR>";
echo("<b>Société : </b>");
echo($societe);echo"<BR>";

$nom_complet = $n.' '.$p;


//gestion du numero d'intervenant
  $requete="select max(id_intervenant) from intervenant;";
  $resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
 while($ctItem = mysql_fetch_array($resultat))//compteur pour afficher le rang de l inscrit
{
	$id_intervenant = $ctItem[0]+1;
}

  // bouton de retour
  
echo "<form>";
echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='ajouter_intervenant_form.php';\">";
echo "</form>";

  // requéte insertion du nouvel enregistrement
  $query="insert into intervenant values ('".$id_intervenant."','".$n."','".$p."','".$nom_complet."','".$tel."','".$port."','".$fax."','".$mail."','".$o."','".$t."','".$s."');";

  // execution de la requète
  $resultat = mysql_query($query) or die("erreur dans la requete : " . $query);

  // deconnexion de la base
mysql_close(); 

?>
</body>
</html>

