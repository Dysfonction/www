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
		<h2> Les inscriptions en attentes </h2><br/>

		<?php
			$req = $bdd->query('SELECT * FROM utilisateur');
			while($donnees = $req->fetch())
			{
				if($donnees['id_uti'] == $_GET['id_uti'])
				{
					$req = $bdd->prepare('DELETE FROM utilisateur WHERE id_uti = :id_uti');
					$req->execute(array(
						'id_uti'=>$donnees['id_uti']));
					echo 'L\'inscription a été supprimer.<a href="inscription-attente.php">Retour à la liste d\'inscription</a>';
				}
			}
		?>
		</p>
	</body>
    <?php include("footer.php"); ?>
</html>
