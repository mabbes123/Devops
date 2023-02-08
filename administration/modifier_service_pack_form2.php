<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Modifier un service pack</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="lien.css">
</head>

<body bgcolor="#fffcd9" marginheight="30">
<?php
//récupération de la variable d'URL, qui va nous permettre de savoir quel enregistrement modifier
  $id  = $_GET["id_service_pack"] ;
  
  //requête SQL:
  $sql = "SELECT *
            FROM service_pack
	    WHERE id_service_pack = ".$id ;
	    
  //exécution de la requête:
  $requete = mysql_query( $sql) ;
  
  //affichage des données:
  if( $result = mysql_fetch_object( $requete ) )
  {
  ?> 
  
  <form name="modification" action="modifier_service_pack_form3.php" method="POST">
  <input type="hidden" name="id_service_pack" value="<?php echo($id) ;?>">
  <table border="0" align="center" cellspacing="2" cellpadding="2">
    <tr align="center">
      <td>Nouveau Libellé</td>
      <td><input type="text" name="libelle_service_pack" value="<?php echo($result->libelle_service_pack) ;?>"></td>
    </tr>
    <tr align="center">
      <td colspan="2"><input type="submit" value="Modifier"></td>
    </tr>
    <tr align="center">
	  <td colspan="2"><input type='button' value="Retour" onClick="window.location='modifier_service_pack_form.php'"></td>
    </tr>
  </table>
</form>
  <?php
  }//fin if 
  ?>
</body>
</html>