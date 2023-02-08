<?php
include('../connect_base.php');
?>

<html>
<head>
<script language="Javascript">
function imprimer(){window.print();}
</script>
<title>Ajouter un materiel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">
<link href="../tableau.css" rel="stylesheet" type="text/css">

</head>

<body bgcolor="#fffcd9">
<p align="left"><input name="imprimer" onClick="imprimer()" type="button" value="Imprimer cette page"></p>
<form name="detail_materiel" method="post">

<?
$materiel=$_GET["code"];


//requête de travail caractéristique matériel
$requete1="select * from materiel m, statut s, type_materiel t, modele_materiel mo, societe so 		where m.id_modele_materiel=mo.id_modele_materiel and m.id_statut=s.id_statut and so.id_societe=m.id_societe and t.id_type_materiel=m.id_type_materiel and m.id_materiel='$materiel'";
$resultat1=mysql_query($requete1) or die(mysql_error());

while ($row1=mysql_fetch_array($resultat1))
{
$code_materiel=$row1[0];
$num_serie=$row1[1];
$tag=$row1[2];
$nom_materiel=$row1[3];
$achat_bd=$row1[4];
// $achat est une valeur récupérée au format YYYY-MM-DD
list($y,$m,$d) = explode('-', $achat_bd);
$achat=$d.'/'.$m.'/'.$y; // date au format français
$ip=$row1[5];
$observation=$row1[6];
$libelle_statut=$row1[13];
$libelle_type_materiel=$row1[15];
$libelle_modele=$row1[17];
$fabricant=$row1[19];
}


echo "<center>";
echo "<span class=style2>- Caractéristique du materiel ".$nom_materiel." -</span><br>";
echo "<br><br>";
echo "</center>";

?>
<input type="hidden" name="code" value="<?=$code?>">
<table align="center" border="0">
	<tr>
	  <td align="right">Numéro de série:</td>
	  <td><input type="text" name="num_serie" value="<?=$num_serie?>" readonly="1"></td>
	  <td align="right">Tag CEFF : </td>
	  <td><input type="text" name="tag_ceff" value="<?=$tag?>" readonly="1"></td>
	  </tr>
	<tr>
	  <td align="right">Nom matériel :</td>
	  <td><input type="text" name="nom" value="<?=$nom_materiel?>" readonly="1"></td>
	  <td align="right">Date d'achat :</td>
	  <td><input type="text" name="date_achat" maxlength="10" value="<?=$achat?>" readonly="1"></td>
	  </tr>
	<tr>
 	  <td align="right">Fabricant : </td>
	  <td><input type="text" name="nom" value="<?=$fabricant?>"></td>
	  <td align="right">Statut :</td>
	  <td><input type="text" name="nom" value="<?=$libelle_statut?>" readonly="1"></td>	  
	</tr>
	<tr>
	  <td align="right">Modèle du matériel : </td>
	  <td><input type="text" name="nom" value="<?=$libelle_modele?>" readonly="1"></td>
      <td align="right">Type de matériel : </td>
	  <td><input type="text" name="nom" value="<?=$libelle_type_materiel?>" readonly="1"></td>
	  </tr>
	  <tr>
	    <td align="right">Adresse IP :</td>
	    <td><input type="text" name="adresseip" maxlength="15" value="<?=$ip?>" readonly="1"></td>
	    <td align="right">Observation : </td>
	    <td><textarea name="observation" readonly="1"><?=$observation?></textarea></td>
	  </tr>
	  </table><br>
</form>

<center><span class=style2>- Composant du materiel <?=$nom_materiel?> -</span></center><br>

<?
//requête de travail caractéristique composant
$requete2="select libelle_type_composant, libelle_composant, precision_composant, qte_composant 
				from type_composant t, composant c, composer co, materiel m 
				where t.id_type_composant=c.id_type_composant and c.id_composant=co.id_composant and co.id_materiel=m.id_materiel and m.id_materiel='$materiel'";
$resultat2=mysql_query($requete2) or die(mysql_error());
?>

<TABLE border="1" align="center" class="tableau">
    <tr>
      <th width="180" align="center" class="style3" >Type composant</th>
      <th width="180" align="center" class="style3" >Libellé composant</th>
      <th width="200" align="center" class="style3" >Précision sur le composant</th>
	  <th width="50" align="center" class="style3" >Quantité</th>
    </tr>

