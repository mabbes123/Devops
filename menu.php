<?php
session_start();
//include "configuration.php";
?>

<html>
<head>
<title>menu</title>
<!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">-->
<meta charset="utf-8">
<link rel="stylesheet" href="liensmenu.css" type="text/css">
<link rel="stylesheet" href="liens" type="text/css">

</head>
<body>



<?
// On test bien que l'utilisateur c'est bien connecter car il aurait pu se connecter en tapant l'url : /supcom/accueil.htm sans se logger

$login=$_SESSION['login'];
if (empty($login))
	echo "<br><br><br><br><br><br><br><br><br><br><center>Problème de connexion veuillez vous reconnecter <br><a href=\"./index.php\" target=\"_blank\" >Reconnexion</a></center> ";
else
	echo "
<div align=\"center\">
  <p><img src=\"images/logo.png\" width=\"158\" height=\"105\"><br>
    <br>
    <span class=\"Style1\"><font face=\"Times New Roman, Times, serif\" size=\"+1\">Bonjour $login
  </font></span></p>
  <p><br>   
    <a href=\"./materiel/cadregestion_mat.htm\" target=\"gestion\">Mat&#xE9;riel </a><br>
    <br>
    <a href=\"./logiciels/cadregestion_log.htm\" target=\"gestion\">Logiciels </a><br>
    <br>
    <a href=\"./utilisateurs/cadregestion_util.htm\" target=\"gestion\">Utilisateurs </a><br>
    <br>
    <a href=\"./fournisseurs/cadregestion_four.htm\" target=\"gestion\">Fournisseurs </a><br>
    <br>
    <a href=\"./intervenants/cadregestion_intervenants.htm\" target=\"gestion\">Intervenants </a><br>
    <br>
    <a href=\"./interventions/cadregestion_interventions.htm\" target=\"gestion\">Interventions </a><br>
    <br>
    <a href=\"./administration/cadregestion_admin.htm\" target=\"gestion\">Administration </a><br>
  </p>
  <p><a href=\"session_fin.php\" target=\"_parent\">D&#xE9;connexion </a><br>
    <br>
    <br>
    
  </p>
</div>
";?>


</body>
</html>
