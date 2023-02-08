<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Modifier un fonction_utilisateur</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="lien.css">
</head>

<body bgcolor="#fffcd9" marginheight="30">
<?php

 //récupération des valeurs des champs:
  //libellé:
  $libelle_fonction_utilisateur     = $_POST["libelle_fonction_utilisateur"] ;
  
  //récupération de l'identifiant du batiment_etage:
  $id_fonction_utilisateur         = $_POST["id_fonction_utilisateur"] ;
  
  //création de la requête SQL:
  $sql = "UPDATE fonction_utilisateur
            SET libelle_fonction_utilisateur        = '$libelle_fonction_utilisateur'

           WHERE id_fonction_utilisateur = '$id_fonction_utilisateur' " ;
  
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
echo "<form action=\"modifier_fonction_utilisateur_form.php\">\n";
echo "<input type=submit value=\"Retour\">";
echo"</form>";
    // deconnexion de la base
mysql_close(); 
?>
</body>
</html>