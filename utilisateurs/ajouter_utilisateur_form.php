<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Ajouter un utilisateur</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>

<body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Ajouter un utilisateur -</strong></p>
<br>
<form name="ajout_utilisateur" method="post" action="ajout_utilisateur.php">
<table align="center" border="0">
	<tr>
	  <td align="right">Nom :</td>
	  <td><input type="text" name="nom"></td>
	  <td align="right">Prénom :</td>
	  <td><input type="text" name="prenom"></td>
	</tr>
	<tr>
	  <td align="right">Téléphone bureau:</td>
	  <td><input type="text" name="tel" maxlength="10"></td>
	  <td align="right">Téléphone portable :</td>
	  <td><input type="text" name="port" maxlength="10"></td>
	</tr>
	<tr>

	  <td align="right">E-mail :</td>
	  <td><input type="text" name="mail"></td>	  

	</tr>
	<tr>
	  <td align="right">Fonction de l'utilisateur : </td>
	  <td> 
			<?php
			$requete1 = mysql_query("SELECT * FROM fonction_utilisateur where id_fonction_utilisateur >1");
			?>

			<select name="fonction_utilisateur" id="fontion_utilisateur">
			<?php
				while($recup1 = mysql_fetch_array($requete1)) {
			?>
   			<option value="<?php echo $recup1['id_fonction_utilisateur']; ?>" selected><?php echo $recup1['libelle_fonction_utilisateur']; ?>
			</option>
			<?php
    		}
			?>
            </select>
	  </td>
	  <td align="right">Société : </td>
	  <td> 
			<?php
			$requete2 = mysql_query("SELECT * FROM societe s, type_societe t WHERE s.id_type_societe=t.id_type_societe and libelle_type_societe='site CEFF'");
			?>

			<select name="societe" id="societe">
			<?php
				while($recup2 = mysql_fetch_array($requete2)) {
			?>
   			<option value="<?php echo $recup2['id_societe']; ?>" selected><?php echo $recup2['nom_societe']; ?>
			</option>
			<?php
    		}
			?>
            </select>
	  </td>
	  </tr>
	  <tr>
	  <td align="right">Batiment-Etage : </td>
	  <td> 
			<?php
			$requete3 = mysql_query("SELECT * FROM batiment_etage where id_batiment_etage>1");
			?>

			<select name="batiment_etage" id="batiment_etage">
			<?php
				while($recup3 = mysql_fetch_array($requete3)) {
			?>
   			<option value="<?php echo $recup3['id_batiment_etage']; ?>" selected><?php echo $recup3['libelle_batiment_etage']; ?>
			</option>
			<?php
    		}
			?>
            </select>
	  </td>
	  <td align="right">Service : </td>
	  <td> 
			<?php
			$requete4 = mysql_query("SELECT * FROM service where id_service>1");
			?>

			<select name="service" id="service">
			<?php
				while($recup4 = mysql_fetch_array($requete4)) {
			?>
   			<option value="<?php echo $recup4['id_service']; ?>" selected><?php echo $recup4['libelle_service']; ?>
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
	  </table><br>
	  <div align="center"><input type ="submit" value="Enregistrer"></div><br>
<p align="center" class="style4">Utilisateur du logiciel CEFFPARC</p>
	<table align="center">
	<tr>
	<td>Login de l'utilisateur : </td>
	<td><input type="text" name="login"></td>
	<td>Mot de passe : </td>
	<td><input type="password" name="mdp"></td>
	</tr>
	</table><br>
	<div align="center"><input type ="submit" value="Enregistrer"></div>
	<br><br>
</form>

</body>
</html>
<?php
// deconnexion de la base
mysql_close();
?>