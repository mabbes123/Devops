<html>
<body marginheight="40" bgcolor="#fffcd9">
<?php

echo("<link rel=\"stylesheet\" type=\"text/css\" href=\"../lien.css\">");
include('../connect_base.php');

echo("<b><u>Récapitulatif sur l'utilisateur :  </u></b><BR>");

//récupérer les données du formulaire "ajout_utilisateur_form"

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$tel=$_POST['tel'];
$port=$_POST['port'];
$mail=$_POST['mail'];
$observation=$_POST['observation'];
$fonction=$_POST['fonction_utilisateur'];
$societe=$_POST['societe'];
$service=$_POST['service'];
$batiment=$_POST['batiment_etage'];
$login=$_POST['login'];
$mdp=$_POST['mdp'];


//Gestion du nom de la société 
$requete1="select nom_societe from societe where id_societe=".$societe.";";
$resultat1 = mysql_query($requete1) or die("erreur dans la requete : " . $requete1);
$row1=mysql_fetch_row($resultat1);
$nom_societe=$row1[0];

//Gestion du libelle_fonction_utilisateur
$requete2="select libelle_fonction_utilisateur from fonction_utilisateur where id_fonction_utilisateur=".$fonction.";";
$resultat2 = mysql_query($requete2) or die("erreur dans la requete : " . $requete2);
$row2=mysql_fetch_row($resultat2);
$libelle_fonction=$row2[0];

//Gestion du libelle_batiment_etage
$requete3="select libelle_batiment_etage from batiment_etage where id_batiment_etage=".$batiment.";";
$resultat3 = mysql_query($requete3) or die("erreur dans la requete : " . $requete3);
$row3=mysql_fetch_row($resultat3);
$libelle_batiment=$row3[0];

//Gestion du libelle_service
$requete4="select libelle_service from service where id_service=".$service.";";
$resultat4 = mysql_query($requete4) or die("erreur dans la requete : " . $requete4);
$row4=mysql_fetch_row($resultat4);
$libelle_service=$row4[0];

echo"<BR>";
echo("<b>Nom de l'utilisateur : </b>");
echo($nom);echo"<BR>";
echo("<b>Prénom de l'utilisateur : </b>");
echo($prenom);echo"<BR>";
echo("<b>Téléphone de bureau : </b>");
echo($tel);echo"<BR>";
echo("<b>Téléphone portable: </b>");
echo($port);echo"<BR>";
echo("<b>E-Mail : </b>");
echo($mail);echo"<BR>";
echo("<b>Société : </b>");
echo($nom_societe);echo"<BR>";
echo("<b>Fonction de l'utilisateur : </b>");
echo($libelle_fonction);echo"<BR>";
echo("<b>Batiment-étage: </b>");
echo($libelle_batiment);echo"<BR>";
echo("<b>Service : </b>");
echo($libelle_service);echo"<BR>";
echo("<b>Observation : </b>");
echo($observation);echo"<BR><BR>";

echo("<b><i>Partie Compte CEFFPARC</i></b><br>");
echo("<b>Login : </b>");
echo($login);echo"<BR>";

$nom_complet = $nom.' '.$prenom;

//gestion du numero d'utilisateur
  $requete="select max(id_utilisateur) from utilisateur;";
  $resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
 while($ctItem = mysql_fetch_array($resultat))//compteur pour afficher le rang de l inscrit
{
	$id_utilisateur = $ctItem[0]+1;
}

  // bouton de retour
  
echo "<form>";
echo "<br><input type='button' value=\"Retour\" onclick=\"window.location='ajouter_utilisateur_form.php';\">";
echo "</form>";


  // requéte insertion du nouvel enregistrement dans la table utilisateur
  $requete5="insert into utilisateur values ('".$id_utilisateur."','".$nom."','".$prenom."','".$nom_complet."','".$login."','".$tel."','".$port."','".$mail."','".$mdp."','".$observation."','".$fonction."');";
  // execution de la requète
  $resultat5 = mysql_query($requete5) or die("erreur dans la requete : " .$requete5);
  

// requéte insertion du nouvel enregistrement dans la table appartenir
  $requete6="insert into appartenir values ('".$societe."','".$id_utilisateur."','".$batiment."','".$service."');";
  // execution de la requète
  $resultat6 = mysql_query($requete6) or die("erreur dans la requete : " .$requete6);  


  // deconnexion de la base
mysql_close(); 

?>
</body>
</html>

