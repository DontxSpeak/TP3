<?php
require 'connexion.php';
session_start();
if(isset($_SESSION['cleUser'])){
$sql4= "SELECT SUM(valeur) as val FROM vote v
INNER JOIN publication p ON v.fk_publication = p.pk_publication
INNER JOIN type_publication tp ON tp.pk_type_publication = p.fk_type_publication
WHERE tp.pk_type_publication = 2
GROUP BY pk_publication;";
$listeVotes = $bd->query($sql4)->fetchAll(PDO::FETCH_ASSOC);

$lien = "pageUtilisateur.php";
?>

    <!DOCTYPE html>
    <html>
    <style>
        h9 {
            text-align: right;
            padding: 5px;
            color: dodgerblue;
        }

        .publication {
            background-color: lightgrey;
            width: 800px;
            padding: 20px;
            display: inline-block;
            margin-left: 320px;
            margin-bottom: 15px;
            border: solid 1px #000;
        }


        .reponse {
            background-color: lightgray;
            width: 800px;
            padding: 20px;
            display: inline-block;
            margin-left: 320px;
            margin-top: -25px;
            margin-bottom: 15px;
            border-left: solid 1px #000;
            border-bottom: solid 1px #000;
            border-right: solid 1px #000;
        }

        .ajouterReponse {
            background-color: lightgray;
            width: 800px;
            padding: 20px;
            text-align: center;
            margin-left: 320px;
            margin-top: -25px;
            margin-bottom: 25px;
            display: inline-block;
            border-left: solid 1px #000;
            border-bottom: solid 1px #000;
            border-right: solid 1px #000;
            padding-bottom: 15px;
        }

        .rating_reponse {
            float: left;
            margin-left: 100px;
            margin-top: 30px;
        }

        .connexion {
            display: none;
        }

    </style>

    <head>
        <title>Fil d'actualité</title>
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

    </head>

    <body style="background-color: rgb(242,242,242);">
        <div style="display:inline;">
            <?php
                foreach($listeVotes as $vote){
                    echo $vote['val'];
                }
            ?>
                <a href="pageUtilisateur.php"><i class="glyphicon glyphicon-user" style="font-size:60px;float:right;margin-top:20px;margin-right:80px;padding: 2px 3px 3px 2px; color: #FFF;" href="pageUtilisateur.php"></i></a>
                <p style="font-size:80px;text-align:center;background-color:#c2334a;padding-left:150px;color:white;">Fil d'actualité</p>
        </div>
        <br/>
        <br/>
        <div class="border">
            <?php
       foreach($listePub as $pub) {
           if($pub['pk_utilisateur']== $_SESSION['cleUser']) {
                $lien = "pageUtilisateur.php";
           }
           if($pub['pk_utilisateur']!= $_SESSION['cleUser']) {
                $lien = "autrePageUtilisateur.php";
           }
	?>
                <div class="publication">
                    <div style="width:700px;margin-left:50px;margin-top:20px;">
                        <p style="font-weight: bold;">
                            <?php echo $pub['texte']; ?>
                        </p>

                        <i class="glyphicon glyphicon-user"></i>
                        <h9>
                            <a href="<?php echo $lien ?>?cle=<?php echo $pub['pk_utilisateur'] ?>" style="color: dodgerblue;">
                                <?php echo $pub['prenom']; ?>
                                <?php echo $pub['nom']; ?>
                            </a>
                        </h9>
                    </div>
                </div>

                <?php
			foreach($listeReponse as $reponse){
                if($reponse['pk_utilisateur']== $_SESSION['cleUser']) {
                    $lien = "pageUtilisateur.php";
                }
                if($reponse['pk_utilisateur']!= $_SESSION['cleUser']) {
                    $lien = "autrePageUtilisateur.php";
                }
                if($reponse['fk_publication'] == $pub['fk_publication']){

			?>
                    <div class="reponse">
                        <div class="rating_reponse">
                            <i class="glyphicon glyphicon-triangle-top" style="color:dimgrey;"></i> <br/>
                            <p style="padding-left:3px;padding-top:3px;font-weight: bold;">0
                            </p>
                            <i class="glyphicon glyphicon-triangle-bottom" style="color:dimgrey;"></i> <br/>
                        </div>
                        <div style="width:600px;float: right;">
                            <hr/>
                            <p style="font-weight: bold;">
                                <?php echo $reponse['texte']; ?>
                            </p>

                            <i class="glyphicon glyphicon-user"></i>
                            <h9>
                                <a href="<?php echo $lien ?>?cle=<?php echo $reponse['pk_utilisateur'] ?>" style="color: dodgerblue;">
                                    <?php echo $reponse['prenom']; ?>
                                    <?php echo $reponse['nom']; ?>
                                </a>
                            </h9>
                        </div>
                    </div>
                    <?php }} ?>
                    <?php if($pub['fk_type_publication'] != 3) {?>
                    <div class="ajouterReponse">
                        <hr/>
                        <form id="form" method="post" action="mc_SoumissionCommentaire.php">
                            <textarea class="texte" name="texteCommentaire" rows="10" style="width:500px;height:150px;margin-top:10px;resize:none;"></textarea><br/>
                            <button type="submit" style="color:dimgrey;margin-left:-420px;margin-top:5px;">Répondre</button>
                             <input type="hidden" value="<?php echo $pub['fk_publication']; ?>" name="clePub">
                        </form>
                    </div>
                    <?php  } }?>
    </body>

    </html>
    <?php
  }
  else
    require 'connexion.php';
?>
