<?php

    function authentification()
    {
        if(!isset($_SESSION['connecte']))
            header('Location:index.php');
    }
    function administrateur()
    {
        if(!isset($_SESSION['connecte']) || $_SESSION['lvl']!=3)
            header('Location:index.php');
    }

    function verification($name){
        if($name=="email"){
            if(!preg_match("#[a-z0-9_.-]+@[a-z0-9_.-]+\.[a-z]{2,6}#",$name))
        {
            echo "Email erronée (Pas de majuscules)<br>";
            
        }
    }
    }
?>