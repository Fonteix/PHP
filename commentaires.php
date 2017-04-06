<!DOCTYPE html>
<html>
<body>
  <h1>Mon site</h1>
  <!--bouton retour-->
  <a href="indexTP.php">Retour</a></br>

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

  //----------------------------------------------------------------------------------

  //recuperation de l'ID du commentaire
  $IDcom = $bdd->prepare('SELECT id FROM billets WHERE id=?');
  $IDcom->execute(array($_GET['billet']));
  $donnees = $IDcom->fetch()
  //inputs pour ecrire un commentaire
  ?>
  <form method="POST" action="commentaires_post.php">
    <input type="text" name="id_billet" value="<?php echo $donnees ['id']; ?>"><br/> <!--on recupere l'ID du commentaire pour l'enovyer dans la base de donnée avec le formulaire -->
    <input type="text" name="auteur" placeholder="Nom"/><br/>
    <input type="text" name="commentaire" placeholder="Commentaire"/><br/>
    <button type="submit" value="OK">Envoyer</button>
  </form><?php

  //----------------------------------------------------------------------------------

  //récupération des topics en fonction de ce que nous donne l'url ($_GET)
  $topic = $bdd->prepare('SELECT id, titre, contenu, date_creation FROM billets WHERE id=?');
  $topic->execute(array($_GET['billet']));
  //affichage des données des topics
  while($donnees = $topic->fetch())
  {
    echo htmlspecialchars($donnees['id']) . '<br/>' . htmlspecialchars($donnees['titre']) . '<br/>' . htmlspecialchars($donnees['contenu']) . '<br/>' . htmlspecialchars($donnees['date_creation']) . '<br/>';
    echo '<br/>' . '<br/>';
  }
  $topic->closeCursor();  //libération du curseur (pour les prochaines requetes)

  //----------------------------------------------------------------------------------

  ?><h2>Commentaires</h2><?php

  //récupération des commentaires à partir de l'id du topic dans l'url (prepare)
  $com = $bdd->prepare('SELECT id, id_billet, auteur, commentaire FROM commentaires WHERE id_billet = ?');
  $com->execute(array($_GET['billet']));
  //affichage des données des commentaires
  while($donnees = $com->fetch())
  {
    echo htmlspecialchars($donnees['id']) . '<br/>' . htmlspecialchars($donnees['id_billet']) . '<br/>' . htmlspecialchars($donnees['auteur']) . '<br/>' . htmlspecialchars($donnees['commentaire']) . '<br/>';
    echo '<br/>' . '<br/>';
  }


  $com->closeCursor();  //libération du curseur (pour les prochaines requetes)
  ?>
</body>
</html>
