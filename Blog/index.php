<?php include "includes/header.php"; 
    $requete=$bdd->query("SELECT * FROM article");
    while($reponse=$requete->fetch())
    {?>
        <section>
            <?php echo $reponse['titre']; ?>
            <?php echo substr($reponse['contenu'],0,4)."... <a href='article.php'>Lire +</a>"; ?>
        </section>
    <?php } ?>
<?php include "includes/footer.php"; ?>