<?php
include('../connect_base.php');
?>

<html>
<head>
<title>modification site ceff</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">


</head>

<body marginheight="40" bgcolor="#fffcd9" leftmargin="30">
<form action="modifier_site_ceff_form3.php" method="POST">
<?php
$societe=$_GET["code"];

//requête de travail
$requete="select * from societe where id_societe='$societe'";
$resultat=mysql_query($requete) or die(mysql_error());
$row=mysql_fetch_array($resultat);

$code=$row[0];
$nom=$row[1];
$adresse=$row[2];
$ville=$row[3];
$cp=$row[4];
$site=$row[5];
$tel=$row[6];
$port=$row[7];
$fax=$row[8];
$mail=$row[9];
$observation=$row[10];
$type_societe=$row[11];

//requête de récupération du libelle type société pour titre 
$requete1="select libelle_type_societe from type_societe where id_type_societe='$type_societe'";
$resultat1=mysql_query($requete1) or die(mysql_error());
$row1=mysql_fetch_array($resultat1);

$libelle_type_societe=$row1[0];

//Titre de la page
  echo "<center>";
  echo "<span class=style2>Modification de la société ".$nom." de type ".$libelle_type_societe."</span><br>";
  echo "<br><br>";
?>
<input type="hidden" name="code" value="<?=$code?>">
Nom : <input name="nom" type="text"  value="<?=$nom?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Type de société : <?php $requete1 = mysql_query("SELECT * FROM type_societe where libelle_type_societe ='site CEFF'"); ?> 
			<select name="type_societe" id="type_societe">
			<?php
				while($recup = mysql_fetch_array($requete1)) {
			?>
   			<option value="<?php echo $recup['id_type_societe']; ?>"><?php echo $recup['libelle_type_societe']; ?>
			</option>
			<?php
    		}
			?>
            </select><br><br>
Adresse : <textarea name="adresse"><?=$adresse?></textarea><br><br>
Ville : <input name="ville" type="text"  value="<?=$ville?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Code postal : <input name="cp" type="text"  value="<?=$cp?>"><br><br>
Site Web : <input name="site" type="text" value="<?=$site?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Téléphone : <input name="tel" type="text"  value="<?=$tel?>" maxlength="10"><br><br>
Téléphone Portable : <input name="port" type="text"  value="<?=$port?>" maxlength="10">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Fax : <input name="fax" type="text"  value="<?=$fax?>" maxlength="10"><br><br>
E-Mail : <input name="mail" type="text"  value="<?=$mail?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Observation : <textarea name="observation"><?=$observation?></textarea><br><br>




<input type="button" value="Retour" onClick="window.location='modifier_site_ceff_form.php';">
<input name="valider" type="submit" value="Modifier">
</form>

</body>
</html>

<?
// deconnexion de la base
mysql_close(); 
?>