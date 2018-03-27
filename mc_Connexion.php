<?php
session_start();
include("connexion.php");
$cleUser =0;
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$sql6 = "SELECT * FROM utilisateur WHERE nom  = '" . $nom . "';";
$resultat = $bd->query($sql6)->fetch(PDO::FETCH_ASSOC);

if (is_null($resultat))  
    $cleUser = count($listeUsers) + 1;
  else 
    $cleUser = $resultat['pk_utilisateur'];

$_SESSION['cleUser'] =  $cleUser;
header("Location:index.php");
?>
