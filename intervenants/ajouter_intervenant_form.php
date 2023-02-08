<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Ajouter un intervenant</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>

<body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Ajouter un intervenant -</strong></p>
<br>
<form name="ajout_intervenant" method="post" action="ajout_intervenant.php">
<table align="center" border="0">
	<tr>
	  <td align="right">Nom :</td>
	  <td><input type="text" name="nom"></td>
	  <td align="right">Prénom :</td>
	  <td><input type="text" name="prenom"></td>
	</tr>
	<tr>
	  <td align="right">Téléphone :</td>
	  <td><input type="text" name="tel" maxlength="10"></td>
	  <td align="right">Téléphone portable :</td>
	  <td><input type="text" name="port" maxlength="10"></td>
	</tr>
	<tr>
	  <td align="right">Fax :</td>
	  <td><input type="text" name="fax" maxlength="10"></td>
	  <td align="right">E-mail :</td>
	  <td><input type="text" name="mail"></td>
	</tr>
	<tr>
	  <td align="right">Type d'intervenant : </td>
	  <td> 
			<?php
			$requete = mysql_query("SELECT * FROM type_intervenant where id_type_intervenant >1");
			?>

			<select name="type_intervenant" id="type_intervenant">
			<?php
				while($recup = mysql_fetch_array($requete)) {
			?>
   			<option value="<?php echo $recup['id_type_intervenant']; ?>" selected><?php echo $recup['libelle_type_intervenant']; ?>
			</option>
			<?php
    		}
			?>
            </select>
	  </td>
	  <td align="right">Société : </td>
	  <td> 
			<?php
			$requete = mysql_query("SELECT * FROM societe where id_societe>1");
			?>

			<select name="societe" id="societe">
			<?php
				while($recup = mysql_fetch_array($requete)) {
			?>
   			<option value="<?php echo $recup['id_societe']; ?>" selected><?php echo $recup['nom_societe']; ?>
			</option>
			<?php
    		}
			?>
            </select>
	  </td>
	  </tr>
	  <tr>
	  <td align="right">Observation : </td>
	  <td><textarea name="observation"></textarea></td>
	  </tr>
</table>
<br><br>
	<div align="center"><input type ="submit" value="Enregistrer">
	<br><br></div>
</form>

</body>
</html>
<?php
// deconnexion de la base
mysql_close();
?>