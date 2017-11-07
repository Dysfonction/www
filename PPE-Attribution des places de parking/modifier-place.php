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
          include("connection.php");?>
    <body>
        <table>
        <h2> Reservation en attente </h2>
        <tr>
            <td>Numero d'attente</td>
            <td>Nom - Prenom</td>
            <td>Confirmer le numéro d'attente</td>
            <td>Entrer un nouveau numéro de file d'attente</td>
        </tr>

        <?php
        $numattente = $_GET['num_attente'];
            $req=$bdd->query('SELECT * FROM liste_attente');
            while($donnees = $req->fetch())
            {
                if($donnees['num_attente'] == $numattente)
                {
                    $req2=$bdd->query('SELECT * FROM attente');
                    while($donnees2=$req2->fetch())
                    {
                        if($donnees2['num_attente'] == $donnees['num_attente'])
                        {
                            $req3=$bdd->query('SELECT * FROM utilisateur');
                            while($donnees3=$req3->fetch())
                            {
                                if($donnees3['id_uti'] == $donnees2['id_uti'])
                                {
                                     echo'<tr>
                                            <td>'.$donnees['id_listattente'].'</td>
                                            <td>'.$donnees3['nom'].'  '.$donnees3['prenom'].'</td>
                                            <form method="post" action="post-modifier-place.php">
                                                <td><input type="number" name="placea" maxlength="2" value="'.$donnees['id_listattente'].'"/></td>
                                                <td><input type="number" name="placen" maxlength="2"/></td>
                                                <td><input type="submit" value="valider"></td>
                                            </form>
                                        </tr>';
                                }
                            }
                        }
                    }
                }
            }
            echo'</table>';
        ?>
    </body>
    <?php include("footer.php"); ?>
</html>