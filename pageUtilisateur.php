<?php
require 'connexion.php';
session_start();
if(isset($_SESSION['cleUser'])){
$cleUser = $_SESSION['cleUser'];
$sqlPageUser = "SELECT * FROM utilisateur where pk_utilisateur = '".intval($cleUser)."';";
$utilisateurActuel = $bd->query($sqlPageUser)->fetch();
$sqlPublicationsUser = "SELECT * FROM publication INNER JOIN utilisateur on publication.fk_utilisateur = utilisateur.pk_utilisateur WHERE publication.fk_utilisateur = '".$cleUser."';";
$publications = $bd->query($sqlPublicationsUser)->fetchAll();
$sqlSpecialite = "SELECT * FROM specialite where pk_specialite = '".$utilisateurActuel['fk_specialite']."';";
$resultatSpecialite = $bd->query($sqlSpecialite)->fetch();

?>
    <!DOCTYPE html>
    <html>
    <style>
        .connexion {
            display: none;
        }
    </style>

    <head>
        <meta charset="utf-8">
        <title>Page utilisateur</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116674960-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-116674960-1');
        </script>
        <!-- Google Code for Aller sur page personnelle Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 862205090;
var google_conversion_label = "MZNqCLzo238QoumQmwM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/862205090/?label=MZNqCLzo238QoumQmwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


    </head>

    <body class="fondEcran" style="background-color: rgb(242,242,242);">
        <div style="display:inline;">
            <a href="index.php">
                <i class="glyphicon glyphicon-home" style="font-size:60px;float:right;margin-top:20px;margin-right:80px;color:white;padding:8px 12px 8px 9px;"></i>
            </a>
            <p style="font-size:80px;text-align:center;background-color:#c2334a;padding-left:150px;color: white;">Page de
                <?php echo $utilisateurActuel['prenom']; ?>
                <?php echo $utilisateurActuel['nom']; ?>
            </p>
        </div>
        <div class="en-tête" style="width:100%; text-align:center;margin-bottom:200px; background-color: #c2334a;color:#FFFF;padding:10px;margin-top:-15px;">
            <hr/>
            <h3 style="text-align:center;"> Spécialité :
                <?php echo $resultatSpecialite['nom'] ?>
            </h3>
            <h3 style="text-align:center;"> Nombre de session:
                <?php echo $utilisateurActuel['nb_session']; ?>
            </h3>
        </div>
        <div class="newsfeed" style="width:100%; text-align:center;">Publications
        <?php
                foreach($publications as $publication){
                    if($publication['fk_type_publication'] != 2 && count($publications) >0)
                    {?>

            <div style="margin-left:410px;margin-top:20px; border: solid 3px black;background-color: lightgray; width:600px;">
                <p style="font-weight: bold;">

                    <?= $publication['texte'];?>
                </p>
            </div>
            <?php }} ?>
            <div class="publication" style="margin-top:40px; border:solid 1px #000;width:400px;margin-left:515px;background-color: lightgray;">
                <form method="post" action="mc_publierPublication.php">
                    <textarea class="texte" rows="10" style="width:350px;height:150px;margin-top:10px;resize:none;" name="textePublication"></textarea>
                    <br/>
                    <input type="radio" name="radio" value="post" id="post" checked> Post
                    <input type="radio" name="radio" value="question" id="question" style="margin-left:5px;">Question
                    <br/>

                    <div class="Question" style="display:none;">
                        <p>Veuillez entrer la spécialité selon le sujet votre question :</p>
                        <select name="specialite" style="width:175px;" required>
                            <br/>
                            <option value="1">HTML</option>
                            <option value="2">SQL</option>
                            <option value="3">COBOL</option>
                            <option value="4">PHP</option>
                            <option value="5">C#</option>
                        </select>
                    </div>
                    <button type="submit" style="margin-top:5px;">Publier</button>
                    <br/>
                </form>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>

    </body>
    <script>
        $(document).ready(function () {
            $('#question').click(function () {
                $('.Question').show();
                $('#post').prop('checked', false);
            });
            $('#post').click(function () {
                $('.Question').hide();
                $('#question').prop('checked', false);

            });
        });
    </script>

    </html>
    <?php
  }
  else
    require 'connexion.php';
?>
