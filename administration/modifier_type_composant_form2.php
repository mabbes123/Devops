<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Modifier Type de composant</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="lien.css">
</head>

<body bgcolor="#fffcd9" marginheight="30">
<?php
//r?cup?ration de la variable d'URL, qui va nous permettre de savoir quel enregistrement modifier
  $id  = $_GET["id_type_composant"] ;
  
  //requ?te SQL:
  $sql = "SELECT *
            FROM type_composant
	    WHERE id_type_composant = ".$id ;
	    
  //ex?cution de la requ?te:
  $requete = mysql_query( $sql) ;
  
  //affichage des donn?es:
  if( $result = mysql_fetch_object( $requete ) )
  {
  ?> 
  
  <form name="modification" action="modifier_type_composant_form3.php" method="POST">
  <input type="hidden" name="id_type_composant" value="<?php echo($id) ;?>">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>Nouveau Libell?</td>
      <td><input type="text" name="libelle_type_composant" value="<?php echo($result->libelle_type_composant) ;?>"></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="Modifier"></td>
    </tr>
    <tr align="center">
	  <td colspan="2"><input type='button' value="Retour" onClick="window.location='modifier_type_composant_form.php'"></td>
    </tr>
  </table>
</form>
  <?php
  }//fin if 
  ?>
</body>
</html>