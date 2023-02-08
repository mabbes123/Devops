<?php
include('../connect_base.php');
?>

<html>
<head>
<script>
List = new Array();
function Remplir(valeur){
	var sel="";
    sel ="<select size='1' name='composant'>";
   // Parcourir le tableau
   for (var i=0;i<List.length;i++)
    {
      // tester si la ligne du tableau (composant) correspond à la valeur du type_composant
      if (List[i][1]==valeur)
      {
        // Ajouter une rubrique composant au variable SEL
        sel= sel + "<option value="+List[i][0]+">"+List[i][2]+" "+List[i][3]+"</option>";
      }
  
    }
    sel =sel + "</select>";
    // Modifier le DIV id_composant par la nouvelle List à partir du variable SEL
    document.getElementById('id_composant').innerHTML=sel;
 }
 </script>
<title>Modifier un materiel</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">
<link href="../tableau.css" rel="stylesheet" type="text/css">

</head>

<body marginheight="40" bgcolor="#fffcd9">

<form name="modifier_materiel" method="post" action="modifier_materiel.php">

<?

$materiel=$_GET["code"];


//requête de travail caractéristique matériel
$requete1="select * from materiel m, statut s, type_materiel t, modele_materiel mo, societe so where m.id_modele_materiel=mo.id_modele_materiel and m.id_statut=s.id_statut and so.id_societe=m.id_societe and t.id_type_materiel=m.id_type_materiel and m.id_materiel='$materiel'";
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


//requête de travail caractéristique composant
$requete2="select libelle_type_composant, libelle_composant, precision_composant, qte_composant 
				from type_composant t, composant c, composer co, materiel m 
				where t.id_type_composant=c.id_type_composant and c.id_composant=co.id_composant and co.id_materiel=m.id_materiel and m.id_materiel='$materiel'";
$resultat2=mysql_query($requete2) or die(mysql_error());
while ($row1=mysql_fetch_array($resultat1))
{
$libelle_type_composant=$row2[0];
$libelle_composant=$row2[1];
$precision=$row2[2];
$qte=$row2[3];
}

echo "<center>";
echo "<span class=style2>Modification du materiel ".$nom_materiel."</span><br>";
echo "<br><br>";
echo "</center>";

?>
<input type="hidden" name="code" value="<?=$code_materiel?>">
<table align="center" border="0">
	<tr>
	  <td align="right">Numéro de série:</td>
	  <td><input type="text" name="num_serie" value="<?=$num_serie?>"></td>
	  <td align="right">Tag CEFF : </td>
	  <td><input type="text" name="tag_ceff" value="<?=$tag?>"></td>
	  </tr>
	<tr>
	  <td align="right">Nom matériel :</td>
	  <td><input type="text" name="nom" value="<?=$nom_materiel?>"></td>
	  <td align="right">Date d'achat :</td>
	  <td><input type="text" name="date_achat" maxlength="10" value="<?=$achat?>"></td>
	  </tr>
	<tr>
 	  <td align="right">Fabricant : </td>
	  <td><?php $requete3 = mysql_query("SELECT * FROM societe s, type_societe t where s.id_type_societe=t.id_type_societe and libelle_type_societe <> 'Site CEFF' and id_societe>1"); ?> 
			<select name="societe" id="societe">
			<?php
				while($recup3 = mysql_fetch_array($requete3)) {
			?>
   			<option value="<?php echo $recup3['id_societe']; ?>"><?php echo $recup3['nom_societe']; ?>
			</option>
			<?php
    		}
			?>
            </select></td>
	  <td align="right">Statut :</td>
	  <td><?php $requete4 = mysql_query("SELECT * FROM statut where id_statut >1"); ?> 
			<select name="statut" id="statut">
			<?php
				while($recup4 = mysql_fetch_array($requete4)) {
			?>
   			<option value="<?php echo $recup4['id_statut']; ?>"><?php echo $recup4['libelle_statut']; ?>
			</option>
			<?php
    		}
			?>
            </select></td>	  
	</tr>
	<tr>
	  <td align="right">Modèle du matériel : </td>
	  <td><?php $requete5 = mysql_query("SELECT * FROM modele_materiel where id_modele_materiel >1"); ?> 
			<select name="modele_materiel" id="modele_materiel">
			<?php
				while($recup5 = mysql_fetch_array($requete5)) {
			?>
   			<option value="<?php echo $recup5['id_modele_materiel']; ?>"><?php echo $recup5['libelle_modele_materiel']; ?>
			</option>
			<?php
    		}
			?>
            </select></td>
      	<td align="right">Type de matériel : </td>
	  	<td><?php $requete6 = mysql_query("SELECT * FROM type_materiel where id_type_materiel>1"); ?> 
			<select name="type_materiel" id="type_materiel">
			<?php
				while($recup6 = mysql_fetch_array($requete6)) {
			?>
   			<option value="<?php echo $recup6['id_type_materiel']; ?>"><?php echo $recup6['libelle_type_materiel']; ?>
			</option>
			<?php
    		}
			?></select>
	  	</td>
	  </tr>
	  <tr>
	    <td align="right">Adresse IP :</td>
	    <td><input type="text" name="adresseip" maxlength="15" value="<?=$ip?>" ></td>
	    <td align="right">Observation : </td>
	    <td><textarea name="observation" ><?=$observation?></textarea></td>
	  </tr>
	  </table><br>
	  <div align="center"><input type ="submit" value="Enregistrer"></div><br>
