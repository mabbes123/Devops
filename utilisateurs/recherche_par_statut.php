<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Recherche mat?riel en fonction du statut</title>
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>

<body marginheight="40" bgcolor="#fffcd9">
<?
$statut=$_POST['statut'];

$requete1="select libelle_statut from statut where id_statut=".$statut.";";
$resultat1 = mysql_query($requete1) or die("erreur dans la requete : " . $requete1);
$row=mysql_fetch_array($resultat1);
$libelle_statut=$row[0];

$requete="select nom_materiel, libelle_type_materiel, libelle_modele_materiel, nom_societe, date_achat_materiel
				from materiel m, type_materiel t, modele_materiel mo, societe s, statut st
				where st.id_statut=m.id_statut
						and m.id_modele_materiel=mo.id_modele_materiel 
						and m.id_societe=s.id_societe
						and t.id_type_materiel=m.id_type_materiel
						and st.id_statut=".$statut."
						order by libelle_type_materiel;";
						
$resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
?>
<p align="center" class="style2"><strong>- Recherche de mat?riel <?=$libelle_statut?> -</strong></p>
<TABLE border="1" align="center" class="tableau">
    <tr>
      <th width="150" align="center" class="style3" >Nom du mat?riel</th>
      <th width="140" align="center" class="style3" >Type de materiel</th>
      <th width="180" align="center" class="style3" >Mod?le de mat?riel</th>
	  <th width="100" align="center" class="style3" >Fabricant</th>
	  <th width="180" align="center" class="style3" >Date d'acquisition</th>
    </tr>

<?
while ($row=mysql_fetch_array($resultat))
{
$nom_materiel=$row[0];
$type_materiel=$row[1];
$modele_materiel=$row[2];
$fabricant=$row[3];
$date_achat=$row[4];

// $achat est une valeur r?cup?r?e au format YYYY-MM-DD
list($y,$m,$d) = explode('-', $date_achat);
$date_achat=$d.'/'.$m.'/'.$y; // date au format fran?ais

?>
	<td align="center">
        <?=$nom_materiel."&nbsp;"?>      </td>
	<td align="center">
        <?=$type_materiel."&nbsp;"?>      </td>
    <td align="center">
        <?=$modele_materiel."&nbsp;"?>      </td>  	
	<td align="center">
        <?=$fabricant."&nbsp;"?>      </td>
	<td align="center">
        <?=$date_achat."&nbsp;"?>      </td>
</tr>
<?php
}
?>
</TABLE>
<br><center><input type="button" value="Retour" onClick="window.location='recherche_form.php'"></input></center>

</body>
</html>
<?php
// deconnexion de la base
mysql_close();
?>