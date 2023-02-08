<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Supprimer Service</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">
<p align="center" class="style2"><strong>- Supprimer un service</strong> - </p>
<center>
<form name="supprimer_service" method="post" action="supprimer_service.php">
<table>
  <tr><td align="right"></td><td>
  
<?php
  $requete = mysql_query("SELECT * FROM service where id_service>1");
?>

<select name="libservice">
<?php
while($recup = mysql_fetch_array($requete)) {
?>
    <option value="<?php echo $recup['id_service']; ?>"><?php echo $recup['libelle_service']; ?></option>
<?php
    }

// deconnexion de la base
mysql_close(); 

?>    

</select></td></tr>
  </table><br>
  <input type ="submit" value="Effacer">
  <br><br><input type='button' value="Retour a la page d'administration des services" onClick="window.location='service.php';"><br>
</form>
</center>

</body>
</html>