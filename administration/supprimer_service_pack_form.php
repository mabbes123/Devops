<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Supprimer service pack</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">
<p align="center" class="style2"><strong>- Supprimer un service pack</strong> - </p>
<center>
<form name="supprimer_service_pack" method="post" action="supprimer_service_pack.php">
<table>
  <tr><td align="right"></td><td>
  
<?php
  $requete = mysql_query("SELECT * FROM service_pack where id_service_pack >1");
?>

<select name="libservice_pack">
<?php
while($recup = mysql_fetch_array($requete)) {
?>
    <option value="<?php echo $recup['id_service_pack']; ?>"><?php echo $recup['libelle_service_pack']; ?></option>
<?php
    }

// deconnexion de la base
mysql_close(); 

?>    

</select></td></tr>
  </table><br>
  <input type ="submit" value="Effacer">
  <br><br><input type='button' value="Retour a la page d'administration des services pack" onClick="window.location='service_pack.php';"><br>
</form>
</center>

</body>
</html>