<?php
   try
    {
        $bdd= new PDO("mysql:host=localhost;dbname=blog","root","");
        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); 
    }
    catch(Exception $e)
    {
        die("Erreur de connection à la bdd.");
    }


    $req = $bdd->prepare("SELECT id_a AS ID,titre FROM article");
    $req->execute();
    $data = $req->fetchAll();

    require("functions.php");
    export($data,"Export tutoriel");