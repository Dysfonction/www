<?php 
	$competences=array();
    $_GET['id']=1;
    try
    {
        $bdd= new PDO("mysql:host=localhost;dbname=portfolio","root","");
    }
    catch(Exception $e)
    {
        die("Erreur de connection à la bdd.");
    }
    $requete=$bdd->query("SELECT * FROM projet WHERE id_p=".$_GET['id']);
    $reponse=$requete->fetch();
    $requete2=$bdd->query("SELECT * FROM categorie");
    $requete3=$bdd->query("SELECT * FROM competence");
	$requete4=$bdd->query("SELECT id_comp FROM englober WHERE id_p=".$_GET['id']);
	while($reponse4=$requete4->fetch()){
		$competences[]=$reponse4['id_comp'];
	}
    if(isset($_POST['submit'])){
        extract($_POST);
        $requete=$bdd->prepare("UPDATE projet SET titre=:titre,description=:contenu,date_start=:date_deb,date_end=:date_fin,id_cat=:categorie WHERE id_p=".$_GET['id']);
        $requete->bindValue(':titre',$titre,PDO::PARAM_STR);
        $requete->bindValue(':contenu',$contenu,PDO::PARAM_STR);
        $requete->bindValue(':date_deb',$date_deb,PDO::PARAM_STR);
        $requete->bindValue(':date_fin',$date_fin,PDO::PARAM_STR);
        $requete->bindValue(':categorie',$categorie,PDO::PARAM_INT);
        $requete->execute();
        foreach($comp as $competence){
            $bdd->query("INSERT INTO englober(id_p,id_comp) VALUES(".$_GET['id'].", $competence)");
        }
    }
?>

<link rel="stylesheet" href="style.css">
<form method="post" action="#">
    Titre : <input type='text' name='titre' value="<?php echo $reponse['titre']; ?>"><br>
    Contenu : <textarea name="contenu"><?php echo $reponse['description']; ?></textarea><br>
    Date de debut : <input type="text" name="date_deb" value="<?php echo $reponse['date_start']; ?>"><br>
    Date de fin : <input type="text" name="date_fin" value="<?php echo $reponse['date_end']; ?>"><br>
    Categorie : <select name="categorie" size="1">
            <?php while($reponse2=$requete2->fetch()){
	if($reponse2['id_cat']==$reponse['id_cat']){
    echo "<option value='".$reponse2['id_cat']."' selected>".$reponse2['titre']."</option>";
    }
	else echo "<option value='".$reponse2['id_cat']."'>".$reponse2['titre']."</option>";} ?>
        </select><br>
    <?php
        while($reponse3=$requete3->fetch()){
			if(in_array($reponse3['id_comp'],$competences))
            echo $reponse3['titre']." : ".$reponse3['libelle']."<input type='checkbox' name='comp[]' checked value='".$reponse3['id_comp']."'><br>";
		else
			 echo $reponse3['titre']." : ".$reponse3['libelle']."<input type='checkbox' name='comp[]' value='".$reponse3['id_comp']."'><br>";
        }
    ?>
    <input type="submit" name="submit" value="Envoyer">
</form>