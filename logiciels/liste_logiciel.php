<?php
include "../connect_base.php";
?>
<html>
<head>
<title>Liste des logiciels</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../tableau.css" rel="stylesheet" type="text/css">

<script language="Javascript">
function imprimer(){window.print();}
</script>

</head>

<body marginheight="20" bgcolor="#fffcd9">
<input name="imprimer" onClick="imprimer()" type="button" value="Imprimer cette page"><br><br>
<?php
//requête de travail
$sql="select nom_logiciel, version_logiciel, date_achat_logiciel, observation_logiciel, 		nom_societe, libelle_service_pack, id_logiciel
	  from logiciel l, societe s, service_pack sp 
	  where l.id_societe=s.id_societe and sp.id_service_pack=l.id_service_pack;";
$req1=mysql_query($sql) or die(mysql_error());
?>
<div align="center">
<span class="style2"><strong><font face="Comic Sans MS">Liste des Logiciels</font></strong><br>
</span><br>
<TABLE border="1" align="center" class="tableau">
    <tr class="style3">
	  <th width="80" align="center" >Nom </th>	
      <th width="49" align="center" >Version</th>
      <th width="100" align="center" >Service Pack   </th>
      <th width="68" align="center" >Societe </th>
      <th width="81" align="center" >Date d'achat  </th>
      <th width="161" align="center" >Observation</th>
	  <th width="77" align="center" >Modification</th>
	  <th width="77" align="center" >Suppression</th>
    </tr>
<?php
while ($row=mysql_fetch_row($req1))
{
$code=$row[6];
$nom=$row[0];
$version=$row[1];
$achat=$row[2];
// $achat est une valeur récupérée au format YYYY-MM-DD
list($y,$m,$d) = explode('-', $achat);
$achat=$d.'/'.$m.'/'.$y; // date au format français
$observation=$row[3];
$societe=$row[4];
$service_pack=$row[5];
?>	  

	  <td align="center">
        <?=$nom."&nbsp;"?>      </td>
      <td align="center">
        <?=$version."&nbsp;"?>      </td>
      <td align="center">
        <?=$service_pack."&nbsp;"?>      </td>
      <td align="center">
        <?=$societe."&nbsp;"?>      </td>
      <td align="center">
        <?=$achat."&nbsp;"?>      </td>
	  <td align="center">
        <?=$observation."&nbsp;"?>      </td>
      <td align="center">
        <a href=modifier_logiciel_form.php?code=<?=$code?> target="bas" title="Modifier"><img src="../images/modifier.gif"></a></td>
	  <td align="center">
        <a href=confirmation_supprimer_logiciel.php?code=<?=$code?> target="bas" title="Supprimer"><img src="../images/supprimer.png"></a></td>
	  
		
    </tr>
<?
}
?>
</table>
</div>
</body>
</html>
