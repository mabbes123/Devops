<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Modifier modèle de matériel</title>
<meta http-equiv="Content-modele" content="text/html; charset=UTF-8">
<link rel="stylesheet" modele="text/css" href="lien.css">
</head>

<body bgcolor="#fffcd9" marginheight="30">
<?php

 //récupération des valeurs des champs:
  //libellé:
  $libelle_modele_materiel     = $_POST["libelle_modele_materiel"] ;
  
  //récupération de l'identifiant du modele de materiel:
  $id_modele_materiel         = $_POST["id_modele_materiel"] ;
  
  //création de la requête SQL:
  $sql = "UPDATE modele_materiel
            SET libelle_modele_materiel        = '$libelle_modele_materiel'

           WHERE id_modele_materiel = '$id_modele_materiel' " ;
  
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
echo "<form action=\"modifier_modele_materiel_form.php\">\n";
echo "<input type=submit value=\"Retour\">";
echo"</form>";
    // deconnexion de la base
mysql_close(); 
?>
</body>
</html>