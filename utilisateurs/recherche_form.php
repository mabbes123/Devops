<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Recherche matériel par utilisateur</title>
<link href="../lien.css" rel="stylesheet" type="text/css">

 </head>
 <body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Recherche de matériel -</strong></p>
 <center>
 <table border="0">
 <tr>
 	<td><br><br>
 	<form method="POST" action="recherche_par_nom.php">
 	<table align="center">
 	<tr>
 		<td align="center"><b>Nom de l'utilisateur : </b></td>
	</tr>
    <tr>	
		<td align="center"><?php
			$requete1 = mysql_query("SELECT * FROM utilisateur where id_utilisateur >1 and nom_utilisateur <> 'admin'");
			?>

			<select name="utilisateur" id="utilisateur">
			<?php
				while($recup1 = mysql_fetch_array($requete1)) {
			?>
   			<option value="<?php echo $recup1['id_utilisateur']; ?>" selected><?php echo $recup1['nom_complet_utilisateur']; ?>
			</option>
			<?php
    		}
			?>
            </select></td>
	</tr>
	<tr>
	 	<td colspan="2" align="center"><input type="submit" name="Envoyer" value="Rechercher"></td>
    </tr></form>
	</table>
	</td>
	
    <td>
	<form method="POST" action="recherche_par_societe.php">
	<table align="center">
 	<tr><br><br>
 		<td align="center"><b>Nom de la societe : </b></td>
    </tr>	
	<tr>
		<td align="center"><?php
			$requete1 = mysql_query("SELECT * FROM societe s, type_societe t where t.id_type_societe=s.id_type_societe and id_societe >1 and libelle_type_societe='Site CEFF'");
			?>

			<select name="societe" id="societe">
			<?php
				while($recup1 = mysql_fetch_array($requete1)) {
			?>
   			<option value="<?php echo $recup1['id_societe']; ?>" selected><?php echo $recup1['nom_societe']; ?>
			</option>
			<?php
    		}
			?>
            </select></td>
	</tr>
	<tr>
	 	<td colspan="2"  align="center"><input type="submit" name="Envoyer" value="Rechercher"></td>
	</tr>
	</table></form>
	</td>
	
	<td>
	<form method="POST" action="recherche_par_statut.php">
	<table align="center">
 	<tr align=""><br><br>
 		<td align="center"><b>Statut du materiel : </b></td>
    </tr>	
	<tr>
		<td align="center"><?php
			$requete1 = mysql_query("SELECT * FROM statut where id_statut >1");
			?>

			<select name="statut" id="statut">
			<?php
				while($recup1 = mysql_fetch_array($requete1)) {
			?>
   			<option value="<?php echo $recup1['id_statut']; ?>" selected><?php echo $recup1['libelle_statut']; ?>
			</option>
			<?php
    		}
			?>
            </select></td>
	</tr>
	<tr>
	 	<td colspan="2"  align="center"><input type="submit" name="Envoyer" value="Rechercher"></td>
	</tr>
	</table></form>
	</td>
 </tr>
 </table>
 </center>
 </body>
 </html>
<?php
// deconnexion de la base
mysql_close();
?>