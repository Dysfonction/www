<?php $titre="Topics";
    $id_c=(int)$_GET["id_c"];
    if(isset($_GET['modif'])){$modif=(int)$_GET["modif"];}
    if(isset($_GET['supp'])){
            $supp=(int)$_GET['supp'];
            $bdd->query("DELETE FROM post WHERE id_t=$supp");
            $bdd->query("DELETE FROM topic WHERE id_t=$supp");
            header("Location:index.php?p=categorie&id_c=".$id_c);
        }
    if(isset($_POST['submit'])){
        extract($_POST);
        $requete=$bdd->prepare("INSERT INTO topic(titre,description,id_cat) VALUES(:titre,:description,$id_c)");
        $requete->bindValue(':titre',$titre,PDO::PARAM_STR);
        $requete->bindValue(':description',$description,PDO::PARAM_STR);
        $requete->execute();
    }
    if(isset($_POST['submit2'])){
        echo "modification effectuées";
        extract($_POST);
        $requete=$bdd->prepare("UPDATE topic SET titre=:titre,description=:description WHERE id_t=$modif");
        $requete->bindValue(':titre',$titre,PDO::PARAM_STR);
        $requete->bindValue(':description',$description,PDO::PARAM_STR);
        $requete->execute();
        header("Location:index.php?p=categorie&id_c=".$_GET['id_c']);}
    $requete=$bdd->query("SELECT t.* FROM topic t,categorie c WHERE t.id_cat=c.id_cat AND c.id_cat ='$id_c'");
    while($reponse=$requete->fetch()){
        if(isset($_GET['modif'])){
            if($modif!=$reponse['id_t']){
                echo "<br><a class='topic' href='index.php?p=topic&id_t=$id_t'>".$reponse['titre']."</a>";
                if(isset($_SESSION['connecte']) && $_SESSION['lvl']>1){ //modif & supp
                        echo " - <a href='index.php?p=categorie&id_c=".$_GET['id_c']."&modif=".$reponse['id_t']."'>Modifier</a> <a href='index.php?p=categorie&id_c=".$_GET['id_c']."&supp=".$reponse['id_t']."'>Supprimer</a><br>";}
            }
            else{
                $requete2=$bdd->query("SELECT * FROM topic WHERE id_t=$modif");
                $reponse2=$requete2->fetch();
                $description=$reponse2["description"];
                $titre=$reponse2["titre"];?>
                <form action="#" method="POST">
                <?php
                echo "<input type='text' name='titre' value='$titre'>";
                echo "<input type='text' name='description' value='$description'>";
                echo "<input type='hidden' name='modif' value='$modif'>"?>
                <input type="submit" name='submit2' value="Modifier"></form>
                <?php
            }
        }
        else{
            $id_t=$reponse['id_t'];
            echo "<br><a class='topic' href='index.php?p=topic&id_t=$id_t'>".$reponse['titre']."</a>";
            if(isset($_SESSION['connecte']) && $_SESSION['lvl']>1){ //modif & supp
                        echo " - <a href='index.php?p=categorie&id_c=".$_GET['id_c']."&modif=".$reponse['id_t']."'>Modifier</a> <a href='index.php?p=categorie&id_c=".$_GET['id_c']."&supp=".$reponse['id_t']."'>Supprimer</a><br>";
            }
        }
    }
    if(isset($_SESSION['connecte']) && $_SESSION['lvl']>1){
        echo "<br>Ajouter un sujet : ";
        ?>
        <form method="POST" action="#">
            <br>Nom du sujet : <input type="text" name="titre">
            <br>Description du sujet : <input type="text" name="description"><br>
            <input type="submit" name="submit" value="Envoyer">
        </form><?php
    }
?>