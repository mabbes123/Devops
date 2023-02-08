<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Affecter matériel à un utilisateur</title>
<link href="../lien.css" rel="stylesheet" type="text/css">
 </head>
 <body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Affecter un matériel à un utilisateur -</strong></p>
 <center>
 <?
 $id_materiel=$_GET['code'];
 ?>
 <form method="POST" action="affecter_materiel1.php">
 <table align="center">
 <input type="hidden" name="id_materiel" value="<?="$id_materiel"?>">
 <tr>
  <td> Utilisateur du matériel : </td>
  <td><?php
			$requete2 = mysql_query("SELECT * FROM utilisateur where nom_complet_utilisateur <> 'admin admin' and id_utilisateur>1");
			?>

			<select name="utilisateur" id="utilisateur">
			<?php
				while($recup2 = mysql_fetch_array($requete2)) {
			?>
   			<option value="<?php echo $recup2['id_utilisateur']; ?>" selected><?php echo $recup2['nom_complet_utilisateur']; ?>
			</option>
			<?php
    		}
			?>
            </select>
  </tr>
  <br><br>
 </table>
 <br><br>
 <table>
   <tr><td><td><input type="submit" name="Envoyer" value="Affecter"></td></td></tr>
   	</table>

 </form>
 </center>
 </body>
 </html>
<?php
// deconnexion de la base
mysql_close();
?>