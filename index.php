<?php
require 'connexion.php';
session_start();
if(isset($_SESSION['cleUser'])){
$sql4= "SELECT SUM(valeur) as val FROM vote v
INNER JOIN publication p ON v.fk_publication = p.pk_publication where p.fk_type_publication = 2 GROUP BY p.pk_publication;";
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <
            script async src = "https://www.googletagmanager.com/gtag/js?id=UA-116674960-1" >

        </script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-116674960-1');

        </script>
        <!-- Google Code for R&eacute;pondre &agrave; un commentaire Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 862205090;
var google_conversion_label = "Bn-tCLui8n8QoumQmwM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/862205090/?label=Bn-tCLui8n8QoumQmwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


    </head>

    <body style="background-color: rgb(242,242,242);">
        <div style="display:inline;">
<<<<<<< HEAD
                <a href="pageUtilisateur.php"><i class="glyphicon glyphicon-user" style="font-size:60px;float:right;margin-top:20px;margin-right:80px;padding: 2px 3px 3px 2px; color: #FFF;" href="pageUtilisateur.php"></i></a>
                <p style="font-size:80px;text-align:center;background-color:#c2334a;padding-left:150px;color:white;">Fil d'actualité</p>
=======
            <a href="pageUtilisateur.php"><i class="glyphicon glyphicon-user" style="font-size:60px;float:right;margin-top:20px;margin-right:80px;padding: 2px 3px 3px 2px; color: #FFF;" href="pageUtilisateur.php"></i></a>
            <p style="font-size:80px;text-align:center;background-color:#c2334a;padding-left:150px;color:white;">Fil d'actualité</p>
>>>>>>> 8519ba7d87c8dd1c208ad35880dbb40a2a6acb8d
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
                        <p style="font-weight: normal;">
                            <?php echo $pub['texte']; ?>
                        </p>

                        <i class="glyphicon glyphicon-user"></i>

                        <h9>
                            <a href="<?php echo $lien ?>?cle=<?php echo $pub['pk_utilisateur'] ?>" style="color: dodgerblue;">
                                <?php echo $pub['prenom']; ?>
                                <?php echo $pub['nom']; ?>
                            </a>
                        </h9>
                        <p style="margin-left:580px;margin-top:-30px;">
                            <?php 
                                if($pub['fk_type_publication'] == 1) {
                                    if($pub['fk_specialite'] == 1)
                                        echo "Spécialité : SQL";
                                        if($pub['fk_specialite'] == 2)
                                            echo " Spécialité : PHP";
                                            if($pub['fk_specialite'] == 3)
                                                echo " Spécialité : HTML";
                                                if($pub['fk_specialite'] == 4)
                                                    echo "Spécialité : COBOL";
                                                    if($pub['fk_specialite'] == 5)
                                                        echo " Spécialité : C#"; }
                                ?>
                        </p>
                    </div>
                </div>

                <?php
           $i =0;
           $vote = 1;
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
                        <i id="bestVote" class="glyphicon glyphicon-fire" style="color:dimgray;font-size: 25px;margin-left:-60px;margin-top:50px;">
                        </i>
                        <div class="rating_reponse">
                            <i id="augVote" class="glyphicon glyphicon-triangle-top" style="color:dimgrey;"></i> <br/>
                            <p style="padding-left:3px;padding-top:3px;font-weight: bold;">
                                <?php if($i >= count($listeVotes)) { ?> 0
                                <?php } else {echo $listeVotes[$i]['val'];} $i++; ?>
                            </p>
                            <i id="desVote" class="glyphicon glyphicon-triangle-bottom" style="color:dimgrey;"></i> <br/>
                        </div>
                        <div style="width:600px;float: right;">
                            <hr/>
                            <p style="font-weight: normal;">
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
<<<<<<< HEAD
                    <?php }} if($pub['fk_type_publication'] != 3) { ?>
=======
                    <?php }} ?>
                    <?php if($pub['fk_type_publication'] != 3) {?>
>>>>>>> 8519ba7d87c8dd1c208ad35880dbb40a2a6acb8d
                    <div class="ajouterReponse">
                        <hr/>
                        <form id="form" method="post" action="mc_soumissionCommentaire.php">
                            <textarea class="texte" name="texteCommentaire" rows="10" style="width:500px;height:150px;margin-top:10px;resize:none;"></textarea><br/>
                            <button type="submit" style="color:dimgrey;margin-left:-420px;margin-top:5px;">Répondre</button>
                             <input type="hidden" value="<?php echo $pub['fk_publication']; ?>" name="clePub">
                        </form>
                    </div>
<<<<<<< HEAD
                    <?php  }} ?>
=======
                    <?php  } }?>
>>>>>>> 8519ba7d87c8dd1c208ad35880dbb40a2a6acb8d
    </body>

    </html>
    <?php
  }
  else
    require 'connexion.php';
?>
        <script type="text/javascript">
            $("document").ready(function() {
                $('i#bestVote').click(function() {
                    if ($('i#bestVote').css("color") != "rgb(105, 105, 105)")
                        $('i#bestVote').css("color", "dimgray");
                    else
                        $("i#bestVote").css("color", "red");
                });

                $('i#desVote').click(function() { 
                    <?php $vote -= 1; $listeVotes[$i]['val'] -= 1; ?>
                });
                $('i#augVote').click(function() { 
                    <?php $vote -= 1; $listeVotes[$i]['val'] += 1; ?>
                });

            });

        </script>
