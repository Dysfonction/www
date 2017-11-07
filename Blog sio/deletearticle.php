<?php include "includes/header.php";
    $id_article=$_GET['id_a'];
    $requete=$bdd->query("DELETE FROM article WHERE id_a=".$id_article);
    $requete=$bdd->query("DELETE FROM commentaire WHERE id_a=".$id_article);
    header("Location:index.php");
?>

<?php include "includes/footer.php"; ?>