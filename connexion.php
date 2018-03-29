<?php
  include 'bd.php';
  $sql1 = "SELECT *,specialite.nom as nom_specialite FROM specialite  INNER JOIN utilisateur ON specialite.pk_specialite = utilisateur.fk_specialite;";
  $sql2 = "SELECT * FROM publication INNER JOIN utilisateur on publication.fk_utilisateur = utilisateur.pk_utilisateur WHERE publication.fk_type_publication = 1 or publication.fk_type_publication = 3;";
  $sql3 = "SELECT * FROM publication INNER JOIN utilisateur on publication.fk_utilisateur = utilisateur.pk_utilisateur WHERE publication.fk_type_publication = 2;";

  $sql5= "SELECT count(*) FROM publication INNER JOIN utilisateur on publication.fk_utilisateur = utilisateur.pk_utilisateur;";
  $listeUsers = $bd->query($sql1)->fetchAll(PDO::FETCH_ASSOC);
  $listePub = $bd->query($sql2)->fetchAll(PDO::FETCH_ASSOC);
  $listeReponse = $bd->query($sql3)->fetchAll(PDO::FETCH_ASSOC);
  $nbPublicationsTotales = $bd->query($sql5)->fetch(PDO::FETCH_ASSOC);
?>
    <html>
    <style>
        .connexion {
            background-color: #c2334a;
            border: solid 1px #c2334a;
            border-radius: 5px;
            width: 300px;
            text-align: center;
            position: absolute;
            z-index: 15;
            top: 50%;
            left: 50%;
            margin: -200px 0 0 -150px;
        }

        p {
            padding-top: 10px;
            font-weight: bold;
        }

    </style>

    <head>
        <title>Connexion</title>
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
        <div class="connexion">
            <i class="glyphicon glyphicon-user" style="font-size:60px;padding-top: 5px;margin-top: 10px;background-color:white;border-top:solid 1px white;border-left:solid 1px white;border-right:solid 1px white;border-radius: 5px 5px 0px 0px;"></i>
            <form method="post" action="mc_Connexion.php">
                <p>Prénom :</p>
                <input type="text" name="prenom" required><br/>
                <p>Nom :</p>
                <input type="text" name="nom" required><br/>
                <p>Nombre de sessions :</p>
                <input type="number" name="nbSession" min="1" max="50" style="width:175px;" required><br/>
                <p>Spécialité :</p>
                <select name="specialite" style="width:175px;" required><br/>
                <option value="HTML" >HTML</option>
                <option value="SQL">SQL</option>
                <option value="COBOL">COBOL</option>
                <option value="PHP">PHP</option>
                <option value="C#">C#</option>
            </select>
                <br/>
                <br/>
                <input type="submit" value="Connexion">
            </form>
            <br/>
            <br/>
        </div>
    </body>

    </html>
