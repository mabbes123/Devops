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
$requete="select id_intervenant, nom_complet_intervenant, tel_intervenant, libelle_type_intervenant, nom_societe
      from intervenant i, societe s, type_intervenant ti
	  where s.id_societe=i.id_societe and i.id_type_intervenant=ti.id_type_intervenant and id_intervenant>1;";
$resultat=mysql_query($requete) or die(mysql_error());
?>
<div align="center">
<span class="style2"><strong><font face="Comic Sans MS">Liste des intervenants</font></strong><br>
</span><br>
<TABLE border="1" align="center" class="tableau">
    <tr class="style3">
	  <th width="93" align="center">Nom complet </th>	
      <th width="83" align="center">Téléphone</th>
      <th width="70" align="center">Type d'intervenant</th>
      <th width="113" align="center">Société</th>
	  <th width="45" align="center" >Détail</th>
	  <th width="81" align="center" >Modification</th>
	  <th width="77" align="center" >Suppression</th>
	</tr>
<?php
while ($row=mysql_fetch_row($resultat))
{
$code=$row[0];
$nom=$row[1];
$tel=$row[2];
$libelle_type=$row[3];
$societe=$row[4];
?>		
	  <td align="center">
        <?=$nom."&nbsp;"?>      </td>
      <td align="center">
        <?=$tel."&nbsp;"?>      </td>
      <td align="center">
        <?=$libelle_type."&nbsp;"?>      </td>
      <td align="center">
        <?=$societe."&nbsp;"?>      </td>
	  <td align="center">
        <a href=detail_intervenant.php?code=<?=$code?> target="bas" title="Détail"><img src="../images/detail.png"></a></td>
	  <td align="center">
        <a href=modifier_intervenant_form.php?code=<?=$code?> target="bas" title="Modifier"><img src="../images/modifier.gif"></a></td>
      <td align="center">
        <a href=confirmation_supprimer_intervenant.php?code=<?=$code?> target="bas" title="Supprimer"><img src="../images/supprimer.png"></a></td>
    </tr>
<?
}
?>
</table>
</div>
</body>
</html>
