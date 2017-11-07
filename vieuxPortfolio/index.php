<?php
    define ('BASE_URL',dirname($_SERVER['SCRIPT_NAME']));
    session_start();
    try
    {
        $bdd= new PDO("mysql:host=localhost;dbname=Portfolio","root","");
    }
    catch(Exception $e)
    {
        die("Erreur de connection à la bdd.");
    }
    if(!isset($_GET['p']) || $_GET['p']=="")
        $_GET['p']='accueil';
    else
    {
        if(!file_exists("contenu/".$_GET['p'].".php"))
            $_GET['p'] = "404";
    }
    ob_start();
        require "contenu/".$_GET['p'].".php";
        $content=ob_get_contents();
    ob_end_clean();
    require "layout.php";
?>