</form>

<hr><br>

<center><span class=style2>- Composants du materiel <?=$nom_materiel?> -</span></center><br>

<?
//requête de travail caractéristique composant
$requete2="select libelle_type_composant, libelle_composant, precision_composant, qte_composant, c.id_composant, t.id_type_composant, nom_societe
				from type_composant t, composant c, composer co, materiel m, societe s
				where t.id_type_composant=c.id_type_composant 
					and s.id_societe=c.id_societe
					and c.id_composant=co.id_composant 
					and co.id_materiel=m.id_materiel 
					and m.id_materiel='$materiel'";
					
$resultat2=mysql_query($requete2) or die(mysql_error());
?>

<TABLE border="1" align="center" class="tableau">
    <tr>
      <th width="180" align="center" class="style3" >Type composant</th>
	  <th width="180" align="center" class="style3" >Fabricant</th>
      <th width="180" align="center" class="style3" >Libellé composant</th>
      <th width="200" align="center" class="style3" >Précision sur le composant</th>
	  <th width="50" align="center" class="style3" >Quantité</th>
	  <th width="50" align="center" class="style3" >Supprimer</th>
    </tr>

<?
while ($row2=mysql_fetch_array($resultat2))
{

$libelle_type_composant=$row2[0];
$libelle_composant=$row2[1];
$precision=$row2[2];
$qte=$row2[3];
$id_type_composant=$row2[5];
$id_composant=$row2[4];
$nom_societe=$row2[6];
?>	
	
	<td align="center">
        <?=$libelle_type_composant."&nbsp;"?>      </td>
	<td align="center">
        <?=$nom_societe."&nbsp;"?>      </td>	
	<td align="center">
        <?=$libelle_composant."&nbsp;"?>      </td>
    <td align="center">
        <?=$precision."&nbsp;"?>      </td>  	
	<td align="center">
        <?=$qte."&nbsp;"?>      </td>
	<td align="center">
        <a href=confirmation_supprimer_composant_affecter.php?id_composant=<?=$id_composant?>&&id_materiel=<?=$materiel?> target="bas" title="Supprimer"><img src="../images/supprimer.png"></a></td>
</tr>

<?php
}
?>

</TABLE>
<br><br>
<hr><br>
<center><span class=style2>- Affecter un composant au matériel <?=$nom_materiel?> -</span></center><br>

<form name="affecter_composant" method="post" action="affecter_composant.php">

<input type="hidden" name="code" value="<?=$code_materiel?>">

<TABLE align="center" class="tableau">
    <tr>
      <th width="180" align="center" class="style3" >Type composant</th>
      <th width="140" align="center" class="style3" >Libellé composant</th>
      <th width="200" align="center" class="style3" >Précision sur le composant</th>
	  <th width="50" align="center" class="style3" >Quantité</th>
    </tr>
