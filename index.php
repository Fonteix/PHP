<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

    //Importation des fichiers de configuration
    require_once('defines/structure.php');
    //On importe defines, afin de pouvoir utiliser les constantes que l'on a définit auparavant
    require_once(PATH_DEFINES.'configuration.php');
    require_once(PATH_LANGUES.PATH_FR.'textes.php');

    ///// Char verification /////
    function isAlpha($string)
    {
        if(isset($string) && $string!='' && is_string($string) && !preg_match('/[\W]+/', $string)==1)
        {
            return clean($string);
        }
        return false;
    }

    ///// Sanitize string /////
    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    if(isset($_GET['page']))
    {
        if (isAlpha($_GET['page'])!=false)
        {
            if(is_file(PATH_CONTROLLER.$_GET['page'].".php"))
            {
                $page = $_GET['page'];
            }
            else
            {
                $page = "erreur";
            }
        }
        else
        {
            $page = "404";
        }
    }
    else
    {
        $page = "index";
    }
    require_once(PATH_CONTROLLER.$page.'.php');
?>
