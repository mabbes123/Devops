<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Supprimer type_composant</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">
<p align="center" class="style2"><strong>- Supprimer un type de composant</strong> - </p>
<center>
<form name="supprimer_type_composant" method="post" action="supprimer_type_composant.php">
<table>
  <tr><td align="right"></td><td>
  
<?php
  $requete = mysql_query("SELECT * FROM type_composant where id_type_composant >1");
?>

<select name="libtype_composant">
<?php
while($recup = mysql_fetch_array($requete)) {
?>
    <option value="<?php echo $recup['id_type_composant']; ?>"><?php echo $recup['libelle_type_composant']; ?></option>
<?php
    }

// deconnexion de la base
mysql_close(); 

?>    

</select></td></tr>
  </table><br>
  <input type ="submit" value="Effacer">
  <br><br><input type='button' value="Retour a la page d'administration des types de composant" onClick="window.location='type_composant.php';"><br>
</form>
</center>

</body>
</html>