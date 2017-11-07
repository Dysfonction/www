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
		<h2> Liste des utilisateurs </h2><br/>
		<table>

		<?php
		$req = $bdd->query('SELECT * FROM UTILISATEUR WHERE statut = 1');
		?>
		
		<tr>
			<td>Nom</td>
			<td>Prenom</td>
			<td>Adresse</td>
			<td>Code Postal</td>
			<td>Telephone</td>
			<td>Mail</td>
			<td>Mot Clé</td>
		</tr>

		<?php
		while($donnees = $req->fetch())
		{
			echo '<tr>
					<td>'.$donnees['nom'].'</td>
					<td>'.$donnees['prenom'].'</td>
					<td>'.$donnees['adresse'].'</td>
					<td>'.$donnees['cp'].'</td>
					<td>+33'.$donnees['tel'].'</td>
					<td>'.$donnees['mail'].'</td>
					<td>'.$donnees['motcle'].'</td>
					<td><a href = "modifier-profil.php?id_uti='.$donnees['id_uti'].'">Modifier</a></td>
					<td><a href = "supprimer-profil.php?id_uti='.$donnees['id_uti'].'">Supprimer</a></td>
				  </tr>';
		}
		?>
		</table>
	</body>
    <?php include("footer.php"); ?>
</html>
