<?php 
include 'bd.php';
session_start();
$cleUser = $_SESSION['cleUser'];
$sqlUtilisateur = "SELECT * FROM utilisateur where pk_utilisateur = '".intval($cleUser)."';";
$utilisateurActuel = $bd->query($sqlUtilisateur)->fetch();
if(isset($_POST['radio']))
{
    if($_POST['radio'] == 'post')
    {
        $specialite = 0;
        $typePub = 3;
    }
    if($_POST['radio'] == 'question')
    {
        $specialite = $_POST['specialite'];
        $typePub = 1;
    }
}
$sqlNbPub = "SELECT count(*) FROM publication;";
$nbPublicationsTotales = $bd->query($sqlNbPub)->fetch();
$nbPublicationsTotales = intval($nbPublicationsTotales[0]);
$nbPublicationsTotales += 1;
$requete = $bd->prepare('INSERT INTO publication (pk_publication,texte,fk_publication,fk_type_publication,fk_utilisateur,fk_specialite)
VALUES(:pk_publication, :texte, :fk_publication, :fk_type_publication , :fk_utilisateur, :fk_specialite)'); 
 $requete->execute(array(
	'pk_publication' => $nbPublicationsTotales,
	'texte' => $_POST['textePublication'],
    'fk_publication' => $_SESSION['clePub'],
    'fk_type_publication' => $typePub,
    'fk_utilisateur' => $utilisateurActuel['pk_utilisateur'],
    'fk_specialite'  =>  $specialite
    ));

header("Location: pageUtilisateur.php");
?>