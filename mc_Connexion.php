<?php
session_start();
include("connexion.php");
$cleUser =0;
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$nbSession = $_POST['nbSession'];
$specialite = $_POST['specialite'];
$sql6 = "SELECT * FROM utilisateur WHERE prenom = '" . $prenom . "' AND nom  = '" . $nom . "' AND nb_session  = '" . $nbSession . "'  AND fk_specialite  = '" . $specialite . "';";
$resultat = $bd->query($sql6)->fetch(PDO::FETCH_ASSOC);

if (is_null($resultat))  
    $cleUser = count($listeUsers) + 1;
  else 
    $cleUser = $resultat['pk_utilisateur'];

$_SESSION['cleUser'] =  $cleUser;
$_SESSION['specialite'] = intval($resultat['fk_specialite']);
header("Location:index.php");
?>
