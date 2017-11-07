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

    <?php include("menu.php"); ?>
    <body>
        <h2> Modification du mot de passe </h2>
        <form method="post" action="post-modifier-mdp.php">
            <p>
                <label>Mot de passe actuel</label> : <input type="password" name="mdpa" maxlength="20" /><br /><br />
                <label>Nouveau mot de passe</label> : <input type="password" name="mdp" maxlength="20" /><br /><br />
                <input type="submit" value="Valider" />
            </p>
        </form>
    </body>
    <?php include("footer.php"); ?>
</html>