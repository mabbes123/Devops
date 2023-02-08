<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Supprimer fonction_utilisateur</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">
<p align="center" class="style2"><strong>- Supprimer une fonction utilisateur</strong> - </p>
<center>
<form name="supprimer_fonction_utilisateur" method="post" action="supprimer_fonction_utilisateur.php">
<table>
  <tr><td align="right"></td><td>
  
<?php
  $requete = mysql_query("SELECT * FROM fonction_utilisateur where id_fonction_utilisateur >1");
?>

<select name="libfonction_utilisateur">
<?php
while($recup = mysql_fetch_array($requete)) {
?>
    <option value="<?php echo $recup['id_fonction_utilisateur']; ?>"><?php echo $recup['libelle_fonction_utilisateur']; ?></option>
<?php
    }

// deconnexion de la base
mysql_close(); 

?>    

</select></td></tr>
  </table><br>
  <input type ="submit" value="Effacer">
  <br><br><input type='button' value="Retour a la page d'administration des Fonctions utilisateur" onClick="window.location='fonction_utilisateur.php';"><br>
</form>
</center>

</body>
</html>