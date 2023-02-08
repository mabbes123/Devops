<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Modifier un composant</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="lien.css">
</head>

<body bgcolor="#fffcd9" marginheight="30">
<?php
//récupération de la variable d'URL,
  //qui va nous permettre de savoir quel enregistrement modifier
  $id  = $_GET["id_composant"] ;
  
  //requête SQL:
  $sql = "SELECT *
            FROM composant c, type_composant t, societe s
	    WHERE c.id_type_composant=t.id_type_composant and c.id_type_composant and c.id_societe=s.id_societe and id_composant = ".$id ;
	    
  //exécution de la requête:
  $requete = mysql_query( $sql) ;
  
  //affichage des données:
  if( $result = mysql_fetch_object( $requete ) )
  {
?> 
  
  <form name="modification" action="modifier_composant_form3.php" method="POST">
  <input type="hidden" name="id_composant" value="<?php echo($id) ;?>">
  <p align="center" class="style2"><strong>- Modifier un composant -</strong></p>
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
      <td width="139">Type de composant </td>
      <td width="266"><?php
	$requete1 = mysql_query("SELECT * FROM type_composant where id_type_composant>1");
	?>

	<select name="type_composant" id="type_composant">
	<?php
	while($recup1 = mysql_fetch_array($requete1)) {
	?>
    <option value="<?php echo $recup1['id_type_composant']; ?>" selected><?php echo $recup1['libelle_type_composant']; ?></option>
	<?php
    }
?>
                    </select></td>
    </tr>
    <tr align="center">
      <td>Nom composant </td>
      <td><input type="text" name="libelle_composant" value="<?php echo($result->libelle_composant) ;?>"></td>
    </tr>
    <tr align="center">
      <td>Fabricant</td>
      <td><?php
	$requete2 = mysql_query("SELECT * 
				FROM societe s, type_societe t 
				WHERE s.id_type_societe=t.id_type_societe
					and id_societe>1 
					and libelle_type_societe<>'Site CEFF'");
	?>

	<select name="societe" id="societe">
	<?php
	while($recup2 = mysql_fetch_array($requete2)) {
	?>
    <option value="<?php echo $recup2['id_societe']; ?>" selected><?php echo $recup2['nom_societe']; ?></option>
	<?php
    }
?>
                    </select></td>
    </tr>
	<tr align="center">
      <td colspan="2"><br></td>
    </tr>
	<tr align="center">
      <td colspan="2"><input type="submit" value="Modifier"></td>
    </tr>
    <tr align="center">
	  <td colspan="2"><input type='button' value="Retour" onClick="window.location='modifier_composant_form.php'"></td>
    </tr>
  </table>
</form>
<?php
  }//fin if
?>
</body>
</html>