<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Modifier statut de matériel</title>
<meta http-equiv="Content-statut" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" statut="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">

<p align="center" class="style2"><strong>- Modifier un statut de matériel</strong> - </p>
<?php
  //requête SQL:
    $sql = "SELECT *
	      FROM statut where id_statut >1" ;
  
    //exécution de la requête:
    $requete = mysql_query( $sql) ;
  
    //affichage des données:
    while( $result = mysql_fetch_object( $requete ) )
    {
       echo("<div align=\"center\">".$result->libelle_statut."<a href=\"modifier_statut_materiel_form2.php?id_statut=".$result->id_statut."\"> Modifier</a><br>\n") ;
    }
echo "<br>";	
echo "<form action=\"statut_materiel.php\">\n";
echo "<input type=submit value=\"Retour à la page d'administration des statuts de matériel\">";
echo"</form>";

    // deconnexion de la base
mysql_close(); 
  ?>
</body>
</html>