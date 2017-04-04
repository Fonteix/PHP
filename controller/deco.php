<?php
// Script de déconnection
session_start();
$_SESSION = array();
session_destroy();
header('Location: ?page=index&&message=DECONNECTE');
exit();
?>
