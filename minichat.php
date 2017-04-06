<!DOCTYPE html>
<html>
<body>
  <form method="POST" action="minichat_post.php">
    <input type="text" name="pseudo" placeholder="id"/><br/>
    <input type="text" name="message" placeholder="Message"/><br/>
    <button type="submit" value="OK">envoyer</button>
  </form>

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

  //récupération des 10 derniers messages
  $reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0,10');

  //affichage de chaque message
  while($donnees = $reponse->fetch())
  {
     echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
  }

  $reponse->closeCursor(); //termine le traitement de la requete

  ?>

</body>
</html>
