<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Modifier un batiment_etage</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="lien.css">
</head>

<body bgcolor="#fffcd9" marginheight="30">
<?php

 //récupération des valeurs des champs:
  //libellé:
  $libelle_batiment_etage     = $_POST["libelle_batiment_etage"] ;
  
  //récupération de l'identifiant du batiment_etage:
  $id_batiment_etage         = $_POST["id_batiment_etage"] ;
  
  //création de la requête SQL:
  $sql = "UPDATE batiment_etage
            SET libelle_batiment_etage        = '$libelle_batiment_etage'

           WHERE id_batiment_etage = '$id_batiment_etage' " ;
  
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
echo "<form action=\"modifier_batiment_etage_form.php\">\n";
echo "<input type=submit value=\"Retour\">";
echo"</form>";
    // deconnexion de la base
mysql_close(); 
?>
</body>
</html>