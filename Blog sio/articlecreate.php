<?php include "includes/header.php"; 
    authentification();
    if(isset($_POST['submit']))
    {
        $titre=$_POST['titre'];
        $contenu=$_POST['contenu'];
        $requete=$bdd->query("INSERT INTO article(titre,contenu) VALUES('$titre','$contenu')");
    }

?>

<section>
   <form action="#" method="post">
    <?php 
        echo input('titre');
    ?>
        <textarea name="contenu" id="contenu" ></textarea><br>
    <?php
        echo submit('submit','Insérer');
        if(isset($_POST['submit'])){echo "<br>Article ajouté.<br>";}
    ?>
    </form>
</section>

<?php include "includes/footer.php"; ?>