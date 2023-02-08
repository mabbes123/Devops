<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Détail intervenant</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>

<body marginheight="40" bgcolor="#fffcd9" leftmargin="30">
<form action="modifier_intervenant.php" method="POST">
<?php
$intervenant=$_GET["code"];

//requête de travail
$requete="select * from intervenant where id_intervenant='$intervenant'";
$resultat=mysql_query($requete) or die(mysql_error());
$row=mysql_fetch_array($resultat);

$code=$row[0];
$nom=$row[1];
$prenom=$row[2];
$nom_complet=$row[3];
$tel=$row[4];
$port=$row[5];
$fax=$row[6];
$mail=$row[7];
$observation=$row[8];
$type_intervenant=$row[9];
$societe=$row[10];


// requéte de récupération du libelle_type de l'intervenant
  $requete1="SELECT libelle_type_intervenant
            from type_intervenant t 
	  where id_type_intervenant=".$type_intervenant ;
  // execution de la requète et test
  $resultat1 = mysql_query($requete1);
  $row1=mysql_fetch_array($resultat1);

$libelle_type_intervenant=$row1[0];

//requête de récupération du nom de la société embauchant l'intervenant pour titre 
$requete2="select nom_societe from societe where id_societe='$societe'";
$resultat2=mysql_query($requete2) or die(mysql_error());
$row2=mysql_fetch_array($resultat2);

$nom_societe=$row2[0];



echo "<center><span class=style2>Détail sur l'intervenant ".$nom_complet."</span><br>";
echo "<br><br>";
?>
<input type="hidden" name="code" value="<?=$code?>">
Nom : <input name="nom" type="text"  value="<?=$nom?>" readonly="1">&nbsp&nbsp
Prenom : <input name="prennom" type="text"  value="<?=$prenom?>" readonly="1"><br><br>
Type de intervenant : <input name="type_intervenant" type="text"  value="<?=$libelle_type_intervenant?>" readonly="1">&nbsp&nbsp
Société l'employant : <input name="societe" type="text"  value="<?=$nom_societe?>" readonly="1"><br><br>
Téléphone : <input name="tel" type="text"  value="<?=$tel?>" readonly="1">&nbsp&nbsp
Téléphone Portable : <input name="port" type="text"  value="<?=$port?>" readonly="1"><br><br>
Fax : <input name="fax" type="text"  value="<?=$fax?>" readonly="1">&nbsp&nbsp
E-Mail : <input name="mail" type="text"  value="<?=$mail?>" readonly="1"><br><br>
Observation : <textarea name="observation" readonly="1"><?=$observation?></textarea><br><br>




<input type="button" value="Retour" onClick="window.location='liste_intervenant.php';">
</form>

</body>
</html>

<?
// deconnexion de la base
mysql_close(); 
?>