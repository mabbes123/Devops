<?php
include('../connect_base.php');
?>
<html>
<head>
<title>Recherche intervenation en fonction du nom du matériel</title>
<link href="../lien.css" rel="stylesheet" type="text/css">
</head>

<body marginheight="40" bgcolor="#fffcd9">
<?
$materiel=$_POST['materiel'];

$requete1="select nom_materiel from materiel where id_materiel=".$materiel." group by id_type_materiel;";
$resultat1 = mysql_query($requete1) or die("erreur dans la requete : " . $requete1);
$row=mysql_fetch_array($resultat1);
$nom_materiel=$row[0];


$requete="select nom_complet_intervenant, probleme_intervention, date_probleme, date_intervention, duree_intervention, compte_rendu_intervention, id_intervention 
				from materiel , intervention , intervenant 
				where materiel.id_materiel=intervention.id_materiel 
						and intervenant.id_intervenant=intervention.id_intervenant
						and materiel.id_materiel=".$materiel.";";
							
$resultat = mysql_query($requete) or die("erreur dans la requete : " . $requete);
?>
<p align="center" class="style2"><strong>- Recherche d'intervention sur <?=$nom_materiel?> -</strong></p>
<TABLE border="1" align="center" class="tableau">
    <tr>
      <th width="140" align="center" class="style3" >Nom de l'intervenant</th>
      <th width="140" align="center" class="style3" >Problème</th>
      <th width="120" align="center" class="style3" >Date du problème</th>
	  <th width="120" align="center" class="style3" >Date intervention</th>
	  <th width="100" align="center" class="style3" >Durée intervention</th>
	  <th width="180" align="center" class="style3" >Compte-rendu</th>
	  <th width="180" align="center" class="style3" >Modification</th>
    </tr>

<?
while ($row=mysql_fetch_array($resultat))
{
$nom_intervenant=$row[0];
$probleme_intervention=$row[1];
$date_probleme=$row[2];
// $date_probleme est une valeur récupérée au format YYYY-MM-DD
list($y,$m,$d) = explode('-', $date_probleme);
$date_probleme=$d.'/'.$m.'/'.$y; // date au format français

$date_intervention=$row[3];
// $date_intervention est une valeur récupérée au format YYYY-MM-DD
list($y,$m,$d) = explode('-', $date_intervention);
$date_intervention=$d.'/'.$m.'/'.$y; // date au format français

$duree_intervention=$row[4];
$compte_rendu=$row[5];
$code=$row[6];



?>
	<td align="center">
        <?=$nom_intervenant."&nbsp;"?>      </td>
	<td align="center">
        <?=$probleme_intervention."&nbsp;"?>      </td>
    <td align="center">
        <?=$date_probleme."&nbsp;"?>      </td>  	
	<td align="center">
        <?=$date_intervention."&nbsp;"?>      </td>
	<td align="center">
        <?=$duree_intervention."&nbsp;"?>      </td>
	<td align="center">
        <?=$compte_rendu."&nbsp;"?>      </td>
	<td align="center">
        <a href=modifier_intervention_form.php?code=<?=$code?> target="bas" title="Modifier" class="style5"><img src="../images/modifier.gif"></a></td>        
</tr>
<?php
}
?>
</TABLE><br>
<center><input type="button" value="Retour" onClick="window.location='liste_intervention.php'"></input></center>

</body>
</html>
<?php
// deconnexion de la base
mysql_close();
?>