<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Ajouter un logiciel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>

<body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Ajouter un logiciel </strong> - </p>

<form name="ajout_logiciel" method="post" action="ajout_logiciel.php">
<table align="center">
	<tr>
	  <td align="right">Nom :</td>
	  <td><input type="text" name="nom_logiciel"></td>
    </tr>
	<tr>
	  <td align="right">Version : </td>
	  <td><input type="text" name="version_logiciel"></td>
    </tr>
	<tr>
	  <td align="right">Service Pack : </td>
	  <td> 
	<?php
	$requete1 = mysql_query("SELECT * FROM service_pack where id_service_pack>1");
	?>

	<select name="service_pack" id="service_pack">
	<?php
	while($recup1 = mysql_fetch_array($requete1)) {
	?>
    <option value="<?php echo $recup1['id_service_pack']; ?>" selected><?php echo $recup1['libelle_service_pack']; ?></option>
	<?php
    }
	?></select>
	  </td>
	</tr>
	<tr>
	  <td align="right">Fabricant : </font></td>
	  <td><?php
	$requete2 = mysql_query("SELECT * FROM societe s, type_societe t where s.id_type_societe=t.id_type_societe and id_societe>1 and libelle_type_societe <> 'Site CEFF'");
	?>

	<select name="societe" id="societe">
	<?php
	while($recup2 = mysql_fetch_array($requete2)) {
	?>
    <option value="<?php echo $recup2['id_societe']; ?>" selected><?php echo $recup2['nom_societe']; ?></option>
	<?php
    }
    ?></select>
      </td>
	</tr>	
	<tr>
	  <td align="right">Date d'achat   : </font></td>
	  <td><input type="text" name="date_achat"> au format JJ/MM/AAAA</td></tr>
	<tr>
	  <td align="right">Observation  : </font></td>
	  <td><textarea name="observation"></textarea></td></tr>
</table>
<br>
	<div align="center"><input type ="submit" value="Enregistrer">
	<br><br></div>
</form>


</body>
</html>
<?php
// deconnexion de la base
mysql_close();
?>