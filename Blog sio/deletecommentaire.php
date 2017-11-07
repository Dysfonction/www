<?php include "includes/header.php";
    $id_commentaire=$_GET['id_c'];
    $id_article=$_GET['id_a'];
    $requete=$bdd->query("DELETE FROM commentaire WHERE id_c=".$id_commentaire);
    header("Location:article.php?id_a=$id_article");
?>

<?php include "includes/footer.php"; ?>