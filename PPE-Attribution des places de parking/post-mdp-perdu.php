<!DOCTYPE html>
<html>
		<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="moncss.css" />
	<title>Site de reservation</title>
	<h1> MAISON DES LIGUES DE LORRAINE </h1>
	</head>

	<?php 
		include("menu.php");
		include("connection.php"); 
	?>

	<body>
		<h2> Mot de passe oublié ?</h2><br/>

		<?php 
		$mail = $_POST['mail'];
		$motcle = $_POST['motcle'];
		$mdp = $_POST['mdp']; 
		$trouve = false;

		$req = $bdd->query('SELECT * FROM UTILISATEUR');
		while($donnees = $req->fetch())
		{
			if($donnees['mail'] == $mail && $donnees['motcle'] == $motcle)
			{
				$req2 = $bdd->prepare('UPDATE utilisateur SET mdp = :mdp WHERE mail = :mail AND motcle = :motcle');
				$req2->execute(array(
					'mail'=> $mail,
					'motcle'=> $motcle,
					'mdp'=> $mdp));

				$trouve = true;

				echo 'Le mot de passe a été changer. <a href="page-connection.php">Retour à la page de connexion</a>';
			}
		}

		if($trouve == false)
		{
			echo'Erreur de saisie.<a href="mdp-perdu.php">Resaisir</a>ou <a href="index.php">Retour à la page d\'accueil</a>';
		}

		?>

	</body>
    <?php include("footer.php"); ?>
</html>
