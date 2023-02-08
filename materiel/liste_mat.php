<?php
include "../connect_base.php";
?>

<html>
<head>
<title>Liste des catégories de materiel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>

<body marginheight="50" bgcolor="#fffcd9">

<div align="center">
<font color="#000066" size="5" face="Comic Sans MS">
<?php
echo "Liste des ".$_GET["libelle"]."s";
echo  "<br><br>";
?>
</font>
<?php
//récupération de donnée
$choix=$_GET["libelle"];
//requête de travail
$sql="select * from materiel m, type_materiel tm, statut s 
		where m.id_type_materiel=tm.id_type_materiel 
				and s.id_statut=m.id_statut
				and libelle_type_materiel='".$choix."' 
				order by nom_materiel";
$query1=mysql_query($sql) or die(mysql_error());
while ($row=mysql_fetch_row($query1))

{

	

echo "<font class=\"style4\">"; echo($row[3]); echo "</font>"; echo "&nbsp;";


echo  "<a href=\"detail_materiel.php?&code=".$row[0]."\" target=\"bas\" class=\"style5\"><img src=\"../images/detail.png\"></a>"; echo "&nbsp;";

echo  "<a href=\"modifier_materiel_form.php?&code=".$row[0]."\" target=\"bas\" class=\"style5\"><img src=\"../images/modifier.gif\"></a>"; echo "&nbsp;";

echo  "<a href=\"confirmation_supprimer_materiel.php?&code=".$row[0]."\" target=\"bas\" class=\"style5\"><img src=\"../images/supprimer.png\"></a>";

echo "<font class=\"style1\">"; echo($row[15]); echo "</font>"; echo "&nbsp;";

echo "<font>"; echo "&nbsp;"; 
	if ($row[9] != '') 
		{
			echo  "<a href=\"desaffecter_materiel.php?&code=".$row[0]."\" target=\"bas\" class=\"style2\">Désaffectation</a>";
		} 
	else 
		{
			echo "<a href=\"affecter_materiel1_form.php?&code=".$row[0]."\" target=\"bas\" class=\"style2\">Affecter à un utilisateur</a>";
		} 
echo "</font>";echo "&nbsp;";


echo "<br><br>";
}

  // deconnexion de la base
mysql_close(); 
?>
</div>
</body>
</html>

