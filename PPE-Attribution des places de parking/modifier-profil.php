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

    <?php 
        include("menu.php"); 
        include("connection.php");
    ?>

    <body>
        <h2> Modification du profil </h2>
    <?php
        $req = $bdd->query('SELECT * FROM utilisateur');
        while($donnees = $req->fetch())
        {
            if($donnees['id_uti'] == $_GET['id_uti'])
                {
                    $nom = $donnees['nom'];
                    $prenom = $donnees['prenom'];
                    $adresse = $donnees['adresse'];
                    $cp = $donnees['cp'];
                    $tel = $donnees['tel'];
                    $mail = $donnees['mail'];
                    $motcle = $donnees['motcle'];
                }
        }

        echo '<form method="post" action="post-modifier-profil.php?id_uti='.$_GET['id_uti'].'">'
        ?>
            <p>
                <label>Votre Nom</label> : <?php echo $nom ?><br /><br />
                <label>Votre Prenom</label> : <?php echo $prenom ?><br /><br />
                <label>Votre Adresse</label> : <input type="text" name="adresse" maxlength="50" value="<?php echo $adresse ?>"/><br /><br />
                <label>Votre Code Postal</label> : <input type="text" name="cp" maxlength="5" value="<?php echo $cp ?>"/><br /><br />
                <label>Votre Numero de tel</label> : <input type="text" name="tel" maxlength="10" value="<?php echo '0'.$tel ?>" /><br /><br />
                <label>Votre Adresse Mail</label> : <input type="email" name="mail" maxlength="50" value="<?php echo $mail ?>" /><br /><br />
                <label>Mot Clé (en cas de perte de mdp)</label> : <input type="text" name="motcle" maxlength="20" value="<?php echo $motcle ?>" /><br /><br />
                <input type="submit" value="Valider" />
            </p>
        </form>
    </body>
    <?php include("footer.php"); ?>
</html>