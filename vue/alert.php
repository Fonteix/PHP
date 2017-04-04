<?php

function alert($classeAlert, $messageAlert)
{
    ?>
    <div class="alert alert-<?php echo $classeAlert; ?>">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong><?php echo $messageAlert; ?></strong>
    </div>
    <?php
}

// Affichage d'un message adapté à l'URL
if (isset($_GET['message'])) {
    $message = $_GET['message'];
    switch ($message) {
        case "URL_INVALIDE":
            alert('danger', MESSAGE_URL_INVALIDE);
            break;
        case "CONNECTE":
            if ($_SESSION['logged'] == true) alert('success', MESSAGE_CONNECTE);
            break;
        case "DECONNECTE":
            if (!isset($_SESSION['logged'])) alert('success', MESSAGE_DECONNECTE);
            break;
        case "PAS_CONNECTE":
            alert('danger', MESSAGE_PAS_CONNECTE);
            break;
        case "PASSWORD_INVALIDE":
            alert('danger', MESSAGE_PASSWORD_INVALIDE);
            break;
        case "ACCES_REFUSED":
            alert('danger', ACCES_REFUSER);
            break;
        case "ALREADY_EXIST":
            alert('danger', ALREADY_FILE);
            break;
        case "UPLOAD_SUCCES":
            alert('success', UPLOAD_SUCCES);
            break;
        case "NO_FILE":
            alert('danger', NO_FILE);
            break;
        case "TOO_LARGE_SIZE":
            alert('danger', TOO_LARGE_SIZE);
            break;
        case "ALLOWED_FILES":
            alert('danger', ALLOWED_FILES);
            break;
        case "ERROR":
            alert('danger', ERROR);
            break;
        case "MODIF_SUCCES":
            alert('success', MODIF_SUCCES);
            break;
        case "IMG_DEL":
            alert('success', IMG_DEL);
            break;
        default :
    }
}
?>
