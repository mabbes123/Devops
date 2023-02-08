<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php
include('../connect_base.php');

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");


//récupérer les données envoyées dans l'adresse URL après confirmation
$utilisateur=$_GET['code'];

//Ne pas effacer le poste affecter à l'utilisateur
$requete1="update materiel set id_utilisateur=null where id_utilisateur='".$utilisateur."'";
$resultat1 = mysql_query($requete1);

//Ne pas effacer appartenir affecter à l'utilisateur
$requete1="update appartenir set id_utilisateur=1 where id_utilisateur='".$utilisateur."'";
$resultat1 = mysql_query($requete1);

// requéte affichage du nom et du libelle_type d'utilisateur
  $requete="SELECT nom_complet_utilisateur, nom_societe
            from utilisateur u, appartenir a, societe s 
	  		where u.id_utilisateur=a.id_utilisateur and a.id_societe = s.id_societe and 			u.id_utilisateur=".$utilisateur ;
	  
  // execution de la requète et test
  $resultat = mysql_query($requete);
  $row=mysql_fetch_array($resultat);
  
// requéte suppression de l'enregistrement
  $requete1="DELETE FROM utilisateur WHERE id_utilisateur = ".$utilisateur ;
// execution de la requète et test
  $resultat1 = mysql_query($requete1);

 if($resultat1)
  {
    echo("<center><span class=style3>La suppression de l'utilisateur ".$row[0]." employé de la société ".$row[1]." a correctement été effectuée</span><br>") ;
  }
  else
  {
    echo("<center><span class=style3>La suppression de l'utilisateur ".$row[0]." employé de la société ".$row[1]." a échouée</span><br>") ;
  }
	
  // bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_utilisateur.php';\">";
echo "</form>";

  // deconnexion de la base
mysql_close(); 


?>
</body>
</html>
