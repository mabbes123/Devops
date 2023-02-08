<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Modifier Fonction Utilisateur</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">

<p align="center" class="style2"><strong>- Modifier une fonction utilisateur</strong> - </p>
<?php
  //requête SQL:
    $sql = "SELECT *
	      FROM fonction_utilisateur where id_fonction_utilisateur >1" ;
  
    //exécution de la requête:
    $requete = mysql_query( $sql) ;
  
    //affichage des données:
    while( $result = mysql_fetch_object( $requete ) )
    {
       echo("<div align=\"center\">".$result->libelle_fonction_utilisateur."<a href=\"modifier_fonction_utilisateur_form2.php?id_fonction_utilisateur=".$result->id_fonction_utilisateur."\"> Modifier</a><br>\n") ;
    }
echo "<br>";	
echo "<form action=\"fonction_utilisateur.php\">\n";
echo "<input type=submit value=\"Retour à la page d'administration des Fonctions utilisateur\">";
echo"</form>";

    // deconnexion de la base
mysql_close(); 
  ?>
</body>
</html>