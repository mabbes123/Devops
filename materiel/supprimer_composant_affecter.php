<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php
include('../connect_base.php');

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");


//récupérer les données envoyées dans l'adresse URL après confirmation
$id_materiel=$_GET['id_materiel'];
$id_composant=$_GET['id_composant'];

// requéte affichage du nom du composant et du nom du materiel auquel le composant était affecter
  $requete="SELECT nom_materiel, libelle_composant
            from materiel m, composer co, composant c
	  where m.id_materiel=co.id_materiel and c.id_composant=co.id_composant and m.id_materiel=".$id_materiel ;
  // execution de la requète et test
  $resultat = mysql_query($requete);
  $row=mysql_fetch_array($resultat);
  
// requéte suppression de l'enregistrement
  $requete="DELETE FROM composer WHERE id_materiel = ".$id_materiel." and id_composant=".$id_composant  ;

// execution de la requète et test
  $resultat = mysql_query($requete);

 if($resultat)
  {
    echo("<center><span class=style3>La suppression du composant ".$row[1]." affecté au matériel ".$row[0]." a correctement été effectué</span><br>") ;
  }
  else
  {
    echo("<center><span class=style3>La suppression du composant ".$row[1]." affecté au matériel ".$row[0]." a échoué</span><br>") ;
  }
	
  // bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='modifier_materiel_form.php?code=$id_materiel';\">";
echo "</form>";

  // deconnexion de la base
mysql_close(); 


?>
</body>
</html>
