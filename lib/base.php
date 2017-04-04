<?php

class base
{
    // Constructeur
    function __construct()
    {
        session_name('p1502280');
        session_start();
    }

    // Destructeur
    public function __destruct() {}

    // Fonction qui va supprimer tous les espaces vides & les caractères spéciaux
    private function clean($string)
    {
        $string = str_replace(' ', '-', $string);
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }

    public static function isAlpha($string)
    {
        if (isset($string) && $string != '' && is_string($string) && !preg_match('/[\W]+/', $string) == 1) {
            return htmlspecialchars($string);
        }
        return false;
    }
}
?>
