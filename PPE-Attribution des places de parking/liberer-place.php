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
        <h2> Reservation en cours </h2>
        <?php

        $statut = 3;
        $numattente = $_GET['num_attente'];

        $req=$bdd->prepare('UPDATE attente SET statut = :statut WHERE num_attente = :num_attente');
        $req->execute(array(
        	'statut'=>$statut,
        	'num_attente'=>$numattente));

        $statut2 = 1;
        $numplace = $_GET['num_place'];

        $req2=$bdd->query('SELECT * FROM liste_attente');
        while($donnees2 = $req2->fetch())
        {
            if($donnees2['id_listattente'] == 1)
            {
                $req3=$bdd->prepare('UPDATE attente SET statut = :statut, num_place = :num_place WHERE num_attente = :num_attente');
                $req3->execute(array(
                    'statut'=>$statut2,
                    'num_place'=>$numplace,
                    'num_attente'=>$donnees2['num_attente']));

                $req4=$bdd->prepare('DELETE FROM liste_attente WHERE num_attente = :num_attente');
                $req4->execute(array(
                    'num_attente'=>$donnees2['num_attente']));
            }
        }

        $compteur=1;

        $req5=$bdd->query('SELECT * FROM liste_attente ORDER BY id_listattente ASC');
        while($donnees5=$req5->fetch())
        {
            if(isset($donnees5['id_listattente']))
            {
                $req6=$bdd->prepare('UPDATE liste_attente SET id_listattente = :id_listattente WHERE id_listattente= :id_listattentee');
                $req6->execute(array(
                    'id_listattentee'=>$donnees5['id_listattente'],
                    'id_listattente'=>$compteur));
                $compteur++;
            }
        } 


        echo'La place a été libérer';
        
        ?>
        </table>
    </body>

    <?php include("footer.php"); ?>
</html>