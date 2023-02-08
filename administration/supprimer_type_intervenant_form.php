<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Supprimer type_intervenant</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">
<p align="center" class="style2"><strong>- Supprimer un type d'intervenant</strong> - </p>

<center>
<form name="supprimer_type_intervenant" method="post" action="supprimer_type_intervenant.php">
<table>
  <tr><td align="right"></td><td>
  
<?php
  $requete = mysql_query("SELECT * FROM type_intervenant where id_type_intervenant >1");
?>

<select name="libtype_intervenant">
<?php
while($recup = mysql_fetch_array($requete)) {
?>
    <option value="<?php echo $recup['id_type_intervenant']; ?>"><?php echo $recup['libelle_type_intervenant']; ?></option>
<?php
    }

// deconnexion de la base
mysql_close(); 

?>    

</select></td></tr>
  </table><br>
  <input type ="submit" value="Effacer">
  <br><br><input type='button' value="Retour a la page d'administration des types d'intervenant" onClick="window.location='type_intervenant.php';"><br>
</form>
</center>

</body>
</html>