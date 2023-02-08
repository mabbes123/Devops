<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php
include('../connect_base.php');

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");


//récupérer les données envoyées dans l'adresse URL après confirmation
$societe=$_GET['code'];

//Ne pas effacer les logiciels affectés à la societe supprimée
$requete1="update logiciel set id_societe=1 where id_societe='".$societe."'";
$resultat1 = mysql_query($requete1);

//Ne pas effacer les intervenants affectés à la societe supprimée
$requete2="update intervenant set id_societe=1 where id_societe='".$societe."'";
$resultat2 = mysql_query($requete2);

//Ne pas effacer appartenir affecté à la societe supprimée
$requete3="update appartenir set id_societe=1 where id_societe='".$societe."'";
$resultat3 = mysql_query($requete3);

//Ne pas effacer les materiels affectés à la societe supprimée
$requete4="update materiel set id_societe=1 where id_societe='".$societe."'";
$resultat4 = mysql_query($requete4);

//Ne pas effacer les composants affectés à la societe supprimée
$requete5="update composant set id_societe=1 where id_societe='".$societe."'";
$resultat5 = mysql_query($requete5);

// requéte affichage du nom et du libelle_type de la société
  $requete="SELECT nom_societe, libelle_type_societe
            from societe s, type_societe t 
	  where s.id_type_societe=t.id_type_societe and id_societe=".$societe ;
  // execution de la requète et test
  $resultat = mysql_query($requete);
  $row=mysql_fetch_array($resultat);
  
// requéte suppression de l'enregistrement
  $requete="DELETE FROM societe WHERE id_societe = ".$societe ;

// execution de la requète et test
  $resultat = mysql_query($requete);

 if($resultat)
  {
    echo("<center><span class=style3>La suppression de la société ".$row[0]." de type ".$row[1]." a correctement été effectuée</span><br>") ;
  }
  else
  {
    echo("<center><span class=style3>La suppression de la société ".$row[0]." de type ".$row[1]." a échouée</span><br>") ;
  }
	
  // bouton de retour
echo "<br><br>";
echo "<form>";
echo "<input type='button' value=\"Retour\" onclick=\"window.location='liste_fournisseur.php';\">";
echo "</form>";

  // deconnexion de la base
mysql_close(); 


?>
</body>
</html>
