<?php

    function authentification()
    {
        if(!isset($_SESSION['connecte']))
            header('Location:login.php');
    }
    
    function administrateur()
    {
        if((!isset($_SESSION['connecte'])) or $_SESSION['lvl']==1)   
        {
            header('Location:erreuradmin.php');
        }
    }

    function input($name, $type = 'text', $value='')
    {
        return $name." <input type='".$type."' name='".$name."' value='".$value."'><br>";
    }

    function submit($name, $value)
    {
        return "<input class='left' type='submit' name='".$name."' value='".$value."'>";
    }
    
?>