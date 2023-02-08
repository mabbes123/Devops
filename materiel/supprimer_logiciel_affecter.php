<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php
include('../connect_base.php');

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");


//récupérer les données envoyées dans l'adresse URL après confirmation
$id_materiel=$_GET['id_materiel'];
$id_logiciel=$_GET['id_logiciel'];

// requéte affichage du nom du logiciel, version, service_pack et du nom du materiel auquel le composant était affecter
  $requete="SELECT nom_materiel, nom_logiciel, version_logiciel, libelle_service_pack
            from installer i, logiciel l, service_pack s
	  		where s.id_service_pack=l.id_service_pack
					and so.id_societe=l.id_societe
					and l.id_logiciel=i.id_logiciel 
					and i.id_materiel=".$id_materiel." 
					and i.id_logiciel=".$id_logiciel.";";
					
  // execution de la requète et test
  $resultat = mysql_query($requete);
  $row=mysql_fetch_array($resultat);
  
// requéte suppression de l'enregistrement
  $requete="DELETE FROM installer WHERE id_materiel = ".$id_materiel." and id_logiciel=".$id_logiciel  ;

// execution de la requète et test
  $resultat = mysql_query($requete);

 if($resultat)
  {
    echo("<center><span class=style3>La suppression du logiciel ".$row[1]." ".$row[2]." ".$row[3]." affecté au matériel ".$row[0]." a correctement été effectué</span><br>") ;
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
