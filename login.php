<?
include("connect_base.php");

if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass'])) {
  extract($_POST);
  // on recup�re le password de la table qui correspond au login du visiteur
  $sql = "select mdp_utilisateur from utilisateur where login_utilisateur='".$login."'";
  $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
  $data = mysql_fetch_assoc($req);
  
  if($data['mdp_utilisateur'] != $pass) 
  {
    ?>
	<script language="JavaScript">
	alert("Le login ou le mot de passe que vous avez saisie est erron�. Merci de recommencer");
	window.location.replace("index.php");// On inclut le formulaire d'identification
	</script>
	<?
	//Une fen�tre d'alerte s'affiche lorsque le login ou le mot de passe est invalide et renvoit vers la page pour se logger

  }
  else {
    session_start(); //on d�marre une session
    $_SESSION['login'] = $login; //la variable de session $_SESSION['login'] r�cup�re le login saisi
    header("Location: accueil.htm");// lien vers la page d'accueil de l'espace priv�
	  
  }
     
}
else {
	?>
	<script language="JavaScript">
	alert("Vous avez oubli� de remplir un champ. Merci de recommencer");
	window.location.replace("index.php");
	</script>
	<?
//Une fen�tre d'alerte s'affiche lorsque le login ou le mot de passe est vide et renvoit vers la page pour se logger	
}

?>