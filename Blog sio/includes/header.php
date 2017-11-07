<?php session_start(); 
    include "functions.php";

    try
    {
        $bdd= new PDO("mysql:host=localhost;dbname=blog sio","root","");
    }
    catch(Exception $e)
    {
        die("Erreur de connection à la bdd.");
    }
?>
    <html>
    <header>
    
        <meta charset="utf-8">
        <title>SK Telecom T1</title>
        <link rel="stylesheet" href="style.css">
    
    </header>

    <body>
        <div class="bgwhiteh">
        <div class="centrale"> <img class="logo" src="img/logo.jpg" alt="logo">
            <h1 class="titre-site">SK Telecom T1</h1>
            <div class="clear"></div>
            <nav>
                <ul>
                    <li><a href="index.php">Acceuil</a></li>
                    <?php
                    if(isset($_SESSION['connecte']))
                    {
                        echo '<li><a href="compte.php">Mon compte</a></li>';
                        if ($_SESSION['lvl']==1){
                        echo '<li><a href="delete.php">Supprimer Compte</a></li>';}
                        if ($_SESSION['lvl']>=2){
                        echo '<li><a href="deletemember.php">Gérer membres</a></li>';}
                        echo '<li><a href="logout.php">Se déconnecter</a></li>';
                    }
                    else
                    {
                        echo '<li><a href="signin.php">Inscription</a></li>';
                        echo '<li><a href="login.php">Se connecter</a></li>';
                    }
                ?>
                </ul>
            </nav>
        </div>
        </div>