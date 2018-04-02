<?php
session_start();
include("bd.php");
$commentaire = $_POST['texteCommentaire'];
$clePub = $_POST['clePub'];
$specialite = intval($_SESSION['specialite']);
$cleUser = intval($_SESSION['cleUser']);
$sqlNbPub = "SELECT count(*) FROM publication;";
$nbPublicationsTotales = $bd->query($sqlNbPub)->fetch();
$nbPublicationsTotales = intval($nbPublicationsTotales[0]);
$nbPublicationsTotales += 1;
$requete = $bd->prepare('INSERT INTO publication (pk_publication,texte,fk_publication,fk_type_publication,fk_utilisateur,fk_specialite)
VALUES(:pk_publication, :texte, :fk_publication, :fk_type_publication , :fk_utilisateur, :fk_specialite)');
$requete->execute(array(
	'pk_publication' => $nbPublicationsTotales,
	'texte' => $commentaire,
    'fk_publication' => $clePub,
    'fk_type_publication' => 2,
    'fk_utilisateur' => $cleUser,
    'fk_specialite'  =>  $specialite
    ));
header("Location: index.php");
?>