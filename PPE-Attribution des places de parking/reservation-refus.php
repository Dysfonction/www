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
		<h2> Les réservations en attentes </h2><br/>

		<?php
			$req = $bdd->query('SELECT * FROM attente');
			while($donnees = $req->fetch())
			{
				if($donnees['num_attente'] == $_GET['num_attente'])
				{
					$req2 = $bdd->prepare('DELETE FROM attente WHERE num_attente = :num_attente');
					$req2->execute(array(
						'num_attente'=>$donnees['num_attente']));
					echo 'La demande de reservation a bien été supprimer.<a href="reservation-attente.php">Retour à la liste de reservation</a>';
				}
			}
		?>
		</p>
	</body>
    <?php include("footer.php"); ?>
</html>
