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
          include("connection.php");?>

	<body>
		<h2> Numero de place à attribuer </h2><br/>
		<?php
		$i = 0;

		$req = $bdd->query('SELECT * FROM PLACE');
		while($donnees = $req->fetch())
		{
			if($donnees['statut'] == 1)
			{
				$i++;
			}
		}

		if($i == 10)
		{
			echo'Toute les places sont prises.<a href="file-attente.php?num_attente='.$_GET['num_attente'].'">Ajouter à la liste d\'attente</a><br /><br />';
		}
		else
		{
		 	echo '<form method="post" action="post-attribution-place.php?num_attente='.$_GET['num_attente'].'">';

		 	$req2 = $bdd->query('SELECT * FROM PLACE');

		 	echo'<select name="numplace">';
		 	while($donnees2 = $req2->fetch())
		 	{
		 		if($donnees2['statut'] == 0)
		 		{
					echo'<option value='.$donnees2['num_place'].'>'.$donnees2['num_place'].'</option>';
				}
		 	}
		 	echo '</select><br /><br />
		 	<input type="submit" value="Valider">
		 	</form>';
		}
		?>

	</body>
    <?php include("footer.php"); ?>
</html>
