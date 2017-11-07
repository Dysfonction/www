<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
		<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="moncss.css" />
	<title>Site de reservation</title>
	<h1> MAISON DES LIGUES DE LORRAINE </h1>
	</head>

	<?php
		include("connection.php"); 
		$identifiant = $_POST['identifiant'];
		$mdp = $_POST['mdp'];
		$trouve = false;

		$req = $bdd->query('SELECT * FROM UTILISATEUR');
		while($donnees = $req->fetch())
		{
			if($donnees['identifiant'] == $identifiant && $donnees['mdp'] == $mdp && $donnees['statut'] == 1)
			{
				$_SESSION['id_uti'] = $donnees['id_uti'];
				$_SESSION['nom'] = $donnees['nom'];
				$_SESSION['prenom'] = $donnees['prenom'];
				$trouve = true;
			}
		}
	?>
	
	<?php 
		include("menu.php");
	?>

	<body>
		<h2> CONNEXION </h2><br/>

		<?php

		if($trouve == true)
		{
			echo 'Votre connexion a reussi. Aller à <a href="index.php">l\'accueil</a>';
		}


		if($trouve == false)
		{
			echo' Erreur de saisie ou compte non existant, <a href="inscription.php">s\'inscrire</a>';
		}
		
		?>
		</p>
	</body>
    <?php include("footer.php"); ?>
</html>
