<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Supprimer un site ceff</title>
<meta http-equiv="Content-statut" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" statut="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">
<p align="center" class="style2"><strong>- Supprimer un site CEFF</strong> - </p>
<center>
<form name="supprimer_site_ceff" method="post" action="supprimer_site_ceff.php">
<table>
  <tr><td align="right"></td><td>
  
<?php
  $requete = mysql_query("SELECT * FROM societe s, type_societe t where s.id_type_societe=t.id_type_societe and libelle_type_societe='site CEFF' ");
?>

<select name="site_ceff">
<?php
while($recup = mysql_fetch_array($requete)) {
?>
    <option value="<?php echo $recup['id_societe']; ?>"><?php echo $recup['nom_societe']; ?></option>
<?php
    }

// deconnexion de la base
mysql_close(); 

?>    

</select></td></tr>
  </table><br>
  <input type ="submit" value="Effacer">
  <br><br><input type='button' value="Retour a la page d'administration des sites CEFF" onClick="window.location='site_ceff.php';"><br>
</form>
</center>

</body>
</html>