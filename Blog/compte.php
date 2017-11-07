<?php
    include "includes/header.php";
    
    if(isset($_POST['submit']))
    {
        $email = $_POST['Email'];
        $mdp = sha1($_POST['Mdp']);
        
        $requete = $bdd->query("UPDATE user SET email = '$email', mdp = '$mdp' WHERE id_u = ".$_SESSION['id_u']);
    }
    $requete = $bdd->query("SELECT * FROM user WHERE id_u = ".$_SESSION['id_u']);
    $reponse = $requete->fetch();

?>
<div class="centrale">
    <section class="roundsignin">
        <form action="#" method="post">
            <?php   
                echo input('Email','email',$reponse['email']);
                if(isset($_POST['submit']))
                {
                    echo "<p class=\"polwhite\">Compte modifié avec succès<br></p>";
                }
                echo input('Mdp','password');
                echo submit('submit','Modifier');
            ?>
            <a href="delete.php">Voulez-vous supprimer votre compte ?</a>
        </form>
    </section>
</div>

<?php
    include "includes/footer.php";
?>