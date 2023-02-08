<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"lien.css\">");

include('../connect_base.php');

//récupérer les données du formulaire "sup_even"
$n=$_REQUEST['descomposants'];

// requéte suppression de l'enregistrement
  $query="DELETE 
            FROM composant
	    WHERE id_composant = ".$n ;
  // execution de la requète et test
  $resultat = mysql_query($query);

 if($resultat)
  {
    echo("La suppression à été correctement effectuée<br>") ;
  }
  else
  {
    echo("La suppression à échouée") ;
  }
	
  // bouton de retour
  
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='supprimer_composant_form.php';\">";
echo "</form>";

  // deconnexion de la base
mysql_close(); 


?>
</body>
</html>
