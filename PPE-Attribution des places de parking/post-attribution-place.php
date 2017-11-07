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
		$num_attente = $_GET['num_attente'];
		$numplace = $_POST['numplace'];
		$statut = 1;


			$req=$bdd->query('SELECT * FROM PLACE');
			while($donnees = $req->fetch())
			{
				if($donnees['num_place'] == $numplace)
				{
						$req2 = $bdd->prepare('UPDATE ATTENTE SET num_place = :num_place, statut = :statut WHERE num_attente = :num_attente');
						$req2->execute(array(
							'num_place'=> $numplace,
							'statut'=> $statut,
							'num_attente'=> $num_attente));

						$req3 = $bdd->prepare('UPDATE PLACE SET statut = :statut WHERE num_place = :num_place');
						$req3->execute(array(
							'statut'=> $statut,
							'num_place'=> $numplace));
				
				}
			}

			echo 'L\'attribution de la place a été faite. <a href="reservation-attente.php">Retour aux attributions des places</a>';
		?>

	</body>
    <?php include("footer.php"); ?>
</html>
