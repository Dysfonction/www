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
		<h2> Liste des utilisateurs </h2><br/>

		<?php
		$statut = 0;

			$req = $bdd->query('SELECT * FROM attente');
			while($donnees = $req->fetch())
			{
				if($donnees['id_uti'] == $_GET['id_uti'])
				{
					$req2 = $bdd->query('SELECT * FROM liste_attente');
					while($donnees2 = $req2->fetch())
					{
							$req3=$bdd->prepare('DELETE FROM liste_attente WHERE num_attente = :num_attente');
							$req3->execute(array(
								'num_attente'=>$donnees['num_attente']));
					}

					if($donnees['statut'] == 1)
					{
						$req4=$bdd->prepare('UPDATE place SET statut = :statut WHERE num_place = :num_place');
						$req4->execute(array(
							'num_place'=>$donnees['num_place'],
							'statut'=>$statut));
					}

					$req5=$bdd->prepare('DELETE FROM attente WHERE id_uti = :id_uti');
					$req5->execute(array(
						'id_uti'=>$donnees['id_uti']));

				}
			}

			$req6 = $bdd->query('SELECT * FROM utilisateur');
			while($donnees6 = $req6->fetch())
			{
				if($donnees6['id_uti'] == $_GET['id_uti'])
				{
					$req = $bdd->prepare('DELETE FROM utilisateur WHERE id_uti = :id_uti');
					$req->execute(array(
						'id_uti'=>$donnees6['id_uti']));
					echo 'L\'utilisateur a été supprimer.<a href="liste-utilisateur.php">Retour à la liste d\'utilisateur</a>';
				}
			}
		?>
		</p>
	</body>
    <?php include("footer.php"); ?>
</html>
