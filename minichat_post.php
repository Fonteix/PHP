<?php
//connexion à la base de données
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=tpoc;charset=utf8', 'pepe', 'pepe');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}

//insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

//redirection du visiteur vers la page du minichat
header('Location: minichat.php');

?>
