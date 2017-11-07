<?php     
    $titre="Accueil";

    $categorie=$bdd->query("SELECT * FROM categorie");

    while ($rcategorie=$categorie->fetch()){
        $id_c=$rcategorie["id_cat"];
        echo "<a class='categorie' href='index.php?p=categorie&id_c=$id_c'>".$rcategorie['titre']."</a>";
    }
    
    
    
?>