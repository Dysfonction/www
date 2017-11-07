<?php 
    if(isset($_POST['submit']))
    {
        $complexite=$_POST['complexite'];
        $chaine = "ABCEDFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        for ($i=0;$i<$complexite;$i++)
            {
                $mdp .= $chaine[rand(0,25)]; // .= : Concaténation.
                $mdp .= $chaine[rand(26,51)]; // .= : Concaténation.
                $mdp .= $chaine[rand(52,61)]; // .= : Concaténation.
            }
        $mdp = str_shuffle($mdp);
        $requete = $bdd->query("SELECT * FROM user WHERE id_u = ".$_SESSION('id_u'));
        $reponse = $requete->fetch(); 
        mail('andydub1@gmail.com','creation de mdp','Voici votre nouveau mdp: '.$mdp);
        //var_dump($tab_mdp); // echo pour les tables
        $mdp=sha1($mdp)
        $requete=$bdd->query("UPDATE user SET mdp = '".$mdp."' WHERE id_u = ".$SESSION['id_u']);
    }
?>

<form action="" method="post">
    2MAJ 2min 2Chiffres<input type="radio" name="complexite" value="2" id="" checked><br>
    3MAJ 3min 3Chiffres<input type="radio" name="complexite" value="3" id=""><br>
    4MAJ 4min 4Chiffres<input type="radio" name="complexite" value="4" id=""><br>
    <input type="submit" value="generer" name="submit">
</form>