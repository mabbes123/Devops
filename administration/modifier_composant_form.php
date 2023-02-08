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
<p align="center" class="style2"><strong>- Modifier un composant -</strong></p>

<?php
  //requête SQL:
    $sql = "SELECT *
	      FROM composant c, type_composant t, societe s
		WHERE s.id_societe=c.id_societe and t.id_type_composant=c.id_type_composant" ;
  
    //exécution de la requête:
    $requete = mysql_query( $sql) ;
  
    //affichage des données:

	while( $result = mysql_fetch_object( $requete ) )
    {
       
	   echo("<div align=\"center\"> <b> ".($result->libelle_type_composant)." </b> ".($result->nom_societe)." ".($result->libelle_composant)." <a href=\"modifier_composant_form2.php?id_composant=".$result->id_composant."\">Modifier</a><br>\n") ;
    }
echo "<br>";
echo "<form>";
echo "<input type='button' value=\"Retour page d'administration\" onclick=\"window.location='gestion_composants.php';\">";
echo "</form>";
    // deconnexion de la base
mysql_close(); 
  ?>
</body>
</html>