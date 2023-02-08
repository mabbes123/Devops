<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Ajouter un materiel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>

<body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Ajouter un materiel -</strong></p>
<br>
<form name="ajout_materiel" method="post" action="ajout_materiel.php">
<table align="center" border="0">
	<tr>
	  <td align="right">Numéro de série:</td>
	  <td><input type="text" name="num_serie"></td>
	  <td align="right">Tag CEFF :</td>
	  <td><input type="text" name="tag_ceff"></td>
	  </tr>
	<tr>
	  <td align="right">Nom matériel :</td>
	  <td><input type="text" name="nom"></td>
	  <td align="right">Date d'achat :</td>
	  <td><input type="text" name="date_achat" maxlength="10"></td>
	  </tr>
	<tr>
 	  <td align="right">Fabricant : </td>
	  <td> 
			<?php
			$requete4 = mysql_query("SELECT * FROM societe s, type_societe t where s.id_type_societe=t.id_type_societe and libelle_type_societe <> 'Site CEFF' and id_societe >1");
			?>

			<select name="societe" id="societe">
			<?php
				while($recup4 = mysql_fetch_array($requete4)) {
			?>
   			<option value="<?php echo $recup4['id_societe']; ?>" selected><?php echo $recup4['nom_societe']; ?>
			</option>
			<?php
    		}
			?>
            </select>
	  </td>
	  <td align="right">Statut :</td>
	  <td> 
			<?php
			$requete2 = mysql_query("SELECT * FROM statut where id_statut>1");
			?>

			<select name="statut" id="statut">
			<?php
				while($recup2 = mysql_fetch_array($requete2)) {
			?>
   			<option value="<?php echo $recup2['id_statut']; ?>" selected><?php echo $recup2['libelle_statut']; ?>
			</option>
			<?php
    		}
			?>
            </select>
	  </td>	  
	</tr>
	<tr>
	  <td align="right">Modèle du matériel : </td>
	  <td> 
			<?php
			$requete3 = mysql_query("SELECT * FROM modele_materiel where id_modele_materiel >1");
			?>

			<select name="modele_materiel" id="modele_materiel">
			<?php
				while($recup3 = mysql_fetch_array($requete3)) {
			?>
   			<option value="<?php echo $recup3['id_modele_materiel']; ?>" selected><?php echo $recup3['libelle_modele_materiel']; ?>
			</option>
			<?php
    		}
			?>
            </select>
	  </td>
      <td align="right">Type de matériel : </td>
	  <td> 
			<?php
			$requete1 = mysql_query("SELECT * FROM type_materiel where id_type_materiel >1");
			?>

			<select name="type_materiel" id="type_materiel">
			<?php
				while($recup1 = mysql_fetch_array($requete1)) {
			?>
   			<option value="<?php echo $recup1['id_type_materiel']; ?>" selected><?php echo $recup1['libelle_type_materiel']; ?>
			</option>
			<?php
    		}
			?>
            </select>
	  </td>
	  </tr>
	  <tr>
	    <td align="right">Adresse IP :</td>
	    <td><input type="text" name="adresseip" maxlength="15"></td>
	    <td align="right">Observation : </td>
	    <td><textarea name="observation"></textarea></td>
	  </tr>
	  </table><br>
	  <div align="center"><input type ="submit" value="Enregistrer"></div><br>

</form>

</body>
</html>
<?php
// deconnexion de la base
mysql_close();
?>