<?
while ($row2=mysql_fetch_array($resultat2))
{
$libelle_type_composant=$row2[0];
$libelle_composant=$row2[1];
$precision=$row2[2];
$qte=$row2[3];

?>
	<td align="center">
        <?=$libelle_type_composant."&nbsp;"?>      </td>
	<td align="center">
        <?=$libelle_composant."&nbsp;"?>      </td>
    <td align="center">
        <?=$precision."&nbsp;"?>      </td>  	
	<td align="center">
        <?=$qte."&nbsp;"?>      </td>
</tr>
<?php
}
?>
</TABLE>
<br><br>
<center><span class=style2>- Logiciel du materiel <?=$nom_materiel?> -</span></center><br>

<?
//requête de travail caractéristique composant
$requete2="select nom_logiciel, version_logiciel, libelle_service_pack, nom_societe, l.id_logiciel
				from logiciel l, service_pack s, installer i, societe so
				where s.id_service_pack=l.id_service_pack
					and so.id_societe=l.id_societe
					and l.id_logiciel=i.id_logiciel
					and i.id_materiel='$materiel'";
					
$resultat2=mysql_query($requete2) or die(mysql_error());
?>

<TABLE border="1" align="center" class="tableau">
    <tr>
      <th width="180" align="center" class="style3" >Fabricant</th>
	  <th width="180" align="center" class="style3" >Nom logiciel</th>
      <th width="180" align="center" class="style3" >Version</th>
      <th width="200" align="center" class="style3" >Service pack</th>
    </tr>

<?
while ($row2=mysql_fetch_array($resultat2))
{
$nom_logiciel=$row2[0];
$version_logiciel=$row2[1];
$libelle_service_pack=$row2[2];
$nom_societe=$row2[3];
$id_logiciel=$row2[4];
?>	
	
	<td align="center">
        <?=$nom_societe."&nbsp;"?>      </td>
	<td align="center">
        <?=$nom_logiciel."&nbsp;"?>      </td>	
	<td align="center">
        <?=$version_logiciel."&nbsp;"?>      </td>
    <td align="center">
        <?=$libelle_service_pack."&nbsp;"?>      </td>  	
</tr>

<?php
}
?>

</TABLE>
<br><br>
<center><span class=style2>- Utilisateur du materiel <?=$nom_materiel?> -</span></center><br>

<?
//requête de travail caractéristique composant

$requete3="select nom_complet_utilisateur, libelle_fonction_utilisateur, u.id_utilisateur, libelle_batiment_etage, libelle_service, nom_societe
 	from materiel m, utilisateur u, fonction_utilisateur f, appartenir a, batiment_etage b, service s, societe so
	where m.id_utilisateur=u.id_utilisateur 
		and f.id_fonction_utilisateur=u.id_fonction_utilisateur
		and a.id_utilisateur=u.id_utilisateur
		and b.id_batiment_etage=a.id_batiment_etage
		and s.id_service=a.id_service
		and so.id_societe=a.id_societe
		and m.id_materiel='$materiel'";

$resultat3=mysql_query($requete3) or die(mysql_error());
$row3=mysql_fetch_array($resultat3);
$id_utilisateur=$row2[2];

$requete4="select libelle_batiment_etage from batiment_etage b, appartenir a where  b.id_batiment_etage=a.id_batiment_etage and id_utilisateur='$id_utilisateur'";
$resultat4=mysql_query($requete4) or die(mysql_error());
$row4=mysql_fetch_array($resultat4);

?>


<TABLE border="1" align="center" class="tableau">
    <tr>
      <th width="180" align="center" class="style3" >Nom complet utilisateur</th>
      <th width="150" align="center" class="style3" >Fonction utilisateur</th>
      <th width="150" align="center" class="style3" >Batiment-Etage</th>
	  <th width="150" align="center" class="style3" >Service</th>
  	  <th width="75" align="center" class="style3" >Site</th>
    </tr>
	<tr>
	<td align="center">
        <?=$row3[0]."&nbsp;"?>      </td>
	<td align="center">
        <?=$row3[1]."&nbsp;"?>      </td>
    <td align="center">
        <?=$row3[3]."&nbsp;"?>      </td>  	
	<td align="center">
        <?=$row3[4]."&nbsp;"?>      </td>
	<td align="center">
        <?=$row3[5]."&nbsp;"?>      </td> 
</tr>

</TABLE>
</body>
</html>

<?
// deconnexion de la base
mysql_close();
?>