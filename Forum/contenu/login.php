<?php 
    $titre="Se connecter" ;
    
    if(isset($_POST['submit'])){
        extract($_POST);
        $mdp=sha1($mdp);
        $requete=$bdd->prepare("SELECT * FROM user WHERE login=:pseudo AND mdp=:mdp");
        $requete->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
        $requete->bindValue(':mdp',$mdp,PDO::PARAM_STR);
        $requete->execute();
        
        if($reponse=$requete->fetch()){
            if($reponse['banni']==0){
                $_SESSION['id_u']=$reponse['id_u'];
                $_SESSION['pseudo']=$reponse['login'];
                $_SESSION['lvl']=$reponse['lvl'];
                $_SESSION['connecte']=true;
                $_SESSION['login']=$reponse['avatar'];
                $bdd->query("UPDATE user SET derniere_co=NOW(), connecte=1 WHERE id_u=".$reponse['id_u']);
                header("Location:index.php");}
            else{
                echo "Vous êtes banni jusqu'à nouvel ordre.";
            }
        }
        else{
            echo "Identifiant incorrect";
        }
    }


?>
<form class="descendre" action="index.php?p=login" method="POST">
    Pseudo : <input type="text" name="pseudo"><br>
    Mdp : <input type="password" name="mdp"><br>
    <input type="submit" name = "submit" value="Se connecter">
</form>