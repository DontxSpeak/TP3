<?php
include 'connexion.php';
$sql3 =  "SELECT Count(publication.texte)  FROM publication INNER JOIN utilisateur on publication.fk_utilisateur = utilisateur.pk_utilisateur;";
$stmt = $bd->prepare($sql3);
$stmt -> execute(array($num_rows));
$nbPosts = $stmt->fetchColumn();
$jsVar = $nbPosts;
?>

    <!DOCTYPE html>
    <html>
    <style>
        h9 {
            text-align: right;
            padding: 5px;
            color: dodgerblue;
        }

        .publication<?php echo $nbPosts;
        ?> {
            background-color: lightgrey;
            width: 800px;
            padding: 20px;
            display: inline-block;
            margin-left: 320px;
            border: solid 1px #000;
        }


        .reponse<?php echo $nbPosts?> {
            background-color: lightgray;
            width: 800px;
            padding: 20px;
            display: inline-block;
            margin-left: 320px;
            margin-top: -25px;
            border-left: solid 1px #000;
            border-bottom: solid 1px #000;
            border-right: solid 1px #000;
        }

        .ajouterReponse<?php echo $nbPosts?> {
            background-color: lightgray;
            width: 800px;
            padding: 20px;
            text-align: center;
            margin-left: 320px;
            margin-top: -25px;
            display: inline-block;
            border-left: solid 1px #000;
            border-bottom: solid 1px #000;
            border-right: solid 1px #000;
        }

        .rating {
            float: left;
            margin-left: 10px;
            margin-top: 10px;
        }

        .rating_reponse {
            float: left;
            margin-left: 100px;
            margin-top: 20px;
        }

        .connexion {
            display: none;
        }

    </style>

    <head>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    </head>

    <body style="background-color: rgb(242,242,242);">
        <div style="display:inline;">
            <a href="pageUtilisateur.php"><i class="glyphicon glyphicon-user" style="font-size:60px;float:right;margin-top:20px;margin-right:80px;padding: 2px 3px 3px 2px; color: #FFF;" href="pageUtilisateur.php"></i></a>
            <p style="font-size:80px;text-align:center;background-color:#c2334a;padding-left:150px;color:white;">Fil d'actualité</p>
        </div>
        <br/>
        <br/>
        <div class="border">
            <?php while($nbPosts >= 0){?>
            <div class="publication<?php echo $nbPosts;?>">
                <div style="width:700px;margin-left:50px;margin-top:20px;">
                    <p style="font-weight: bold;">
                        <?= $listePub[$nbPosts]['texte'];?>
                    </p>

                    <i class="glyphicon glyphicon-user"></i>
                    <h9>
                        <?= $listeUsers[$nbPosts]['prenom'];?>
                            <?= $listeUsers[$nbPosts]['nom'];?>
                    </h9>
                </div>
            </div>
            <div class="reponse<?php echo $nbPosts?>">
                <div class="rating_reponse">
                    <i class="glyphicon glyphicon-triangle-top" style="color:dimgrey;"></i> <br/>
                    <p style="padding-left:3px;padding-top:3px;font-weight: bold;">0</p>
                    <i class="glyphicon glyphicon-triangle-bottom" style="color:dimgrey;"></i> <br/>
                    <i class="glyphicon glyphicon-fire" style="color:red;font-size:25px;margin-left:-5px;margin-top:5px;"></i>
                </div>
                <div style="width:600px;float: right;">
                    <hr/>
                    <p style="font-weight: bold;">
                        <?= $listePub[$nbPosts]['texte'];?>
                    </p>

                    <i class="glyphicon glyphicon-user"></i>
                    <h9>
                        <?= $listeUsers[$nbPosts]['prenom'];?>
                            <?= $listeUsers[$nbPosts]['nom'];?>
                    </h9>
                </div>
            </div>
            <div class="ajouterReponse<?php echo $nbPosts?>">
                <hr/>
                <form id="form_<?php echo $nbPosts?>" method="post" action="/index.php">
                    <textarea class="texte" rows="10" style="width:500px;height:150px;margin-top:10px;resize:none;"></textarea><br/>
                    <button type="submit" style="color:dimgrey;margin-left:-420px;margin-top:5px;">Répondre</button>
                </form>
            </div>
            <?php if($nbPosts == 0){ $nbPosts = 0;}  $nbPosts--;  } ?>
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
    </body>
    <script>
        var javaScriptVar = "<?php echo $jsVar; ?>";
        while (javaScriptVar != 0) {
            console.log(javaScriptVar);
            $('#Répondre' + javaScriptVar).click(function() {
                $('.ajouterReponse' + javaScriptVar).show();
            });
            javaScriptVar--;
        }

    </script>

    </html>
