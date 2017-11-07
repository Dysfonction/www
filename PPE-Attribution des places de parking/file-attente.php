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

		$numattente = $_GET['num_attente'];
		$statut = 2;
		$compteur = 0;

		$req = $bdd->query('SELECT * FROM ATTENTE');
		while($donnees=$req->fetch())
		{
			if($donnees['num_attente'] == $numattente)
			{
				$req2 = $bdd->prepare('UPDATE ATTENTE SET statut = :statut WHERE num_attente = :num_attente');
				$req2->execute(array(
					'statut'=>$statut,
					 'num_attente'=>$numattente));

				$req3 = $bdd->query('SELECT * FROM LISTE_ATTENTE');
				while($donnees2=$req3->fetch())
				{
					if(isset($donnees2['id_listattente']))
					{
						$compteur++;
					}
				}
				$listattente = $compteur +1;

				$req4 = $bdd->prepare('INSERT INTO LISTE_ATTENTE(id_listattente, num_attente)  VALUES(:id_listattente, :num_attente)');
				$req4->execute(array(
					'id_listattente'=> $listattente,
					'num_attente'=>$numattente));

				echo'La réservation a bien été ajouté à la liste d\'attente. <a href="reservation-attente.php">Retour aux attributions des places</a>';
			}
		}
		?>
		</form>

	</body>
    <?php include("footer.php"); ?>
</html>
