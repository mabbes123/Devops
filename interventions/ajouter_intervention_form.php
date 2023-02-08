<?php
include('../connect_base.php');
?>

<html>
<head>
<title>Ajouter une intervention</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="../lien.css" rel="stylesheet" type="text/css">
<script>
List = new Array();
function Remplir(valeur){
	var sel="";
    sel ="<select size='1' name='materiel'>";
   // Parcourir le tableau
   for (var i=0;i<List.length;i++)
    {
      // tester si la ligne du tableau (materiel) correspond à la valeur du type_materiel
      if (List[i][1]==valeur)
      {
        // Ajouter une rubrique materiel au variable SEL
        sel= sel + "<option value="+List[i][0]+">"+List[i][2]+"</option>";
      }
  
    }
    sel =sel + "</select>";
    // Modifier le DIV id_materiel par la nouvelle List à partir du variable SEL
    document.getElementById('id_materiel').innerHTML=sel;
 }
 </script>
</head>

<body marginheight="40" bgcolor="#fffcd9">
<p align="center" class="style2"><strong>- Ajouter un nouveau ticket d'intervention -</strong></p>
<br>
<form name="ajout_intervention" method="post" action="ajout_intervention.php">
<table align="center" border="0">
	<tr>
	  <td>Type de matériel : </td>
      <td><select size="1" name="type_materiel" OnChange="Remplir(type_materiel.value)">
  		<?php
 			$i=0; // variable de test
 			$j=0; // variable pour garder la valeur du premier enregistrement type materiel pour l'affichage
  
 			// Séléction de tous les enregistrements de la table type materiel
 			$requete1="Select id_type_materiel, libelle_type_materiel from type_materiel where id_type_materiel>1 order by libelle_type_materiel;";
 			$resultat1= mysql_query ($requete1) or die ("Select impossible");
  
			 while ($recup1=mysql_fetch_row($resultat1))
 			{
  				// Remplir la liste déroulante des catégorie
 				 echo "\t\t<option value=".($recup1[0]).">".($recup1[1])."</option>";
  				 if ($i==0) { $j=$recup1[0]; $i=1; } // garder la valeur du premier enregistrement
  			}
 
 		?>

 		</select></td>
 	 <td> <font>Nom du matériel :</font></td>
	 <td><DIV id="id_materiel">
 <select size="1" name="materiel">
 </select>
 </DIV></td>
    </tr>
	<tr>
	  <td align="right">Date du problème : </td>
	  <td><input type="text" name="date_probleme" maxlength="10"></td>
	  <td align="right">Problème rencontré :</td>
	  <td><textarea name=probleme></textarea></td>
    </tr>
	<tr>
	  <td align="right">Date intervention :</td>
	  <td><input type="text" name="date_intervention" maxlength="10"></td>
	  <td align="right">Durée (en minutes) : </td>
	  <td><input type="text" name="duree"></td>
	</tr>
	<tr>
	  
	  <td align="right">Réalisé par : </td>
	  <td><?php
			$requete1 = mysql_query("SELECT * FROM intervenant i, type_intervenant t where i.id_type_intervenant=t.id_type_intervenant and id_intervenant >1 and libelle_type_intervenant='réparateur';");
			?>

			<select name="intervenant" id="intervenant">
			<?php
				while($recup1 = mysql_fetch_array($requete1)) {
			?>
   			<option value="<?php echo $recup1['id_intervenant']; ?>" selected><?php echo $recup1['nom_complet_intervenant']; ?>
			</option>
			<?php
    		}
			?>
            </select></td>
	  <td align="right">Compte rendu : </td>
	  <td><textarea name="compte_rendu"></textarea></td>
	</tr>

<?php
 // Séléction de tous les enregistrements de la table materiel
 $requete3="Select id_materiel, id_type_materiel, nom_materiel from materiel order by nom_materiel;";
 $resultat3= mysql_query ($requete3) or die ("Select impossible");
 // $i = initialise le variable i
 $i=0;
 while ($recup3=mysql_fetch_row($resultat3))
 {
  // Remplir le tableau (array) en javascript
  // ex : List[1]=new Array (1,1,"materiel 1");
  // ex : List[2]=new Array (2,1,"materiel 2");
  echo "<script>List[".$i."] = new Array(".($recup3[0]).",".($recup3[1]).",'".($recup3[2])."');</script>";
  $i=$i+1; // Incrémentation de $i
 }
 echo "<script>Remplir ($j); </script>"; // Remplir la deuxième liste de choix avec les données
                                         // des materiels en utilisant la valeur j
 ?>
</table>
<br>
	<center><input type ="submit" value="Enregistrer"></center>
</form>

</body>
</html>
<?php
// deconnexion de la base
mysql_close();
?>