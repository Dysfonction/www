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
     if($_SESSION['nom'] == 'shao' && $_SESSION['prenom'] == 'christophe')
        {
        ?>
        <h2> Reservation en cours </h2>
        <table>
            <tr>
                <td>Numero de la place</td>
                <td>Nom - Prenom</td>
            </tr>
        <?php
            $req11 ='SELECT * FROM ATTENTE ORDER BY num_place ASC';
            $req22 ='SELECT * FROM UTILISATEUR';
            
            $req = $bdd->query($req11);
            while($donnees = $req->fetch())
            {
                if($donnees['statut'] == 1)
                {
                    $req2 = $bdd->query($req22);
                    while($donnees2 = $req2->fetch())
                    {
                        if($donnees2['id_uti'] == $donnees['id_uti'])
                        {
                            echo'<tr>
                                    <td>'.$donnees['num_place'].'</td>
                                    <td>'.$donnees2['nom'].'  '.$donnees2['prenom'].'</td>
                                    <td><a href = "liberer-place.php?num_place='.$donnees['num_place'].'&num_attente='.$donnees['num_attente'].'">Liberer</a></td>
                                </tr>';
                        }
                    }
                }
            }
        ?>
        </table>
        <br/>
        <table>
        <h2> Reservation en attente </h2>
        <tr>
            <td>Numero d'attente</td>
            <td>Nom - Prenom</td>
        </tr>

        <?php
            $req3 = $bdd->query('SELECT * FROM LISTE_ATTENTE ORDER BY id_listattente ASC');
            while($donnees3 = $req3->fetch())
            {
                $req=$bdd->query($req11);
                while($donnees = $req->fetch())
                {
                    if($donnees3['num_attente'] == $donnees['num_attente'])
                    {
                        $req2 = $bdd->query($req22);
                        while($donnees2 =$req2->fetch())
                        {
                            if($donnees['id_uti'] == $donnees2['id_uti'])
                            {
                                echo'<tr>
                                        <td>'.$donnees3['id_listattente'].'</td>
                                        <td>'.$donnees2['nom'].'  '.$donnees2['prenom'].'</td>
                                        <td><a href = "modifier-place.php?num_attente='.$donnees['num_attente'].'">Modifier</a></td>
                                     </tr>';
                            }
                        }
                    }
                }
            }
            echo'</table>';
            ?>
        <br />
        <table>
        <h2> Historique des réservation </h2>
        <tr>
            <td>Numero de réservation</td>
            <td>Nom - Prenom</td>
            <td>Date de début</td>
            <td>Date de fin</td>
            <td>Numéro de place occupé</td>
        </tr>
        <?php
            $req=$bdd->query($req11);
            while($donnees = $req->fetch())
            {
                if($donnees['statut'] == 3)
                {
                    $req2=$bdd->query($req22);
                    while($donnees2=$req2->fetch())
                    {
                        if($donnees['id_uti'] == $donnees2['id_uti'])
                        {
                                echo'<tr>
                                        <td>'.$donnees['num_attente'].'</td>
                                        <td>'.$donnees2['nom'].'  '.$donnees2['prenom'].'</td>
                                        <td>'.$donnees['dateDebut'].'</td>
                                        <td>'.$donnees['dateFin'].'</td>
                                        <td>'.$donnees['num_place'].'</td>
                                     </tr>';
                        }
                    }
                }
            }
            echo'</table>';
        }
        else
        {
            $id_uti = $_SESSION['id_uti'];

        echo'<h2> Reservation en cours </h2>
        <table>
            <tr>
                <td>Numero de la place</td>
                <td>Numéro de réservation</td>
            </tr>';

            $req11 ='SELECT * FROM ATTENTE ORDER BY num_place ASC';
            $req22 ='SELECT * FROM UTILISATEUR';
            
            $req = $bdd->query($req11);
            while($donnees = $req->fetch())
            {
                if($donnees['statut'] == 1 && $donnees['id_uti'] == $id_uti)
                {
                    echo'<tr>
                            <td>'.$donnees['num_place'].'</td>
                            <td>'.$donnees['num_attente'].'</td>
                        </tr>';

                }
            }
        ?>
        </table>
        <table>
        <h2> Reservation en attente </h2>
        <tr>
            <td>Numero d'attente</td>
            <td>Numéro de réservation</td>
        </tr>

        <?php
            $req3 = $bdd->query('SELECT * FROM LISTE_ATTENTE ORDER BY id_listattente ASC');
            while($donnees3 = $req3->fetch())
            {
                $req=$bdd->query($req11);
                while($donnees = $req->fetch())
                {
                    if($donnees3['num_attente'] == $donnees['num_attente'] && $donnees['id_uti'] == $id_uti)
                    {
                        echo'<tr>
                                <td>'.$donnees3['id_listattente'].'</td>
                                <td>'.$donnees['num_attente'].'</td>
                            </tr>';

                    }
                }
            }
            echo'</table>';
            ?>
        <table>
        <h2> Historique des réservation </h2>
        <tr>
            <td>Numero de réservation</td>
            <td>Date de début</td>
            <td>Date de fin</td>
            <td>Numéro de place occupé</td>
        </tr>
        <?php
            $req=$bdd->query($req11);
            while($donnees = $req->fetch())
            {
                if($donnees['statut'] == 3)
                {
                    $req2=$bdd->query($req22);
                    while($donnees2=$req2->fetch())
                    {
                        if($donnees['id_uti'] == $donnees2['id_uti'] && $donnees['id_uti'] == $id_uti)
                        {
                                echo'<tr>
                                        <td>'.$donnees['num_attente'].'</td>
                                        <td>'.$donnees['dateDebut'].'</td>
                                        <td>'.$donnees['dateFin'].'</td>
                                        <td>'.$donnees['num_place'].'</td>
                                     </tr>';
                        }
                    }
                }
            }
            echo'</table>';
            
        }
        ?>
    </body>

    <?php include("footer.php"); ?>
</html>