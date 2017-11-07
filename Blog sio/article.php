<?php include "includes/header.php"; 
    $requete=$bdd->query("SELECT * FROM article WHERE id_a=".$_GET["id_a"]);
    $id_article=$_GET["id_a"];
    $reponse=$requete->fetch();
    if(isset($_POST['connecte'])){$nom=$_SESSION['nom'];}
    if(isset($_POST['submit'])){
        $commentaire=$_POST["commentaire"];
        $requete = $bdd->query("INSERT INTO commentaire(commentaire,id_a,pseudo) VALUES('$commentaire','$id_article','$nom')");
    }
?>
    <section>
        <h2><?php echo $reponse['titre']; ?></h2>
        <p>
            <?php echo $reponse['contenu']; ?>
            <?php if(isset($_SESSION['connecte']))
                    {if ($_SESSION['lvl']>=2){echo '<a class="suppress" href="deletearticle.php?id_a='.$id_article.'">Supprimer article</a>';}} ?>
        </p>
    </section>
    <?php
if(isset($_SESSION['connecte']))
    {?>
        <section>
            <form action="#" method="post">
                <?php
        echo "<h2>Ajouter un commentaire</h2><textarea class='left' name='commentaire' id='commentaire'></textarea><br><br>'";
        echo submit('submit','Créer');
        if(isset($_POST['submit'])){echo "Commentaire ajouté.";}?></form>
        </section>
        <?php
    }?>
            <section>
                <?php $requete=$bdd->query("SELECT * FROM commentaire WHERE id_a='$id_article'");
 while($reponse2=$requete->fetch())
    {?>
                    <h2 class="comm">
        <?php 
        echo "Commentaire de ".$reponse2['pseudo']." : ";
        echo $reponse2['commentaire'];
        ?></h2><p class="suppress">
        <?php if(isset($_SESSION['connecte']))
                    {if ($_SESSION['lvl']>=2){echo '<a href="deletecommentaire.php?id_c='.$reponse2["id_c"].'&id_a='.$id_article.'">Supprimer commentaire</a>';} ?></p>
                    <?php }} ?>
            </section>
<?php include "includes/footer.php"; ?>