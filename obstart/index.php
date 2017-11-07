<?php
    include "lib/functions.php";
	session_start();
	dbConnect("portfolio");

	define ('BASE_URL',dirname($_SERVER['SCRIPT_NAME']));
    
    
    if(!isset($_GET['p']) || $_GET['p']=="")
        $_GET['p']='accueil';
    else
    {
        if(!file_exists("content/".$_GET['p'].".php"))
            $_GET['p'] = "404";
    }
    ob_start();
        require "content/".$_GET['p'].".php";
        $content=ob_get_contents();
    ob_end_clean();
    require "layout.php";
?>
