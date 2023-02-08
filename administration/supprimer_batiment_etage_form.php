<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Supprimer batiment_etage</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">
<p align="center" class="style2"><strong>- Supprimer un batiment-étage</strong> - </p>
<center>
<form name="supprimer_batiment_etage" method="post" action="supprimer_batiment_etage.php">
<table>
  <tr><td align="right"></td><td>
  
<?php
  $requete = mysql_query("SELECT * FROM batiment_etage where id_batiment_etage >1");
?>

<select name="libbatiment_etage">
<?php
while($recup = mysql_fetch_array($requete)) {
?>
    <option value="<?php echo $recup['id_batiment_etage']; ?>"><?php echo $recup['libelle_batiment_etage']; ?></option>
<?php
    }

// deconnexion de la base
mysql_close(); 

?>    

</select></td></tr>
  </table><br>
  <input type ="submit" value="Effacer">
  <br><br><input type='button' value="Retour a la page d'administration des Batiments-Etages" onClick="window.location='batiment_etage.php';"><br>
</form>
</center>

</body>
</html>