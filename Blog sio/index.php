<?php include "includes/header.php"; 
    $requete=$bdd->query("SELECT * FROM article");
    if(isset($_SESSION['connecte']))
    {
        echo "<section><a href='articlecreate.php'>Créer un article</a></section>";
    }
    while($reponse=$requete->fetch())
    {?>
    <section>
        <?php 
            echo "<h2 class='titre'>".$reponse['titre']."</h2><br>";
            echo substr($reponse['contenu'],0,250).'... <br><a href="article.php?id_a='.$reponse["id_a"].'">Lire +</a>';
        ?>
    </section>
    <?php }
    include "includes/footer.php"; ?>