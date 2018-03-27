<?php
include 'connexion.php';
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
    </head>

    <body class="fondEcran" style="background-color: rgb(242,242,242);">
        <div style="display:inline;">
            <a href="index.php"><i class="glyphicon glyphicon-home" style="font-size:60px;float:right;margin-top:20px;margin-right:80px;color:white;padding:8px 12px 8px 9px;"></i></a>
            <p style="font-size:80px;text-align:center;background-color:#c2334a;padding-left:150px;color: white;">Page de
                <?php echo $listeUsers[0]['prenom']; ?>
                <?php echo $listeUsers[0]['nom']; ?>
            </p>
        </div>
        <div class="en-tête" style="width:100%; text-align:center;margin-bottom:200px; background-color: #c2334a;color:#FFFF;padding:10px;margin-top:-15px;">
            <hr/>
            <h3 style="text-align:center;"> Spécialité :
                <?php echo $listeUsers[0]['nom_specialite'] ?>
            </h3>
            <h3 style="text-align:center;"> Nombre de session:
                <?php echo $listeUsers[0]['nb_session']; ?>
            </h3>
        </div>

        <div class="newsfeed" style="width:100%; text-align:center;">Publications

            <div style="margin-left:410px;margin-top:20px; border: solid 3px black;background-color: lightgray; width:600px;">
                <p style="font-weight: bold;">
                    <?= $listePub[0]['texte'];?>
                </p>
            </div>

        </div>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>

    </body>

    </html>
