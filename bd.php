<?php
  $dbName = 'aledono_TP474';
  $usernameBD = 'aledono';
  $passwordBD = 'alexandre';
  try
  {
    $bd = new PDO('mysql:host=206.167.23.182;dbname='. $dbName, $usernameBD, $passwordBD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOexception $e)
  {
    echo 'Erreur SQL : ' . $e->getMessage() . '<br />';
  }

?>
