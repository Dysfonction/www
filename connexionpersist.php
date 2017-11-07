<?php
    if(!empty($_POST)){
        $user = $bdd->prepare("SELECT id,username,password FROM membres WHERE username=:login AND password=:mdp");
        $user->bindValue(':login',$_POST['login'],PDO::PARAM_STR);
        $user->bindValue(':mdp',$_POST['mdp'],PDO::PARAM_STR);
        $user->execute();
        $donnee = $user->fetch();
        
        
        if(isset($_POST['remember'])){
          setcookie ('auth',$donnee['id'].'-----'.sha1($donnee['username'].$donnee['password'].$_SERVER['REMOTE_ADDR']),time()+(3600*24*3),'/','localhost',false,true);
            //le dernier argument evite que le cookie soit editable en javascript
        }
        
        if($donnee)
            $_SESSION['auth'] = $donnee;
    }

    if(isset($_COOKIE['auth']) && !isset($_SESSION['auth'])){
        $auth = $_COOKIE['auth'];
        $auth = explode('-----',$auth);
        $user = $bdd->prepare("SELECT * FROM membres WHERE id=:id");
        $user->bindValue(':id',$auth[0],PDO::PARAM_INT);
        $user->execute();
        $donnee = $user->fetch();
        $key = sha1($donnee['username'].$donnee['password'].$_SERVER['REMOTE_ADDR']);
        if($key == $auth[1]){
            $_SESSION['auth'] = $donnee;
            setcookie ('auth',$donnee['id'].'-----'.$key,time()+(3600*24*3),'/','localhost',false,true);
        }
        else{
            setcookie('auth','',time()-3600,'/','localhost',false,true);
            //A mettre aussi sur la page de deconnexion
        }
    }

?>
   

   
   
   
   
   
   
   
   
   
   
   
   <html>
    <body>
       <form method="post" action ="#">
            Login:<input type="text" name="login"><br>
            MDP:<input type="password" name="mdp"><br>
            Se souvenir de moi<input type="checkbox" name ="remember"><br>
            <input type="submit" value="valider">
            <input type="reset" value="RAZ">
        </form>
    </body>
</html>