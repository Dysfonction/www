<?php
    include "includes/header.php";
    
    if(isset($_POST['submit'])){ //isset teste l existence d une variable

        $email = $_POST['Email'];
        $mdp = sha1($_POST['Mdp']);
        
        $requete = $bdd->query("SELECT * FROM user WHERE email='$email' AND mdp='$mdp'");
        
        if ($reponse = $requete->fetch())
        {
            echo "Vous etes connecte";
            $_SESSION['id_u'] = $reponse['id_u'];
            $_SESSION['lvl'] = $reponse['lvl'];
            $_SESSION['connecte'] = true;
            $_SESSION['nom']=$reponse['nom'];
            header("Location:index.php"); //Redirection
        }
        else
        {
            echo "Mauvais identifiant";
        }
    }
?>

<div class="centrale">
    <section class="roundlogin">
        <form action="#" method="post">
            <?php   
                echo input('Email','email');
                echo input('Mdp','password');
                echo submit('submit','Se connecter');
            ?>
            <a href="signin.php">S'inscrire</a>
        </form>
    </section>
</div>

<?php
    include "includes/footer.php";
?>