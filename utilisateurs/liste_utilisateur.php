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
$requete="SELECT * 
			FROM utilisateur u, appartenir a, societe s, fonction_utilisateur f
			WHERE f.id_fonction_utilisateur=u.id_fonction_utilisateur 
				and u.id_utilisateur=a.id_utilisateur 
				and a.id_societe = s.id_societe 
				and u.id_utilisateur >1
				and nom_utilisateur <> 'admin';";
				
$resultat=mysql_query($requete) or die(mysql_error());
?>
<div align="center">
<span class="style2"><strong><font face="Comic Sans MS">Liste des utilisateurs</font></strong><br>
</span><br>
<TABLE border="1" align="center" class="tableau">
    <tr class="style3">
	  <th width="93" align="center">Nom </th>
	  <th width="93" align="center">Prénom </th>
      <th width="83" align="center">Téléphone</th>
      <th width="70" align="center">E-mail</th>
	  <th width="70" align="center">Fonction utilisateur</th>
      <th width="113" align="center">Société</th>
	  <th width="45" align="center" >Détail</th>
	  <th width="81" align="center" >Modification</th>
	  <th width="77" align="center" >Suppression</th>
	</tr>
<?php
//boucle d'affichage des données dans le tableau
while ($row=mysql_fetch_row($resultat))
{
$code=$row[0];
$nom=$row[1];
$prenom=$row[2];
$tel=$row[5];
$mail=$row[7];
$societe=$row[16];
$fonction=$row[28];

?>		
	  <td align="center">
        <?=$nom."&nbsp;"?>      </td>
	  <td align="center">
        <?=$prenom."&nbsp;"?>      </td>
      <td align="center">
        <?=$tel."&nbsp;"?>      </td>
      <td align="center">
        <?=$mail."&nbsp;"?>      </td>
	  <td align="center">
        <?=$fonction."&nbsp;"?>      </td>	
      <td align="center">
        <?=$societe."&nbsp;"?>      </td>
	  <td align="center">
        <a href=detail_utilisateur.php?code=<?=$code?> target="bas" title="Détail"><img src="../images/detail.png"></a></td>
	  <td align="center">
        <a href=modifier_utilisateur_form.php?code=<?=$code?> target="bas" title="Modifier"><img src="../images/modifier.gif"></a></td>
      <td align="center">
        <a href=confirmation_supprimer_utilisateur.php?code=<?=$code?> target="bas" title="Supprimer"><img src="../images/supprimer.png"></a></td>
    </tr>
<?
//fin de la boucle d'affichage
}
?>
</table>
</div>
</body>
</html>
