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
        <h2> Mot de passe oublié ?</h2>
        <form method="post" action="post-mdp-perdu.php">
            <p>
                <h3>Entrer les coordonnées</h3><br />
                <label>Votre Adresse Mail</label> : <input type="mail" name="mail" placeholder="Ex : dupont.pierre@gmail.com" maxlength="50" /><br /><br />
                <label>Mot Clé</label> : <input type="text" name="motcle" placeholder="Ex : carotte" maxlength="20" /><br /><br />
                <label>Nouveau mot de passe</label> : <input type="password" name="mdp" maxlength="20" /><br /><br />
                <input type="submit" value="Valider" />
            </p>
        </form>
    </body>
    <?php include("footer.php"); ?>
</html>