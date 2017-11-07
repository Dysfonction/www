
   <?php
    require "lib/functions.php";
    session_start();
    $bdd = dbConnect();

    $userip = $_SERVER['REMOTE_ADDR'];
    $limite = $bdd->query("SELECT * FROM ban WHERE ip = '$userip'");

    if($limite){
        $limite = $limite->fetch(PDO::FETCH_ASSOC)['limite'];
    }
    
    $isStillBanned = strtotime($limite) > strtotime(time() -60*5 );
    if($isStillBanned){
        unset($_SESSION['nbFailedAuth']);
        $bdd->query("DELETE FROM ban WHERE ip='$userip");
    }

    if(isset($_POST)){
        
        $login = htmlentities($_POST['login']);
        $password = sha1($_POST('password'));
        
        $pdo->prepare('SELECT COUNT(*) as nb FROM users WHERE login = ? AND password = ?');
        $pdo->execute([$login, $password]);
        $has = $bdd->fetch(PDO::FETCH_ASSOC)['nb'];
        if($has){
            header('Location: profil.php');
            die();
        }else{
            
            if(!isset($_SESSION['nbFailedAuth'])){
                $_SESSION['nbFailedAuth'] = 1;
            }else{
                $_SESSION['nbFailedAuth'] += 1;
            }
            
            if($_SESSION['nbFailedAuth'] > 3){
                $bdd->query("INSERT INTO ban (ip) VALUE ('$userip')");
                
            }
            
        }

	}

?>
   
<form action="#" method="">
    <?= input('Login :', 'text', 'username') ?>
    <?= input('Password :','password', 'password') ?>
    <?= select('Role :', ['Admin', 'Prof', 'Eleve']) ?>
    <?= checkbox('Se souvenir de moi ?', 'Remember') ?>
    <?= submit('submit', 'Se connecter') ?>
</form>