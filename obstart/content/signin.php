<?php $titre="Inscription";

    if(isset($_POST["submit"])){
        extract($_POST);
        $mdp=sha1($mdp);
        $add_ip=$_SERVER['SERVER_ADDR'];
        $avatar=$_FILES['avatar'];
        $extension=pathInfo($avatar['name'], PATHINFO_EXTENSION);
        $requete=$bdd->prepare("INSERT INTO user(email,mdp,login,lvl,add_ip) VALUES(:email,:mdp,:login,1,:add_ip)");
        $id=$bdd->lastInsertId();
        $requete->bindValue(':login',$login,PDO::PARAM_STR);
        $requete->bindValue(':mdp',$mdp,PDO::PARAM_STR);
        $requete->bindValue(':email',$email,PDO::PARAM_STR);
        $requete->execute();
        $requete=$bdd->query("SELECT * FROM user WHERE add_ip='$add_ip'");
        $i=0;
        while($reponse=$requete->fetch()){$i+=1;}
        /*if ($i>=5){
            $bdd->query("UPDATE user SET banni=1 WHERE add_ip='$add_ip'");
        }*/
        if(in_array($extension,array('jpg','png','JPG','PNG','gif','GIF'))){
            $image_name=$id.".".$extension;
            move_uploaded_file($avatar["tmp_name"], "avatar/".$image_name);
            $bdd->query("UPDATE user SET avatar='$image_name' WHERE id_u=".$id);
        }
    }
?>


<form action="#" method="post" enctype="multipart/form-data">
    Pseudo : <input type="text" name="login"><br>
    Mdp : <input type="password" name="mdp"><br>
    Email : <input type="email" name="email"><br>
    Avatar : <input type="file" name="avatar"><br>
    <input type="submit" value="Envoyer" name="submit">
</form>
