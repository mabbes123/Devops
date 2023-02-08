<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Supprimer type_materiel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">
<p align="center" class="style2"><strong>- Supprimer un type de matériel</strong> - </p>
<center>
<form name="supprimer_type_materiel" method="post" action="supprimer_type_materiel.php">
<table>
  <tr><td align="right"></td><td>
  
<?php
  $requete = mysql_query("SELECT * FROM type_materiel where id_type_materiel >1");
?>

<select name="libtype_materiel">
<?php
while($recup = mysql_fetch_array($requete)) {
?>
    <option value="<?php echo $recup['id_type_materiel']; ?>"><?php echo $recup['libelle_type_materiel']; ?></option>
<?php
    }

// deconnexion de la base
mysql_close(); 

?>    

</select></td></tr>
  </table><br>
  <input type ="submit" value="Effacer">
  <br><br><input type='button' value="Retour a la page d'administration des types de matériel" onClick="window.location='type_materiel.php';"><br>
</form>
</center>

</body>
</html>