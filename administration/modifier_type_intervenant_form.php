<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Modifier Type d'intervenant</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">

<p align="center" class="style2"><strong>- Modifier un type d'intervenant</strong> - </p>
<?php
  //requête SQL:
    $sql = "SELECT *
	      FROM type_intervenant where id_type_intervenant >1" ;
  
    //exécution de la requête:
    $requete = mysql_query( $sql) ;
  
    //affichage des données:
    while( $result = mysql_fetch_object( $requete ) )
    {
       echo("<div align=\"center\">".$result->libelle_type_intervenant."<a href=\"modifier_type_intervenant_form2.php?id_type_intervenant=".$result->id_type_intervenant."\"> Modifier</a><br>\n") ;
    }
echo "<br>";	
echo "<form action=\"type_intervenant.php\">\n";
echo "<input type=submit value=\"Retour à la page d'administration des types d'intervenant\">";
echo"</form>";

    // deconnexion de la base
mysql_close(); 
  ?>
</body>
</html>