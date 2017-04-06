<!DOCTYPE html>
<html>
<body>
  <h1>Mon site</h1></br></br>

  <?php
  //connexion à la base de donnée-----------------------------------------------
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=tpoc;charset=utf8', 'pepe', 'pepe');
  }
  catch(Exception $e)
  {
    die('Erreur : '.$e->getMessage());
  }
  //connexion à la base de donnée-----------------------------------------------

  //récupération des 10 derniers topics
  $topic = $bdd->query('SELECT id, titre, contenu, date_creation FROM billets');


  while($donnees = $topic->fetch())
  {
    echo htmlspecialchars($donnees['id']) . '<br/>' . htmlspecialchars($donnees['titre']) . '<br/>' . htmlspecialchars($donnees['contenu']) . '<br/>' . htmlspecialchars($donnees['date_creation']) . '<br/>';
    ?><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a><?php
    echo '<br/>' . '<br/>';
  }

  //fermeture SQL
  $topic->closeCursor();
  ?>
</body>
</html>
