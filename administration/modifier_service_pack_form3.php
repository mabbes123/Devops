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

 //récupération des valeurs des champs:
  //libellé:
  $libelle_service_pack     = $_POST["libelle_service_pack"] ;
  
  //récupération de l'identifiant du service_pack:
  $id_service_pack         = $_POST["id_service_pack"] ;
  
  //création de la requête SQL:
  $sql = "UPDATE service_pack
            SET libelle_service_pack        = '$libelle_service_pack'

           WHERE id_service_pack = '$id_service_pack' " ;
  
  //exécution de la requête SQL:
  $requete = mysql_query($sql) or die( mysql_error() ) ;
 
  
  //affichage des résultats, pour savoir si la modification a marchée:
  if($requete)
  {
    echo("La modification à été correctement effectuée") ;
  }
  else
  {
    echo("La modification à échouée") ;
  }
echo "<form action=\"modifier_service_pack_form.php\">\n";
echo "<input type=submit value=\"Retour\">";
echo"</form>";
    // deconnexion de la base
mysql_close(); 
?>
</body>
</html>