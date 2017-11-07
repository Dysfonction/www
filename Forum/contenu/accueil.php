<?php     
    $titre="Accueil";
    if(isset($_GET['modif'])){$modif=(int)$_GET["modif"];}
    if(isset($_GET['supp'])){
            $supp=(int)$_GET['supp'];
            $bdd->query("DELETE post.* FROM post p, categorie c, topic t WHERE id_cat=$supp AND c.id_cat=t.id_cat AND t.id_t=p.id_t");
            $bdd->query("DELETE FROM topic WHERE id_cat=$supp");
            $bdd->query("DELETE FROM categorie WHERE id_cat=".$supp);
            header("Location:index.php?p=accueil");
        }
    if(isset($_POST['submit'])){
        extract($_POST);
        $requete=$bdd->prepare("INSERT INTO categorie(titre) VALUES(:titre)");
        $requete->bindValue(':titre',$titre,PDO::PARAM_STR);
        $requete->execute();
    }
    if(isset($_POST['submit2'])){
        echo "modification effectuées";
        extract($_POST);
        $requete=$bdd->prepare("UPDATE Catégorie SET titre=:titre WHERE id_cat=$modif");
        $requete->bindValue(':titre',$titre,PDO::PARAM_STR);
        $requete->execute();
        header("Location:index.php?p=accueil&id_cat=".$_GET['id_cat']);}
    $requete=$bdd->query("SELECT * FROM categorie");
    while ($reponse=$requete->fetch()){
        if(isset($_GET['modif'])){
            if($modif!=$reponse['id_cat']){
                $id_c=$reponse["id_cat"];
                echo "<a class='categorie' href='index.php?p=categorie&id_c=$id_c'>".$reponse['titre']."</a>";
                if(isset($_SESSION['connecte']) && $_SESSION['lvl']==3){ //modif & supp
                        echo "<a href='index.php?p=accueil&modif=".$id_c."'>Modifier</a> <a href='index.php?p=accueil&supp=".$id_c."'>Supprimer</a><br>";}
            }
            else{
                $requete2=$bdd->query("SELECT * FROM categorie WHERE id_cat=$modif");
                $reponse2=$requete2->fetch();
                $titre=$reponse2["titre"];?>
                <form action="#" method="POST">
                <?php
                echo "<input type='text' name='titre' value='$titre'>";
                echo "<input type='hidden' name='modif' value='$modif'>"?>
                <input type="submit" name='submit2' value="Modifier"></form>
                <?php
            }
        }
        else{
            $id_c=$reponse["id_cat"];
                echo "<a class='categorie' href='index.php?p=categorie&id_c=$id_c'>".$reponse['titre']."</a>";
            if(isset($_SESSION['connecte']) && $_SESSION['lvl']>1){ //modif & supp
                        echo "<a href='index.php?p=accueil&modif=".$id_c."'>Modifier</a> <a href='index.php?p=accueil&supp=".$id_c."'>Supprimer</a><br>";
            }
        }
    }
    if(isset($_SESSION['connecte']) && $_SESSION['lvl']==3){
        echo "<br>Ajouter une catégorie : ";
        ?>
        <form method="POST" action="#">
            <br>Nom de la catégorie : <input type="text" name="titre">
            <input type="submit" name="submit" value="Envoyer">
        </form><?php } ?>