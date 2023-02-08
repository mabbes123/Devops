<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Supprimer statut_materiel</title>
<meta http-equiv="Content-statut" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" statut="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">

<?php
//récupérer les données du formulaire "supprimer_statut_materiel"
$n=$_REQUEST['libstatut_materiel'];

//Ne pas effacer les materiels du statut supprimer
$requete1="update materiel set id_statut=1 where id_statut='".$n."'";
$resultat1 = mysql_query($requete1);



  // requéte suppression de l'enregistrement
  $query="DELETE 
            FROM statut
	    WHERE id_statut = ".$n ;
  
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
echo "<input type='button' value=\"Retour\" onclick=\"window.location='supprimer_statut_materiel_form.php';\">";
echo "</form>";
  // deconnexion de la base
mysql_close(); 

?>
</body>
</html>
