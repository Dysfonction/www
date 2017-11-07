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

        <?php
        $placea = $_POST['placea'];
        $placen = $_POST['placen'];
        $null = 0;


        $req=$bdd->query('SELECT * FROM  liste_attente');
        while($donnees=$req->fetch())
        {
            if($donnees['id_listattente'] == $placen)
            {

                $req2=$bdd->prepare('UPDATE liste_attente SET id_listattente = :id_listattente WHERE id_listattente = :id_listattentee');
                $req2->execute(array(
                    'id_listattente'=>$null,
                    'id_listattentee'=>$placen));

                $req3=$bdd->prepare('UPDATE liste_attente SET id_listattente = :id_listattente WHERE id_listattente = :id_listattentee');
                $req3->execute(array(
                    'id_listattente'=>$placen,
                    'id_listattentee'=>$placea));

                $req4=$bdd->prepare('UPDATE liste_attente SET id_listattente = :id_listattente WHERE id_listattente = :id_listattentee');
                $req4->execute(array(
                    'id_listattente'=>$placea,
                    'id_listattentee'=>$null));
                echo '<br /><br/>';
                echo'Les places ont été modifier.<a href="reservation-encours.php">Consulter les réservations valides</a>';
            }
        }

        ?>
    </body>

    <?php include("footer.php"); ?>
</html>