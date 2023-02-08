<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Modifier modèle de matériel</title>
<meta http-equiv="Content-modele" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" modele="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">

<p align="center" class="style2"><strong>- Modifier un modèle de matériel</strong> - </p>
<?php
  //requête SQL:
    $sql = "SELECT *
	      FROM modele_materiel where id_modele_materiel >1" ;
  
    //exécution de la requête:
    $requete = mysql_query( $sql) ;
  
    //affichage des données:
    while( $result = mysql_fetch_object( $requete ) )
    {
       echo("<div align=\"center\">".$result->libelle_modele_materiel."<a href=\"modifier_modele_materiel_form2.php?id_modele_materiel=".$result->id_modele_materiel."\"> Modifier</a><br>\n") ;
    }
echo "<br>";	
echo "<form action=\"modele_materiel.php\">\n";
echo "<input type=submit value=\"Retour à la page d'administration des modèles de matériel\">";
echo"</form>";

    // deconnexion de la base
mysql_close(); 
  ?>
</body>
</html>