<tr>
    	<td align="center"><select size="1" name="type_composant" OnChange="Remplir(type_composant.value)">
  		<?php
 			$i=0; // variable de test
 			$j=0; // variable pour garder la valeur du premier enregistrement composant pour l'affichage
  
 			// Séléction de tous les enregistrements de la table type_composant
 			$requete1="Select id_type_composant, libelle_type_composant from type_composant where id_type_composant>1 order by libelle_type_composant;";
 			$resultat1= mysql_query ($requete1) or die ("Select impossible");
  
			 while ($recup1=mysql_fetch_row($resultat1))
 			{
  				// Remplir la liste déroulante des composants
 				 echo "\t\t<option value=".($recup1[0]).">".($recup1[1])."</option>";
  				 if ($i==0) { $j=$recup1[0]; $i=1; } // garder la valeur du premier enregistrement
  			}
 
 		?>
		</select></td>
	 	<td align="center"><DIV id="id_composant">
 			<select size="1" name="composant">
 			</select></DIV></td>
		
		<?php
 		// Séléction de tous les enregistrements de la table composant
 		$requete3="Select id_composant, id_type_composant, libelle_composant, nom_societe from composant c, societe s where c.id_societe=s.id_societe order by libelle_composant;";
 		$resultat3= mysql_query ($requete3) or die ("Select impossible");
 		// $i = initialise le variable i
 		$i=0;
 		while ($recup3=mysql_fetch_row($resultat3))
 		{
  		// Remplir le tableau (array) en javascript
  		// ex : List[1]=new Array (1,1,"composant 1");
  		// ex : List[2]=new Array (2,1,"composant 2");
  		echo "<script>List[".$i."] = new Array(".($recup3[0]).",".($recup3[1]).",'".($recup3[3])."','".($recup3[2])."');</script>";
  		$i=$i+1; // Incrémentation de $i
 		}
 		echo "<script>Remplir ($j); </script>"; // Remplir la deuxième liste de choix avec les données des composants en utilisant la valeur j
		 ?>
		 
 <td align="center"><input type="text" name="precision"></td>
 <td align="center"><input type="text" name="qte" maxlength="3" size="3" value="1"></td>
 <td align="center"><input type ="submit" value="Affecter"></td>
</tr>
</table>		
</form>

<br><br>
<hr><br>


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
	  <th width="200" align="center" class="style3" >Supprimer</th>
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
	<td align="center">
        <a href=confirmation_supprimer_logiciel_affecter.php?id_logiciel=<?=$id_logiciel?>&&id_materiel=<?=$materiel?> target="bas" title="Supprimer"><img src="../images/supprimer.png"></a></td>
</tr>

<?php
}
?>

</TABLE>

<br><br><hr><br>
<center><span class=style2>- Affecter un logiciel -</span></center><br>
<form name="affecter_logiciel" method="post" action="affecter_logiciel1.php">

<input type="hidden" name="materiel" value="<?=$code_materiel?>">

<TABLE align="center" class="tableau">
	<tr>
      <th width="180" align="center" class="style3" >Nom logiciel</th>
    </tr>
<tr>
   	  <td><?php $requete3 = mysql_query("Select id_logiciel, nom_logiciel, version_logiciel, libelle_service_pack from logiciel l, service_pack s where s.id_service_pack=l.id_service_pack order by nom_logiciel;"); ?> 
			<select name="logiciel" id="logiciel">
			<?php
				while($recup3 = mysql_fetch_array($requete3)) {
			?>
   			<option value="<?php echo $recup3['id_logiciel']; ?>"><?php echo $recup3['nom_logiciel'];echo "&nbsp;";echo $recup3['nom_logiciel'];echo "&nbsp;";echo $recup3['version_logiciel'];echo "&nbsp;";echo $recup3['libelle_service_pack']; ?>
			</option>
			<?php
    		}
			?>
            </select></td>			 
  <td align="center"><input type ="submit" value="Affecter"></td>
</tr>
</table>
</form>
</body>
</html>

<?
// deconnexion de la base
mysql_close();
?>