<html>
<body marginheight="20" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");

include('../connect_base.php');

//récupérer les données de l'url
$logiciel=$_GET['code'];

// requéte affichage du nom et de la version du logiciel
  $requete="SELECT nom_logiciel, version_logiciel
            FROM logiciel
	    WHERE id_logiciel = ".$logiciel ;
  // execution de la requète et test
  $resultat = mysql_query($requete);
  $row=mysql_fetch_array($resultat);
  
  
  //Titre de la page
  echo "<center>";
  echo "<span class=style2>Suppression du logiciel ".$row[0]." ".$row[1]."</span><br>";
  echo "<br><br>";

  
  echo "Voulez-vous vraiment supprimer cette enregistrement ?";
  echo "<br><br>";
  echo"<br><br>";
  
	
  // bouton de OUI et NON
  
echo "<form>";
echo "<input type='button' value=\"OUI\" onclick=\"window.location='supprimer_logiciel.php?code=$logiciel';\">";
echo "&nbsp;";
echo "<input type='button' value=\"NON\" onclick=\"window.location='liste_logiciel.php';\">";
echo "</form>";

  // deconnexion de la base
mysql_close(); 


?>
</p>
<p>&nbsp; </p>
</body>
</html>
