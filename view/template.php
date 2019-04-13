<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/smallMenu.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Roboto|Shadows+Into+Light" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Noto+Serif+KR|Tangerine" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" />
        <link rel="icon" href="images/favicon.ico" />
    </head>
        
    <body>
        <?php
        include('includes/header.php');
        ?>
		<?= $content ?>
        
        <!-- Bouton pour revenir en haut de la page -->
        <div id="upBtn">
            <a href="#">
                <img src="images/up.png" width="30" height="60" />
            </a>
        </div>
        <script src="js/goUp.js"></script>
    </body>
</html>