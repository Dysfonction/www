<?php
    $titre="administration";
    administrateur();
    $requete=$bdd->query("SELECT count(*) FROM user WHERE connecte=1");
    $reponse=$requete->fetch();
    $requete2=$bdd->query("SELECT count(*) FROM user");
    $reponse2=$requete2->fetch();
    echo "Nombre de connectés : ".$reponse['count(*)'];
    echo "<br>Nombre d'inscrits : ".$reponse2['count(*)'];
    

?>