<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title><?php echo $titre;?></title>
</head>
<body>
   <div class="centrale">
    <nav>
        <ul>
            <li><a href="index.php?p=accueil">Accueil</a></li>
            <li><a href='index.php?p=membre'>Membres</a></li>
            <?php if(isset($_SESSION['connecte'])){
                echo "<li><a href='index.php?p=profil'>Profil</a></li>";
                echo "<li><a href='index.php?p=logout'>Deconnexion</a></li>";}
            if(!isset($_SESSION['connecte'])){
                echo "<li><a href='index.php?p=signin'>S'enregistrer</a></li>";
                echo "<li><a href='index.php?p=login'>Connexion</a></li>";}
            if(isset($_SESSION['connecte']) && $_SESSION['lvl']==3){
                echo "<li><a href='index.php?p=admin'>Admin</a></li>";
            }?>
        </ul>
    </nav>
    <?php echo $content;?>
    <footer>
    <br>
    <br>
    <br>
    Pied de page
    </footer>
    </div>
</body>
</html>