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
		<h2> Modification du profil </h2><br/>

		<?php
			$adresse = $_POST['adresse'];
			$cp = $_POST['cp'];
			$tel = $_POST['tel'];
			$mail = $_POST['mail'];
			$motcle = $_POST['motcle'];

			$req = $bdd->query('SELECT * FROM utilisateur');
			while($donnees = $req->fetch())
			{
				if($donnees['id_uti'] == $_GET['id_uti'])
					{
							$req2 = $bdd->prepare('UPDATE utilisateur SET adresse = :adresse, cp = :cp, tel = :tel, mail = :mail, motcle = :motcle WHERE id_uti = :id_uti');
							$req2->execute(array(
								'id_uti'=>$donnees['id_uti'],
								'adresse' => $adresse,
								'cp' => $cp,
								'tel' => $tel,
								'mail' => $mail,
								'motcle' => $motcle));

							echo 'Le profil a été modifier.<a href="liste-utilisateur.php">Retour à la liste des utilisateurs</a>';
					}
			}
		?>
		</p>
	</body>
    <?php include("footer.php"); ?>
</html>
