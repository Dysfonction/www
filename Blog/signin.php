<?php
    include "includes/header.php";
    
    if(isset($_POST['submit']))
    {
        $email = $_POST['Email'];
        $mdp = sha1($_POST['Mdp']);
        
        $requete = $bdd->query("INSERT INTO user(email,mdp,lvl) VALUES('$email','$mdp',1)");
    }
    
?>
<div class="centrale">
    <section class="roundsignin">
        <form action="#" method="post">
            <?php   
                echo input('Email','email');
                if(isset($_POST['submit']))
                {
                    echo "<p class=\"polwhite\">Compte créé<br></p>";
                }
                echo input('Mdp','password');
                echo submit('submit','Inscription');
            ?>
        </form>
    </section>
</div>

<?php
    include "includes/footer.php";
?>