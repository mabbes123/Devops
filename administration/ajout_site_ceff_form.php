<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Ajouter une société</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>

<body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Ajouter un Site CEFF -</strong></p>
<br>
<form name="ajout_site_ceff" method="post" action="ajout_site_ceff.php">
<table align="center" border="0">
	<tr>
	  <td align="right">Nom de la société :</td>
	  <td><input type="text" name="nom_societe"></td>
	  <td align="right">Type de société : </td>
	  <td> 
			<?php
			$requete = mysql_query("SELECT * FROM type_societe where libelle_type_societe = 'Site CEFF'");
			?>

			<select name="type_societe" id="type_societe">
			<?php
				while($recup = mysql_fetch_array($requete)) {
			?>
   			<option value="<?php echo $recup['id_type_societe']; ?>" selected><?php echo $recup['libelle_type_societe']; ?>
			</option>
			<?php
    		}
			?>
            </select>
	  </td>
    </tr>
	<tr>
	  <td align="right">Téléphone : </td>
	  <td><input type="text" name="tel" maxlength="10"></td>
	  <td align="right">Téléphone portable :</td>
	  <td><input type="text" name="portable" maxlength="10"></td>
    </tr>
	<tr>
	  <td align="right">Fax :</td>
	  <td><input type="text" name="fax" maxlength="10"></td>
	</tr>
	<tr>
	  <td align="right">Observation : </td>
	  <td><textarea name="observation"></textarea></td>
	  <td align="right">Adresse : </td>
	  <td><textarea name="adresse"></textarea></td>
	</tr>
	<tr>
	  <td align="right">Ville : </td>
	  <td><input type="text" name="ville"></td>
	  <td align="right">Code postal : </td>
	  <td><input type="text" name="cp"></td>
	</tr>
	<tr>
	  <td align="right">E-mail : </td>
	  <td><input type="text" name="mail"></td>
	  <td align="right">Site web : </td>
	  <td><input type="text" name="site_web"></td>
	</tr>
</table>
<br><br>
	<div align="center"><input type ="submit" value="Enregistrer">
	<br><br><input name="button" type='button' onClick="window.location='site_ceff.php';" value="Retour page d'administration des sites CEFF" /></div>
		

</form>

</body>
</html>
<?php
// deconnexion de la base
mysql_close();
?>