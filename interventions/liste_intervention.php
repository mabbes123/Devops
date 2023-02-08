<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Liste intervention</title>
<link href="../lien.css" rel="stylesheet" type="text/css">

 </head>
 <body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Liste des interventions -</strong></p>
 <center>
 <table border="0">
 <tr>
 	<td><br><br>
 	<form method="POST" action="recherche_par_nom.php">
 	<table align="center">
 	<tr>
 		<td align="center"><b>Nom du matériel : </b></td>
	</tr>
    <tr>	
		<td align="center"><?php
			$requete1 = mysql_query("SELECT id_materiel, nom_materiel, libelle_type_materiel 
										FROM materiel m, type_materiel t 
										WHERE t.id_type_materiel=m.id_type_materiel");
			?>

			<select name="materiel" id="materiel">
			<?php
				while($recup1 = mysql_fetch_array($requete1)) {
			?>
   			<option value="<?php echo $recup1['id_materiel']; ?>" selected><?php echo $recup1['libelle_type_materiel']; echo "&nbsp;"; echo $recup1['nom_materiel']; ?>
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
	<td>Ou</td>
    <td>
	<form method="POST" action="recherche_par_intervenant.php">
	<table align="center">
 	<tr><br><br>
 		<td align="center"><b>Nom de l'intervenant : </b></td>
    </tr>	
	<tr>
		<td align="center"><?php
			$requete1 = mysql_query("SELECT * FROM intervenant i, type_intervenant t where i.id_type_intervenant=t.id_type_intervenant and id_intervenant >1 and libelle_type_intervenant='réparateur';");
			?>

			<select name="intervenant" id="intervenant">
			<?php
				while($recup1 = mysql_fetch_array($requete1)) {
			?>
   			<option value="<?php echo $recup1['id_intervenant']; ?>" selected><?php echo $recup1['nom_complet_intervenant']; ?>
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
	<td>Ou</td>
	<td>
	<form method="POST" action="recherche_par_date.php">
	<table align="center">
 	<tr align=""><br><br>
 		<td align="center"><b>Date intervention entre le : </b></td>
    </tr>	
	<tr>
		<td align="center"><input type="text" name="date1"></input></td> <tr><td align="center"><b>et le :</b></td></tr> <tr><td align="center"><input type="text" name="date2"></input></td></tr>
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