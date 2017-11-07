	<nav>
		<?php 
		if(isset($_SESSION['nom']) && isset($_SESSION['prenom']))
		{
			if($_SESSION['nom'] == 'shao' && $_SESSION['prenom'] == 'christophe')
			{
			echo'
				<a href="index.php">ACCUEIL</a>
				<a href="reservation-encours.php">LES RESERVATIONS VALIDES</a>
				<a href="reservation-attente.php">RESERVATIONS EN ATTENTES</a>
				<a href="inscription-attente.php">INSCRIPTIONS EN ATTENTES</a>
				<a href="liste-utilisateur.php">LISTE DES UTILISATEURS</a>
				<a href="page-deco.php">SE DECONNECTER</a> ';
			}
			else
			{
				echo'
					<a href="index.php">ACCUEIL</a>
					<a href="reservation-encours.php">LES RESERVATIONS VALIDES</a>
					<a href="reservation-attente.php">RESERVATIONS EN ATTENTES</a>
					<a href="reserver.php">RESERVER</a>
					<a href="modifier-mdp.php">MODIFIER MDP</a>
					<a href="page-deco.php">SE DECONNECTER</a> ';
			}
		}
		else
		{
			echo'
				<a href="index.php">ACCUEIL</a>
				<a href="inscription.php">INSCRIPTION</a>
				<a href="page-connection.php">SE CONNECTER</a> ';
		}
		?>
	</nav>