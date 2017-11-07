<?php $titre="Membres";
    if(isset($_SESSION['connecte'])){$lvl=$_SESSION['lvl'];}
    if(isset($_POST['submit'])){
        $login=$_POST['login'];
        header("Location:index.php?p=profilmembre&login=$login");
        }
    if(isset($_POST['ban'])){
        $login=$_POST['login'];
        $bdd->query("UPDATE user SET banni=1 WHERE login='$login'");
    }
    if(isset($_POST['supprimer'])){
        $login=$_POST['login'];
        $bdd->query("DELETE FROM user WHERE login='$login'");
    }
    if(isset($_SESSION['connecte']) && $lvl<3){
    $requete2=$bdd->query("SELECT * FROM user WHERE lvl=1 AND banni=0");}
    else{$requete2=$bdd->query("SELECT * FROM user WHERE lvl=1");}
?>
    <form action="#" method="post">
        <select name="login" size="1">
            <?php while($reponse=$requete2->fetch()){
    echo "<option>".$reponse['login']."</option>";
    }?>
        </select>
        <input type='submit' name='submit' value='Voir profil du membre'>
        <?php if(isset($_SESSION['connecte'])){
        if($lvl>1){
    echo "<input type='submit' name='ban' value='Bannir'>";}}
        if(isset($_SESSION['connecte'])){
        if($lvl>2){
    echo "<input type='submit' name='supprimer' value='Supprimer'>";}}
    if(isset($_POST['ban'])){echo "Compte banni avec succès"; }
    if(isset($_POST['supprimer'])){echo "Compte supprimé avec succès"; }?>
    </form>