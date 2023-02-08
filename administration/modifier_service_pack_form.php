<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Modifier service pack</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">

<p align="center" class="style2"><strong>- Modifier un service pack</strong> - </p>
<?php
  //requête SQL:
    $sql = "SELECT *
	      FROM service_pack where id_service_pack>1" ;
  
    //exécution de la requête:
    $requete = mysql_query( $sql) ;
  
    //affichage des données:
    while( $result = mysql_fetch_object( $requete ) )
    {
       echo("<div align=\"center\">".$result->libelle_service_pack."<a href=\"modifier_service_pack_form2.php?id_service_pack=".$result->id_service_pack."\"> Modifier</a><br>\n") ;
    }
echo "<br>";	
echo "<form action=\"service_pack.php\">\n";
echo "<input type=submit value=\"Retour à la page d'administration des services pack\">";
echo"</form>";

    // deconnexion de la base
mysql_close(); 
  ?>
</body>
</html>