<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Modifier un service</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="lien.css">
</head>

<body bgcolor="#fffcd9" marginheight="30">
<?php

 //récupération des valeurs des champs:
  //libellé:
  $libelle_service     = $_POST["libelle_service"] ;
  
  //récupération de l'identifiant du service:
  $id_service         = $_POST["id_service"] ;
  
  //création de la requête SQL:
  $sql = "UPDATE service
            SET libelle_service        = '$libelle_service'

           WHERE id_service = '$id_service' " ;
  
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
echo "<form action=\"modifier_service_form.php\">\n";
echo "<input type=submit value=\"Retour\">";
echo"</form>";
    // deconnexion de la base
mysql_close(); 
?>
</body>
</html>