<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Supprimer statut_materiel</title>
<meta http-equiv="Content-statut" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" statut="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">
<p align="center" class="style2"><strong>- Supprimer un statut de matériel</strong> - </p>
<center>
<form name="supprimer_statut_materiel" method="post" action="supprimer_statut_materiel.php">
<table>
  <tr><td align="right"></td><td>
  
<?php
  $requete = mysql_query("SELECT * FROM statut where id_statut >1");
?>

<select name="libstatut_materiel">
<?php
while($recup = mysql_fetch_array($requete)) {
?>
    <option value="<?php echo $recup['id_statut']; ?>"><?php echo $recup['libelle_statut']; ?></option>
<?php
    }

// deconnexion de la base
mysql_close(); 

?>    

</select></td></tr>
  </table><br>
  <input type ="submit" value="Effacer">
  <br><br><input type='button' value="Retour a la page d'administration des statuts de matériel" onClick="window.location='statut_materiel.php';"><br>
</form>
</center>

</body>
</html>