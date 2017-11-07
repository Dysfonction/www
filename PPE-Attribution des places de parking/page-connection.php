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
        <h2> Se connecter </h2>
        <form method="post" action="post-connection.php">
            <p>
                <h3>Vos identifiants</h3><br />
                <label>Identifiant</label> : <input type="text" name="identifiant" placeholder="Ex : moncompte" maxlength="20" /><br /><br />
                <label>Mot de Passe</label> : <input type="password" name="mdp" maxlength="20" /><br /><br />
                <input type="submit" value="Valider" /> <a href="mdp-perdu.php">Mot de passe perdu ?</a>
            </p>
        </form>
    </body>
    <?php include("footer.php"); ?>
</html>