<?php
if (session_status() !== 2) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <base href="/" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./static/img/favicon.ico">

    <!-- Font Family -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:wght@400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <link rel="stylesheet" href="./static/css/style.css">

    <title>Accueil</title>
</head>

<body>
    <canvas id="canvasheader"></canvas>
    <header>
        <div id="logo">
            <a href='Accueil'><img src="./static/img/logo.png" alt="Logo" id="logo_image"></a>
        </div>
        <div id="nav">
            <nav>
                <a href='Accueil'>ACCUEIL</a>
                <?php if (!isset($_SESSION['user_name'])) : ?>
                    <a href='Inscription'>INSCRIPTION</a>
                    <a href='Connexion'>CONNEXION</a>
                <?php endif ?>
                <?php if (isset($_SESSION['user_name'])) : ?>
                    <a href='Profil'>PROFIL</a>
                    <a href='index.php?action=deconnexion'>DÉCONNEXION</a>
                <?php endif ?>
            </nav>
            <?php if (isset($_SESSION['user_name'])) : ?>
                <?php if (empty($_SESSION['avatar'])) : ?>
                    <img class="header_avatar" src="./static/img/Avatar/Avatar.png" alt="Your Avatar">
                <?php else : ?>
                    <img class="header_avatar" src="./static/img/Avatar/<?= $_SESSION['avatar'] ?>" alt="Your Avatar">
                <?php endif ?>
            <?php endif ?>
        </div>

    </header>
    <?php if (isset($errors['flash_error'])) : ?>
        <div class="flash_error">
            <p><?= $errors['flash_error'] ?></p>
        </div>
    <?php endif ?>
    <?php if (isset($success['flash_success'])) : ?>
        <div class="flash_success">
            <p><?= $success['flash_success'] ?></p>
        </div>
    <?php endif ?>
    <div id="banniere"></div>