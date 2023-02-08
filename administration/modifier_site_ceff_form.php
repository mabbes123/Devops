<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Modifier Site CEFF</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">

<p align="center" class="style2"><strong>- Modifier un site CEFF</strong> - </p>
<?php
  //requête SQL:
    $sql = "SELECT *
	      FROM societe s, type_societe t where s.id_type_societe=t.id_type_societe and libelle_type_societe='site CEFF'" ;
  
    //exécution de la requête:
    $requete = mysql_query( $sql) ;
  
    //affichage des données:
    while( $result = mysql_fetch_object( $requete ) )
    {
       echo("<div align=\"center\">".$result->nom_societe."<a href=\"modifier_site_ceff_form2.php?code=".$result->id_societe."\"> Modifier</a><br>\n") ;
    }
echo "<br>";	
echo "<form action=\"site_ceff.php\">\n";
echo "<input type=submit value=\"Retour à la page d'administration des sites CEFF\">";
echo"</form>";

    // deconnexion de la base
mysql_close(); 
  ?>
</body>
</html>