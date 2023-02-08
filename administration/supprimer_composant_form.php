<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
include('../connect_base.php');
?>

<html>
<head>
<title>supprimer un composant</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="lien.css">
</head>
<body bgcolor="#fffcd9" marginheight="30">
<p align="center" class="style2"><strong>- Supprimer un composant -</strong></p>
<center>
<form name="supprimer_composant" method="post" action="supprimer_composant.php">
<table>
  <tr><td align="right"></td><td>
 
<?php
  $requete = mysql_query("SELECT * FROM composant");
?>

<select name="descomposants" id="descomposants">

<?php
while($recup = mysql_fetch_array($requete)) {
?>
    <option value="<?php echo $recup['id_composant']; ?>"><?php echo $recup['libelle_composant']; ?></option>
<?php
    }

// deconnexion de la base
mysql_close(); 

?>    

</select></td></tr>

  </table><br>
  <input type ="submit" value="Effacer">
  <br><br><input type='button' value="Retour page d'administration" onClick="window.location='gestion_composants.php';"><br>
</form>
</center>
</body>
</html>
