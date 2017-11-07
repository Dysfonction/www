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
		<h2> Les inscriptions en attentes </h2><br/>
		<table>
		<?php
		$req = $bdd->query('SELECT * FROM UTILISATEUR WHERE statut = 0');

		while($donnees = $req->fetch())
		{
			echo '<tr><td>'.$donnees['nom'].'</td>
					<td>'.$donnees['prenom'].'</td>
					<td><a href = "inscription-accept.php?id_uti='.$donnees['id_uti'].'">Accepter</a></td>
					<td><a href = "inscription-refus.php?id_uti='.$donnees['id_uti'].'">Refuser</a></td>
				  </tr>';
		}
		?>
		</table>
	</body>
    <?php include("footer.php"); ?>
</html>
