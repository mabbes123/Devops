<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php
include('../connect_base.php');

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");


//récupérer les données envoyées dans l'adresse URL après confirmation
$intervenant=$_GET['code'];

// requéte affichage du nom et du libelle_type d'intervenant
  $requete="SELECT nom_complet_intervenant, libelle_type_intervenant
            from intervenant i, type_intervenant t 
	  where i.id_type_intervenant=t.id_type_intervenant and id_intervenant=".$intervenant ;
  // execution de la requète et test
  $resultat = mysql_query($requete);
  $row=mysql_fetch_array($resultat);
 
//Ne pas effacer les tickets interventions effectués par l'intervenant supprimé
$requete1="update intervention set id_intervenant=1 where id_intervenant='".$intervenant."'";
$resultat1 = mysql_query($requete1);
  
// requéte suppression de l'enregistrement
  $requete="DELETE FROM intervenant WHERE id_intervenant = ".$intervenant ;

// execution de la requète et test
  $resultat = mysql_query($requete);

 if($resultat)
  {
    echo("<center><span class=style3>La suppression de l'intervenant ".$row[0]." de type ".$row[1]." a correctement été effectuée</span><br>") ;
  }
  else
  {
    echo("<center><span class=style3>La suppression de l'intervenant ".$row[0]." de type ".$row[1]." a échouée</span><br>") ;
  }
	
  // bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_intervenant.php';\">";
echo "</form>";

  // deconnexion de la base
mysql_close(); 


?>
</body>
</html>
