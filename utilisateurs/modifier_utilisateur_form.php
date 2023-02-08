<?php
include('../connect_base.php');
?>

<html>
<head>
<title>modification utilisateur</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">


</head>

<body marginheight="40" bgcolor="#fffcd9" leftmargin="30">
<form action="modifier_utilisateur.php" method="POST">
<?php
$utilisateur=$_GET["code"];

//requête de travail
$requete1="select * from utilisateur u, appartenir a where u.id_utilisateur=a.id_utilisateur and u.id_utilisateur='$utilisateur'";
$resultat1=mysql_query($requete1) or die(mysql_error());
$row=mysql_fetch_array($resultat1);


$code=$row[0];
$nom=$row[1];
$prenom=$row[2];
$login=$row[4];
$tel=$row[5];
$port=$row[6];
$mail=$row[7];
$mdp=$row[8];
$observation=$row[9];
$fonction=$row[10];
$societe=$row[11];
$batiment=$row[13];
$service=$row[14];


//requête de récupération du nom de la société embauchant l'utilisateur pour titre 
$requete2="select nom_societe from societe where id_societe='$societe'";
$resultat2=mysql_query($requete2) or die(mysql_error());
$row1=mysql_fetch_array($resultat2);

$nom_societe=$row1[0];


//Titre de la page
  echo "<center>";
  echo "<span class=style2>Modification de l'utilisateur ".$nom_complet." employé de l'entreprise ".$nom_societe."</span><br>";
  echo "<br><br>";
?>

<input type="hidden" name="code" value="<?=$code?>">
Nom : <input name="nom" type="text"  value="<?=$nom?>">&nbsp&nbsp
Prénom : <input name="prenom" type="text"  value="<?=$prenom?>"><br><br>
Téléphone : <input name="tel" type="text"  value="<?=$tel?>" maxlength="10">&nbsp&nbsp
Téléphone portable: <input name="port" type="text"  value="<?=$port?>" maxlength="10"><br><br>
E-mail: <input name="mail" type="text"  value="<?=$mail?>"><br><br>
Fonction de l'utilisateur : <?php $requete3 = mysql_query("SELECT * FROM fonction_utilisateur where id_fonction_utilisateur >1"); ?> 
			<select name="fonction_utilisateur" id="fonction_utilisateur">
			<?php
				while($recup = mysql_fetch_array($requete3)) {
			?>
   			<option value="<?php echo $recup['id_fonction_utilisateur']; ?>"><?php echo $recup['libelle_fonction_utilisateur']; ?>
			</option>
			<?php
    		}
			?>
            </select>&nbsp&nbsp
Batiment-Etage : <?php $requete4 = mysql_query("SELECT * FROM batiment_etage"); ?> 
			<select name="batiment_etage" id="batiment_etage">
			<?php
				while($recup1 = mysql_fetch_array($requete4)) {
			?>
   			<option value="<?php echo $recup1['id_batiment_etage']; ?>"><?php echo $recup1['libelle_batiment_etage']; ?>
			</option>
			<?php
    		}
			?>
            </select><br><br>
Service : <?php $requete5 = mysql_query("SELECT * FROM service"); ?> 
			<select name="service" id="service">
			<?php
				while($recup2 = mysql_fetch_array($requete5)) {
			?>
   			<option value="<?php echo $recup2['id_service']; ?>"><?php echo $recup2['libelle_service']; ?>
			</option>
			<?php
    		}
			?>
            </select>&nbsp&nbsp
Societe : <?php $requete6 = mysql_query("SELECT * FROM societe s,type_societe t where s.id_type_societe=t.id_type_societe and libelle_type_societe='Site CEFF'"); ?> 
			<select name="societe" id="societe">
			<?php
				while($recup3 = mysql_fetch_array($requete6)) {
			?>
   			<option value="<?php echo $recup3['id_societe']; ?>"><?php echo $recup3['nom_societe']; ?>
			</option>
			<?php
    		}
			?>
            </select><br><br>			


Observation : <textarea name="observation"><?=$observation?></textarea><br><br>

<input type="button" value="Retour" onClick="window.location='liste_utilisateur.php';">
<input name="valider" type="submit" value="Modifier">

<p align="center" class="style4">Utilisateur CEFFPARC</p>
Login : <input name="login" type="text"  value="<?=$login?>">&nbsp&nbsp
Mot de passe : <input name="mdp" type="password"  value="<?=$mdp?>"><br><br>

<input type="button" value="Retour" onClick="window.location='liste_utilisateur.php';">
<input name="valider" type="submit" value="Modifier">
</form>

</body>
</html>

<?
// deconnexion de la base
mysql_close(); 
?>