<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Modifier Type de société</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">

<p align="center" class="style2"><strong>- Modifier un type de société</strong> - </p>
<?php
  //requête SQL:
    $sql = "SELECT *
	      FROM type_societe where id_type_societe>1" ;
  
    //exécution de la requête:
    $requete = mysql_query( $sql) ;
  
    //affichage des données:
    while( $result = mysql_fetch_object( $requete ) )
    {
       echo("<div align=\"center\">".$result->libelle_type_societe."<a href=\"modifier_type_societe_form2.php?id_type_societe=".$result->id_type_societe."\"> Modifier</a><br>\n") ;
    }
echo "<br>";	
echo "<form action=\"type_societe.php\">\n";
echo "<input type=submit value=\"Retour à la page d'administration des types de société\">";
echo"</form>";

    // deconnexion de la base
mysql_close(); 
  ?>
</body>
</html>