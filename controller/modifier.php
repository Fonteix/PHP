<?php
// Vérification que l'utilisateur est connecté (avec vérification de l'URL)
if ($_SESSION['logged'] != true && !isset($_SESSION['user'])) {
    header('Location: index.php?page=index&&message=ACCES_REFUSED');
} else {
    require_once(PATH_MODELS . 'diaporama.php');
    require_once(PATH_VUE . 'header.php');
    require_once(PATH_VUE . 'modifier.php');
    require_once(PATH_VUE . 'footer.php');
}
?>
