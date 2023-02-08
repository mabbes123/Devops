<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Modifier statut de matériel</title>
<meta http-equiv="Content-statut" content="text/html; charset=UTF-8">
<link rel="stylesheet" statut="text/css" href="lien.css">
</head>

<body bgcolor="#fffcd9" marginheight="30">
<?php

 //récupération des valeurs des champs:
  //libellé:
  $libelle_statut_materiel     = $_POST["libelle_statut_materiel"] ;
  
  //récupération de l'identifiant du statut de materiel:
  $id_statut_materiel         = $_POST["id_statut_materiel"] ;
  
  //création de la requête SQL:
  $sql = "UPDATE statut
            SET libelle_statut  = '$libelle_statut_materiel'

           WHERE id_statut = '$id_statut_materiel' " ;
  
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
echo "<form action=\"modifier_statut_materiel_form.php\">\n";
echo "<input type=submit value=\"Retour\">";
echo"</form>";
    // deconnexion de la base
mysql_close(); 
?>
</body>
</html>