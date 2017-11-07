<?php 
    try
    {
        $bdd=new PDO("mysql:host=localhost;dbname=portfolio","root","");
    }
    catch(Exception $e)
    {
        die("Erreur de connection à la bdd.");
    }
    $requete2=$bdd->query("SELECT * FROM categorie");
    $requete3=$bdd->query("SELECT * FROM competence");
    if(isset($_POST['submit'])){
        extract($_POST);
		$image=$_FILES['image'];
		$extension=pathInfo($image['name'], PATHINFO_EXTENSION);
        $requete=$bdd->prepare("INSERT INTO projet(titre,description,date_start,date_end,id_cat) VALUES(:titre,:contenu,:date_deb,:date_fin,:categorie)");
        $requete->bindValue(':titre',$titre,PDO::PARAM_STR);
        $requete->bindValue(':contenu',$contenu,PDO::PARAM_STR);
        $requete->bindValue(':date_deb',$date_deb,PDO::PARAM_STR);
        $requete->bindValue(':date_fin',$date_fin,PDO::PARAM_STR);
        $requete->bindValue(':categorie',$categorie,PDO::PARAM_INT);
        $requete->execute();
        $id=$bdd->lastInsertId();
        foreach($comp as $competence){
            $bdd->query("INSERT INTO englober(id_p,id_comp) VALUES($id, $competence)");
		if(in_array($extension,array('jpg','png','JPG','PNG','gif','GIF'))){
            $image_name=$id.".".$extension;
            move_uploaded_file($image["tmp_name"], "avatar/".$image_name);
            $bdd->query("INSERT INTO image(nom_img,id_p) VALUES ('$image_name', $id)");
        }
        }
    }
?>


<link rel="stylesheet" href="style.css">
<form method="post" action="#" enctype="multipart/form-data">
    Titre : <input type="text" name="titre"><br>
    Contenu : <textarea name="contenu"></textarea><br>
    Date de debut : <input type="text" name="date_deb"><br>
    Date de fin : <input type="text" name="date_fin"><br>
    Categorie : <select name="categorie" size="1">
            <?php while($reponse2=$requete2->fetch()){
    echo "<option value='".$reponse2['id_cat']."'>".$reponse2['titre']."</option>";
    }?>
        </select><br>
    <?php
        while($reponse3=$requete3->fetch()){
            echo $reponse3['titre']." : ".$reponse3['libelle']."<input type='checkbox' name='comp[]' value='".$reponse3['id_comp']."'><br>";
        }
    ?>
    Image : <input type="file" name="image[]">
    <input type="file" name="image[]" id='duplicate' class="hidden">
    <a href='#' id="duplicatebtn">Ajouter une image</a><br>
    <input type="submit" name="submit" value="Envoyer">    
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
	$(function(){
		$('#duplicatebtn').click(function(e){
			e.preventDefault();
			var clone = $("#duplicate").clone().attr("id","").removeClass('hidden');
			$("#duplicate").before(clone);
		});
		
		
	})
</script>