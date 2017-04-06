<?php
try
{
  $this->bdd=new PDO('mysql: host ='.$MYSQL_host.'; dbname='. $MYSQL_dbname, $MYSQL_user, $MYSQL_password); //on crée un objet dans la classe bdd
  $this->bdd->exec('SET NAMES utf8');
  $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // '::' Avoir acces a un attribut statique de la classe
}
catch (Exception $e)
{
  die ('Erreur : '.$e->getMessage());
}

//ou
/*
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=PHP;charset=utf8', 'pepe', 'pepe');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
*/
