<?php $titre="Posts";
    $topic=$_GET['id_t'];
    if(isset($_GET['modif'])){$modif=(int)$_GET["modif"];}
    if(isset($_POST['submit'])){
        extract($_POST);
        $requete=$bdd->prepare("UPDATE post SET contenu = :contenu WHERE id_p=$modif");
        $requete->bindValue(':contenu',$contenu,PDO::PARAM_STR);
        $requete->execute();
        header("Location:index.php?p=topic&id_t=".$_GET['id_t']);
    }
    if(isset($_POST['comment'])){
        extract($_POST);
        $requete=$bdd->prepare("INSERT INTO post(contenu, id_u, id_t, date) VALUES(:commentaire, :id_u, :id_t, now())");
        $requete->bindValue(':commentaire', $commentaire, PDO::PARAM_STR);
        $requete->bindValue(':id_u', $_SESSION['id_u'], PDO::PARAM_INT);
        $requete->bindValue(':id_t', $_GET['id_t'], PDO::PARAM_INT);
        $requete->execute();
    }
    if(isset($_GET['supp'])){
            $supp=(int)$_GET['supp'];
            $bdd->query("DELETE FROM post WHERE id_p=$supp");
            header("Location:index.php?p=topic&id_t=".$_GET['id_t']);
        }
    $requete=$bdd->query("SELECT * FROM post,user where user.id_u = post.id_u and post.id_t = ".$topic);
        while($reponse=$requete->fetch()){
        $avatar=$reponse['avatar'];
        if(!isset($modif)){echo "<br>".$reponse["contenu"];}
        if(isset($modif)){
                            if($modif!=$reponse['id_p']){echo "<br>".$reponse["contenu"];}
                            else
                            {
                                $requete2=$bdd->query("SELECT * FROM post WHERE id_p=$modif");
                                $reponse2=$requete2->fetch();
                                $contenu=$reponse2["contenu"]?>
                                <form action="#" method="POST">
                                <?php
                                echo "<textarea name='contenu' id='commentaire'>$contenu</textarea>";
                                echo "<input type='hidden' name='modif' value='$modif'>"?>
                                <input type="submit" name='submit' value="Modifier"> </form>
                                <?php
                            }
                        }
            $login=$reponse['login'];
        echo "<br>Auteur : <img src='avatar/$avatar' width=40px height=40px>";
        echo "<a href='index.php?p=profilmembre&login=$login'>$login</a>";
        echo " le ".$reponse["date"];
        if(isset($_SESSION['connecte'])){
            if(($reponse['id_u']==$_SESSION['id_u'])||($_SESSION['lvl']>1)){ //modif & supp
                        echo " <a href='index.php?p=topic&id_t=".$_GET['id_t']."&modif=".$reponse['id_p']."'>Modifier</a> <a href='index.php?p=topic&id_t=".$_GET['id_t']."&supp=".$reponse['id_p']."'>Supprimer</a>";
            }
        }
    }
if(isset($_SESSION['connecte'])){?>
       <form method="POST" action="#"><?php
        echo "<br><br>Entrer un commentaire : <br>";
        echo "<textarea name='commentaire' id='commentaire'></textarea>";
        echo "<input type='submit' value='Commenter' name='comment'>";
    }?></form><?php
?>
<script src="http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>CKEDITOR.replace("commentaire");</script>