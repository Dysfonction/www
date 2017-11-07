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

	<?php include("menu.php");
		  include("connection.php");  ?>

	<body>
		<h2> Modification du mot de passe </h2><br/>

		<?php
			$mdpa = $_POST['mdpa'];
			$mdp = $_POST['mdp'];

			$req = $bdd->query('SELECT * FROM utilisateur');
			while($donnees = $req->fetch())
			{
				if($donnees['id_uti'] == $_SESSION['id_uti'])
					{
						if($donnees['mdp'] == $mdpa)
						{
							$req2 = $bdd->prepare('UPDATE utilisateur SET mdp = :mdp WHERE id_uti = :id_uti');
							$req2->execute(array(
								'id_uti'=>$donnees['id_uti'],
								'mdp'=> $mdp));
							echo 'Le mot de passe a été changer.<a href="index.php">Retour à l\'accueil</a>';
						}
						else
						{
							echo' Erreur de saisie du mot de passe, <a href="modifier-mdp.php">resaisir</a>';
						}
					}
			}
		?>
		</p>
	</body>
    <?php include("footer.php"); ?>
</html>
