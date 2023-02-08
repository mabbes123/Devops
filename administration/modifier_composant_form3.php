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

 //récupération des valeurs des champs:
  //type_composant:
  $type_composant     = $_POST["type_composant"] ;
  //nom_composant:
  $libelle_composant = $_POST["libelle_composant"] ;
  //fabricant:
  $societe = $_POST["societe"] ;
  //precision_composant:
  $id_composant        = $_POST["id_composant"] ;
  

  //création de la requête SQL:
  $sql = "UPDATE composant
            SET libelle_composant  = '$libelle_composant', 
		        id_societe = '$societe',
				id_type_composant = '$type_composant'
            WHERE composant.id_composant = '$id_composant'" ;
  

  //exécution de la requête SQL:
  $requete = mysql_query($sql) or die( mysql_error() ) ;
  
    //vérification
  if($requete)
  {
    echo("La modification à été correctement effectuée") ;
  }
  else
  {
    echo("La modification à échouée") ;
  }

 
   
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='modifier_composant_form.php';\">";
echo "</form>";
    // deconnexion de la base
mysql_close(); 
?>