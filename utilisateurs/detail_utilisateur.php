<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Détail utilisateur</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>

<body marginheight="40" bgcolor="#fffcd9" leftmargin="30">
<form>
<?php
$utilisateur=$_GET["code"];

//requête de travail
$requete="select * from utilisateur u, appartenir a, societe s, fonction_utilisateur f, service serv, batiment_etage b where u.id_fonction_utilisateur=f.id_fonction_utilisateur and u.id_utilisateur=a.id_utilisateur and a.id_societe=s.id_societe and a.id_service=serv.id_service and a.id_batiment_etage=b.id_batiment_etage and u.id_utilisateur='$utilisateur'";
$resultat=mysql_query($requete) or die(mysql_error());
$row=mysql_fetch_array($resultat);

$code=$row[0];
$nom=$row[1];
$prenom=$row[2];
$nom_complet=$row[3];
$login=$row[4];
$tel=$row[5];
$port=$row[6];
$mail=$row[7];
$observation=$row[9];
$fonction=$row[28];
$societe=$row[16];
$batiment=$row[32];
$service=$row[30];


echo "<center><span class=style2>Détail sur l'utilisateur ".$nom_complet."</span><br>";
echo "<br><br>";
?>

<form>
<input type="hidden" name="code" value="<?=$code?>">
Nom : <input name="nom" type="text"  value="<?=$nom?>" readonly="1">&nbsp&nbsp
Prenom : <input name="prennom" type="text"  value="<?=$prenom?>" readonly="1"><br><br>
Téléphone : <input name="tel" type="text"  value="<?=$tel?>" readonly="1">&nbsp&nbsp
Téléphone portable : <input name="port" type="text"  value="<?=$port?>" readonly="1"><br><br>
E-mail : <input name="mail" type="text"  value="<?=$mail?>"><br><br>
Fonction de l'utilisateur : <input name="fonction_utilisateur" type="text"  value="<?=$fonction?>" readonly="1" size="25">&nbsp&nbsp
Société : <input name="societe" type="text"  value="<?=$societe?>" readonly="1"><br><br>
Service : <input name="service" type="text"  value="<?=$service?>" readonly="1">&nbsp&nbsp
Batiment-Etage : <input name="batiment" type="text"  value="<?=$batiment?>" readonly="1" size="25"><br><br>
Observation : <textarea name="observation" readonly="1"><?=$observation?></textarea><br><br>
<p align="center" class="style4">Utilisateur CEFFPARC</p>
Login : <input name="login" type="text"  value="<?=$login?>" readonly="1"><br><br>

<input type="button" value="Retour" onClick="window.location='liste_utilisateur.php';">
</form>

</body>
</html>

<?
// deconnexion de la base
mysql_close(); 
?>