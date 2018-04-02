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
        <!-- Google Code for Connexion utilisateur Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 862205090;
var google_conversion_label = "haGdCM_m238QoumQmwM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/862205090/?label=haGdCM_m238QoumQmwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
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
                
                <option value="1">SQL</option>
                <option value="2">PHP</option>
                <option value="3" >HTML</option>
                <option value="4">COBOL</option>                
                <option value="5">C#</option>
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
