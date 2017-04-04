<?php
// Affiche des messages d'erreur sur linux
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once('defines/structure.php');
require_once(PATH_DEFINES . 'configuration.php');
require_once(PATH_LANGUES . PATH_FR . 'textes.php');

require_once(PATH_LIB . 'base.php');
$base = new base();
require_once(PATH_LIB . PATH_BDD . 'bdd.php');
require_once(PATH_VUE.'alert.php');

// Vérification que l'URL soit bien formée (avec un ?page=xxx)
if (isset($_GET['page'])) {
  if ($base->isAlpha($_GET['page']) != false) {
    if (is_file(PATH_CONTROLLER . $_GET['page'] . ".php")) {
      $page = $_GET['page'];
    } else {
      $page = "erreur";
    }
  } else {
    $page = "404";
  }
} else {
  $page = "index";
}

require_once(PATH_CONTROLLER . $page . '.php');

$base->__destruct();

?>
