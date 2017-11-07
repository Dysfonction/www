<?php
    session_start();
    include "lib/functions.php";
    try
    {
        $bdd= new PDO("mysql:host=localhost;dbname=forum","root","");
    }
    catch(Exception $e)
    {
        die("Erreur de connection à la bdd.");
    }
    if(!isset($_GET['p']))
        $page='accueil';
    else
    {
        if(!file_exists("contenu/".$_GET['p'].".php"))
        {
            $page = "404";
        }
        else
            $page=$_GET['p'];
    }
    ob_start();
        require "contenu/".$page.".php";
        $content=ob_get_contents();
    ob_end_clean();
    require "layout.php";
?>