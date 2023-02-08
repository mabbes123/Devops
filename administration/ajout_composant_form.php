<?php
include('../connect_base.php');
?>

<html>
<head>
<title>ajouter un evenement</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="lien.css">
</head>
<body bgcolor="#fffcd9" marginheight="30">
<p align="center" class="style2"><strong>- Ajouter un composant</strong> - </p>
<center>
<form name="ajout_composant" method="post" action="ajout_composant.php">
<table>
	<tr>
	  <td align="right">Type de composant : </td>
	  <td> 
	<?php
	$requete1 = mysql_query("SELECT * FROM type_composant where id_type_composant>1");
	?>

	<select name="type_composant" id="type_composant">
	<?php
	while($recup1 = mysql_fetch_array($requete1)) {
	?>
    <option value="<?php echo $recup1['id_type_composant']; ?>" selected><?php echo $recup1['libelle_type_composant']; ?></option>
	<?php
    }
?>
                    </select></td></tr>

	<tr>
	  <td align="right">Nom du composant  : </font></td>
	  <td><input type="text" name="nom_composant"></input></td></tr>
	<tr>
	  <td align="right">Fabricant : </font></td>
	  <td><?php
	$requete2 = mysql_query("SELECT * 
				FROM societe s, type_societe t 
				WHERE s.id_type_societe=t.id_type_societe
					and id_societe>1 
					and libelle_type_societe<>'Site CEFF'");
	?>

	<select name="societe" id="societe">
	<?php
	while($recup2 = mysql_fetch_array($requete2)) {
	?>
    <option value="<?php echo $recup2['id_societe']; ?>" selected><?php echo $recup2['nom_societe']; ?></option>
	<?php
    }
?>
                    </select></td></tr>	
	
</table>
<br>
	<input type ="submit" value="Enregistrer">
	<br><br><input type='button' value="Retour page d'administration des composants" onClick="window.location='gestion_composants.php';"><br>
</form>
</center>
</body>
</html>

<?php
// deconnexion de la base
mysql_close();
?>