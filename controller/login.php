<?php
// Vérification des identifants avec la méthode hash
// Si la vérification est validée on créé une session, sinon on redirige l'utilisateur vers une page d'erreur
if ($_POST['login'] == LOGIN && hash('sha512', $_POST['password']) == PASSWORD) {
    session_start();
    $_SESSION['logged'] = true;
    $_SESSION['user'] = $_POST['login'];
    header('Location: ?page=modifier&&message=CONNECTE');
} else {
    header('Location: ?page=404&&message=PASSWORD_INVALIDE');
}
?>
