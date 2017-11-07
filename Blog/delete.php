<?php
    include "includes/header.php";
    $requete=$bdd->query("DELETE FROM user WHERE id_u=".$_SESSION['id_u']);
    session_destroy();
    header("Location:index.php");
?>