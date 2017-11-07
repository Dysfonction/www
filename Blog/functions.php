<?php

    function authentification()
    {
        if(!isset($_SESSION['connecte']))
            header('Location:login.php');
    }

    function input($name, $type = 'text', $value='')
    {
        return " <input type='".$type."' name='".$name."' value='".$value."'><br>";
    }

    function submit($name, $value)
    {
        return "<input type='submit' name='".$name."' value='".$value."'>";
    }
    
?>