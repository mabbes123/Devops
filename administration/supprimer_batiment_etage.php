<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Supprimer batiment_etage</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">

<?php
//récupérer les données du formulaire "supprimer_batiment_etage"
$n=$_REQUEST['libbatiment_etage'];

//Ne pas effacer appartenir du batiment_etage supprimée
$requete1="update appartenir set id_batiment_etage=1 where id_batiment_etage='".$n."'";
$resultat1 = mysql_query($requete1);

  // requéte suppression de l'enregistrement
  $query="DELETE 
            FROM batiment_etage
	    WHERE id_batiment_etage = ".$n ;
  
  // execution de la requète et test
  $resultat = mysql_query($query);

 if($resultat)
  {
    echo("La suppression à été correctement effectuée") ;
  }
  else
  {
    echo("La suppression à échouée") ;
  }

  // bouton de retour
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='supprimer_batiment_etage_form.php';\">";
echo "</form>";
  // deconnexion de la base
mysql_close(); 

?>
</body>
</html>
