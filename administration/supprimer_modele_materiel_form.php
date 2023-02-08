<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Supprimer modele_materiel</title>
<meta http-equiv="Content-modele" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" modele="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">
<p align="center" class="style2"><strong>- Supprimer un modèle de matériel</strong> - </p>
<center>
<form name="supprimer_modele_materiel" method="post" action="supprimer_modele_materiel.php">
<table>
  <tr><td align="right"></td><td>
  
<?php
  $requete = mysql_query("SELECT * FROM modele_materiel where id_modele_materiel>1");
?>

<select name="libmodele_materiel">
<?php
while($recup = mysql_fetch_array($requete)) {
?>
    <option value="<?php echo $recup['id_modele_materiel']; ?>"><?php echo $recup['libelle_modele_materiel']; ?></option>
<?php
    }

// deconnexion de la base
mysql_close(); 

?>    

</select></td></tr>
  </table><br>
  <input type ="submit" value="Effacer">
  <br><br><input type='button' value="Retour a la page d'administration des modeles de matériel" onClick="window.location='modele_materiel.php';"><br>
</form>
</center>

</body>
</html>