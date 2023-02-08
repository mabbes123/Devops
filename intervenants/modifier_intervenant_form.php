<?php
include('../connect_base.php');
?>

<html>
<head>
<title>modification intervenant</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">


</head>

<body marginheight="40" bgcolor="#fffcd9" leftmargin="30">
<form action="modifier_intervenant.php" method="POST">
<?php
$intervenant=$_GET["code"];

//requête de travail
$requete="select * from intervenant where id_intervenant>1 and id_intervenant='$intervenant'";
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

//requête de récupération du libelle type intervenant pour titre 
$requete1="select libelle_type_intervenant from type_intervenant where id_type_intervenant='$type_intervenant'";
$resultat1=mysql_query($requete1) or die(mysql_error());
$row1=mysql_fetch_array($resultat1);

$libelle_type_intervenant=$row1[0];

//requête de récupération du nom de la société embauchant l'intervenant pour titre 
$requete2="select nom_societe from societe where id_societe='$societe'";
$resultat2=mysql_query($requete2) or die(mysql_error());
$row2=mysql_fetch_array($resultat2);

$nom_societe=$row2[0];

//Titre de la page
  echo "<center>";
  echo "<span class=style2>Modification de l'intervenant ".$nom_complet." de type ".$libelle_type_intervenant." employé de l'entreprise ".$nom_societe."</span><br>";
  echo "<br><br>";
?>
<input type="hidden" name="code" value="<?=$code?>">
Nom : <input name="nom" type="text"  value="<?=$nom?>">&nbsp&nbsp
Prénom : <input name="prenom" type="text"  value="<?=$prenom?>"><br><br>
Téléphone : <input name="tel" type="text"  value="<?=$tel?>" maxlength="10">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
Téléphone portable: <input name="port" type="text"  value="<?=$port?>" maxlength="10"><br><br>
Fax: <input name="fax" type="text"  value="<?=$fax?>" maxlength="10">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
E-mail: <input name="mail" type="text"  value="<?=$mail?>"><br><br>
Observation : <textarea name="observation"><?=$observation?></textarea><br><br>

Type d'intervenant : <?php $requete3 = mysql_query("SELECT * FROM type_intervenant where id_type_intervenant >1"); ?> 
			<select name="type_intervenant" id="type_intervenant">
			<?php
				while($recup = mysql_fetch_array($requete3)) {
			?>
   			<option value="<?php echo $recup['id_type_intervenant']; ?>"><?php echo $recup['libelle_type_intervenant']; ?>
			</option>
			<?php
    		}
			?>
            </select><br><br>
Societe : <?php $requete4 = mysql_query("SELECT * FROM societe where id_societe>1"); ?> 
			<select name="societe" id="societe">
			<?php
				while($recup = mysql_fetch_array($requete4)) {
			?>
   			<option value="<?php echo $recup['id_societe']; ?>"><?php echo $recup['nom_societe']; ?>
			</option>
			<?php
    		}
			?>
            </select><br><br>




<input type="button" value="Retour" onClick="window.location='liste_intervenant.php';">
<input name="valider" type="submit" value="Modifier">
</form>

</body>
</html>

<?
// deconnexion de la base
mysql_close(); 
?>