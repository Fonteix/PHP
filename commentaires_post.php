<?php
//connexion à la base de donnée

try
{
  $bdd = new PDO('mysql:host=localhost;dbname=tpoc;charset=utf8', 'pepe', 'pepe');
}
catch(Exception $e)
{
  die('Erreur : '.$e->getMessage());
}


//insertion du message à l'aide d'une reqête prepare
$req = $bdd->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire) VALUES(?, ?, ?)');
$req->execute(array($_POST['id_billet'], $_POST['auteur'], $_POST['commentaire']));

//redirection du visiteur vers la page du minichat
header('Location: commentaires.php?billet='.$_POST['id_billet']);
?>
