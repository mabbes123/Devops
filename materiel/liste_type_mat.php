<?php
include "../connect_base.php";
?>

<html>
<head>
<title>Liste des catégories de materiel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>

<body marginheight="35" bgcolor="#fffcd9">

<?php
//requête de travail
$sql="select libelle_type_materiel from type_materiel order by libelle_type_materiel";
$query1=mysql_query($sql) or die(mysql_error());
while ($row=mysql_fetch_row($query1))
{
echo  "<div align=\"center\"><a href=\"liste_mat.php?&libelle=".$row[0]."\" target=\"bas\">".$row[0]."</a></div>";
echo "<br><br>";
}
?>
</body>
</html>
