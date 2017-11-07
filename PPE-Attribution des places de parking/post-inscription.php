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
		<h2> INSCRIPTION </h2><br/>

		<?php
		$identifiant = $_POST['identifiant'];
		$mdp = $_POST['mdp'];
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$adresse = $_POST['adresse'];
		$cp = $_POST['cp'];
		$tel = $_POST['tel'];
		$mail = $_POST['mail'];
		$motcle = $_POST['motcle'];
		$verite = false;
		$statut = 0;

		$req = $bdd->query('SELECT * FROM MEMBRE');
		while($donnees = $req->fetch())
		{
			if($donnees['nom'] == $nom && $donnees['prenom'] == $prenom)
			{
				$verite = true;
			}
		}

		$req2 = $bdd->query('SELECT * FROM UTILISATEUR');
		while($donnees2 = $req2->fetch())
		{
			if($donnees2['nom'] == $nom && $donnees2['prenom'] == $prenom)
			{
				$verite = false;
			}
		}


		if($verite == true)
		{
			$req = $bdd->prepare('INSERT INTO UTILISATEUR(identifiant, mdp, nom, prenom, adresse, cp, tel, mail, statut, motcle) VALUES (:identifiant, :mdp, :nom, :prenom, :adresse, :cp, :tel, :mail, :statut, :motcle)');
			$req -> execute(array(
				'identifiant' => $identifiant,
				'mdp' => $mdp,
				'nom' => $nom,
				'prenom' => $prenom,
				'adresse' => $adresse,
				'cp' => $cp,
				'tel' => $tel,
				'mail' => $mail,
				'statut' => $statut,
				'motcle' => $motcle));

			echo 'Votre inscription a bien été prit en compte, veuillez attendre l\'acceptation de l\'admin. <a href="index.php">Retour à l\'accueil</a>';
		}
		else
		{
			echo' Le compte est deja existant ou vous n\'etes pas membre des ligues';
		}

		?>
		</p>
	</body>
    <?php include("footer.php"); ?>
</html>
