<?php $titre="Profil";
    authentification();
    $id_u=$_SESSION['id_u'];
    if(isset($_POST["submit"]))
    {
        extract($_POST);
        if(isset($_POST['deleteimg'])){
            $bdd->query("UPDATE user SET avatar='' WHERE id_u=".$_SESSION['id_u']);
            unlink("avatar/$avatar");
        }
        $requete=$bdd->prepare("UPDATE user SET email=:email, login=:login, description=:description WHERE id_u=".$_SESSION['id_u']);
        $requete->bindValue(':login',$login,PDO::PARAM_STR);
        $requete->bindValue(':description',$description,PDO::PARAM_STR);
        $requete->bindValue(':email',$email,PDO::PARAM_STR);
        $requete->execute();
    }
    if(isset($_SESSION['connecte'])){
        $requete=$bdd->query("SELECT * FROM user WHERE id_u='$id_u'");
        $reponse=$requete->fetch();
        $loginc=$reponse["login"];
        $emailc=$reponse["email"];
        $descriptionc=$reponse["description"];
        $avatar=$reponse["avatar"];
    }
?>
<form action="#" method="post">
<?php
echo "Pseudo : <input type='text' name='login' value='$loginc'><br>
Email : <input type='email' name='email' value='$emailc'><br>
Description : <textarea name='description' id='description' >$descriptionc</textarea>
Supprimer avatar : <input type='checkbox' name='deleteimg'><br>
<input type='submit' value='Changer' name='submit' value=1>";
?>
</form>


<script src="http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>CKEDITOR.replace("description");</script>