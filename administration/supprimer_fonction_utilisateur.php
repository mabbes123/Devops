<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Supprimer fonction_utilisateur</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">

<?php
//récupérer les données du formulaire "supprimer_batiment_etage"
$n=$_REQUEST['libfonction_utilisateur'];

//Ne pas effacer l'utilisateur de la fonction supprimée
$requete1="update utilisateur set id_fonction_utilisateur=1 where id_fonction_utilisateur='".$n."'";
$resultat1 = mysql_query($requete1);

  // requéte suppression de l'enregistrement
  $query="DELETE 
            FROM fonction_utilisateur
	    WHERE id_fonction_utilisateur = ".$n ;
  
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
echo "<input type='button' value=\"Retour\" onclick=\"window.location='supprimer_fonction_utilisateur_form.php';\">";
echo "</form>";
  // deconnexion de la base
mysql_close(); 

?>
</body>
</html>
