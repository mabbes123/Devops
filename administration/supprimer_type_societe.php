<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Supprimer type_societe</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="lien.css" rel="stylesheet" type="text/css">
</head>
<body bgcolor="#fffcd9" marginheight="30">

<?php
//récupérer les données du formulaire "supprimer_type_societe"
$n=$_REQUEST['libtype_societe'];

//Ne pas effacer le poste affecter au type de societe
$requete1="update societe set id_type_societe=1 where id_type_societe='".$n."'";
$resultat1 = mysql_query($requete1);

  // requéte suppression de l'enregistrement
  $query="DELETE 
            FROM type_societe
	    WHERE id_type_societe = ".$n ;
  
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
echo "<input type='button' value=\"Retour\" onclick=\"window.location='supprimer_type_societe_form.php';\">";
echo "</form>";
  // deconnexion de la base
mysql_close(); 

?>
</body>
</html>
