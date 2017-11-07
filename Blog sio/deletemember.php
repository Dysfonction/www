<?php include "includes/header.php"; 
administrateur();
$lvl=$_SESSION['lvl'];
if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $requete=$bdd->query("DELETE FROM user WHERE email='$email'");
    }
if(isset($_POST['modo'])){
    $email=$_POST['email'];
    $requete=$bdd->query("UPDATE user SET lvl='2' WHERE email='$email'");
}
$requete2=$bdd->query("SELECT * FROM user WHERE lvl<'$lvl'");
?>
<section>
    <h2>Sélectionnez l'email du compte à supprimer :</h2>
    <form action="#" method="post">
        <select name="email" size="1">
        <?php while($reponse=$requete2->fetch()){
        echo "<option>".$reponse['email']."</option>";
        }?>
        </select>
        <input type="submit" name="submit" value="Supprimer">
        <?php if ($lvl==3){
        echo "<input type='submit' name='modo' value='Promouvoir Modérateur'>";
        }
        if(isset($_POST['submit'])){ echo "Compte supprimé avec succès"; }
        if(isset($_POST['modo'])){ echo "Compte promu Modérateur"; }?>
    </form>
</section>
<?php include "includes/footer.php"; ?>