<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Modifier Type d'intervenant</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="lien.css">
</head>

<body bgcolor="#fffcd9" marginheight="30">
<?php

 //récupération des valeurs des champs:
  //libellé:
  $libelle_type_intervenant     = $_POST["libelle_type_intervenant"] ;
  
  //récupération de l'identifiant du type de intervenant:
  $id_type_intervenant         = $_POST["id_type_intervenant"] ;
  
  //création de la requête SQL:
  $sql = "UPDATE type_intervenant
            SET libelle_type_intervenant        = '$libelle_type_intervenant'

           WHERE id_type_intervenant = '$id_type_intervenant' " ;
  
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
echo "<form action=\"modifier_type_intervenant_form.php\">\n";
echo "<input type=submit value=\"Retour\">";
echo"</form>";
    // deconnexion de la base
mysql_close(); 
?>
</body>
</html>