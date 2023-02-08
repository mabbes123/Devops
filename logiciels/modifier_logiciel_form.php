<?php
include('../connect_base.php');
?>

<html>
<head>
<title>modificationlogiciel1</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<link href="../tableau.css" rel="stylesheet" type="text/css">

<body marginheight="40" bgcolor="#fffcd9" leftmargin="30">
<form action="modifier_logiciel.php" method="POST">
<?php
$logiciel=$_GET["code"];



//requête de travail
$requete="select * from logiciel where id_logiciel='$logiciel'";
$resultat=mysql_query($requete) or die(mysql_error());
while ($row=mysql_fetch_array($resultat))
{
$code=$row[0];
$nom=$row[1];
$version=$row[2];
$achat=$row[3];
// $achat est une valeur récupérée au format YYYY-MM-DD
list($y,$m,$d) = explode('-', $achat);
$achat=$d.'/'.$m.'/'.$y; // date au format français
$observation=$row[4];
$id_service_pack=$row[5];
}

echo "<center>";
echo "<span class=style2>Modification du logiciel ".$nom." ".$version."</span><br>";
echo "<br><br>";

?>
<input type="hidden" name="code" value="<?=$code?>">
Nom : <input name="nom" type="text"  value="<?=$nom?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Version : <input name="version" type="text"  value="<?=$version?>"><br><br>
Service pack : <?php $requete1 = mysql_query("SELECT * FROM service_pack where id_service_pack>1"); ?> 
			<select name="service_pack" id="service_pack">
			<?php
				while($recup = mysql_fetch_array($requete1)) {
			?>
   			<option value="<?php echo $recup['id_service_pack']; ?>"><?php echo $recup['libelle_service_pack']; ?>
			</option>
			<?php
    		}
			?>
            </select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Fabricant : <?php
	$requete2 = mysql_query("SELECT * FROM societe s, type_societe t where s.id_type_societe=t.id_type_societe and id_societe>1 and libelle_type_societe <> 'Site CEFF'");
	?>

	<select name="societe" id="societe">
	<?php
	while($recup2 = mysql_fetch_array($requete2)) {
	?>
    <option value="<?php echo $recup2['id_societe']; ?>" selected><?php echo $recup2['nom_societe']; ?></option>
	<?php
    }
    ?></select>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp			
Date d'achat : <input name="dateachat" type="text" value="<?=$achat?>"> format de la date JJ/MM/AAAA<br><br>
Observation : <textarea name="observation"><?=$observation?></textarea><br><br>

<input type="button" value="Retour" onClick="window.location='liste_logiciel.php';">
<input name="valider" type="submit" value="Modifier">
</form>

</body>
</html>

<?
// deconnexion de la base
mysql_close(); 
?>