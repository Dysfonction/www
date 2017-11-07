<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
        <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="moncss.css" />
    <title>Site de reservation</title>
    <h1> MAISON DES LIGUES DE LORRAINE </h1>
    </head>

    <?php include("menu.php");
          include("connection.php");  ?>

    <body>
        <h2> DECONNEXION</h2><br/>

        <?php
            session_destroy();
            echo 'Votre deconnexion a reussi. Aller à <a href="index.php">l\'accueil</a>';
        ?>
        </p>
    </body>
    <?php include("footer.php"); ?>
</html>
