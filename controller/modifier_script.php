<?php
// Fonction pour afficher les erreurs
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connexion à la base de donnée
$bdd = new bdd ($MYSQL_host, $MYSQL_dbname, $MYSQL_user, $MYSQL_password);

// On vérifie la présence de tous les attributs
if (isset($_POST['ordre']) && isset($_POST['description']) && isset($_POST['titre']) && isset($_POST['id'])) {
  $ordre = $_POST['ordre'];
  $description = $_POST['description'];
  $titre = $_POST['titre'];
  $id = $_POST['id'];

  // Exécution du bouton modifier
  if ($_REQUEST['btn_submit'] == "modifier") {
    $bdd->modifier($id, $ordre, $titre, $description);
    header('Location: ?page=modifier&&message=MODIF_SUCCES');  //redirection

  // Exécution du bouton supprimer
  } else if ($_REQUEST['btn_submit'] == "supprimer") {
    $bdd->supprimer($id);
    header('Location: ?page=modifier&&message=IMG_DEL');
  }

// Exécution du bouton ajouter
} else if ($_REQUEST['btn_submit'] == "ajouter") {
  // Pour éviter un renommage ou la gestion de fichiers déjà présents, on va donner un nom aléatoire au fichier
  $max = 20;
  $character_list = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  $i = 0;
  $name = "";
  while ($i < $max) {
    $name .= $character_list{mt_rand(0, (strlen($character_list) - 1))};
    $i++;
  }

  // Vérification de l'extension & de la taille du fichier
  $filename = $_FILES["file"]["name"];
  $file_basename = substr($filename, 0, strripos($filename, '.'));
  $file_ext = substr($filename, strripos($filename, '.'));
  $filesize = $_FILES["file"]["size"];
  $allowed_file_types = array('.png', '.jpg', '.gif', '.jpeg');

  if (in_array($file_ext, $allowed_file_types) && ($filesize < 999999999999999999999999999999999999)) {
    $newfilename = $name . $file_ext;
    if (file_exists(PATH_IMAGES . $newfilename)) {
      header('Location: ?page=modifier&&message=ALREADY_EXIST');
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $newfilename);  // Upload
      $bdd->ajouter($newfilename);  // Upload en base de donnée
      header('Location: ?page=modifier&&message=UPLOAD_SUCCES');
    }
  } elseif (empty($file_basename)) {  // Si il n'y a pas de fichier
    header('Location: ?page=modifier&&message=NO_FILE');
  } elseif ($filesize > 999999999999999999999) { // Si le fichier est trop volumineux
    header('Location: ?page=modifier&&message=TOO_LARGE_SIZE');
  } else {  // Si l'extension du fichier est incorrecte
    unlink($_FILES["file"]["tmp_name"]);
    header('Location: ?page=modifier&&message=ALLOWED_FILES');
  }
} else {
  header('Location: ?page=modifier&&message=ERROR');
}
?>
