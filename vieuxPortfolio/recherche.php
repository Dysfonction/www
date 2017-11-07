<?php 
	try
		{
			$bdd=new PDO("mysql:host=localhost;dbname=portfolio;charset=utf8","root","");
		}
	catch(Exception $e)
		{
			die("Erreur de connection à la bdd.");
		}
	if(isset($_POST['submit']))
	{
		extract($_POST);
		if(strlen($recherche)<3){
			echo "Veuillez saisir au moins 3 caractères";
		}
		else{
			$separation = explode(' ',$recherche);
			$taille=count($separation);
			$sql = "SELECT * FROM projet WHERE titre LIKE '%".$separation[0]."%' OR description LIKE '%".$separation[0]."%' "; 

			for($i = 1; $i < $taille; $i++)
			{
				$sql .= "OR titre LIKE '%".$separation[$i]."%' OR description LIKE '%".$separation[$i]."%' ";
			}
			$requete=$bdd->query($sql);
			while($reponse=$requete->fetch()){					
				
				echo "<strong>".$reponse['titre']."</strong>";	
				echo "<p>".$reponse['description']."</p> ";	
				echo $reponse['date_start']." - ".$reponse['date_end']."<br><br>";
			}
		}
	}
?>
<link rel="stylesheet" href="style.css">
<meta charset="utf-8">
<form method="post" action="#">
<input type="text" name="recherche">
<input type="submit" name="submit" value="Rechercher">
</form>