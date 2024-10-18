<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="<?php echo $description; ?>"/>
    <link rel="shortcut icon" href="./pictures/logo.png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link id="theme" rel="stylesheet" href="styles.css"> 
    <title><?php echo $title; ?></title>
</head>
<body>
<header>
<div class="header-container d-flex justify-content-between align-items-center p-3">
        <a href="https://lrslearntherightskills.alwaysdata.net" class="logo"><img src="./pictures/logo.png" alt="Logo du site" /></a>
        <p class="paragraphe">Learn the Right Skills</p>

        <button class="btn btn-outline-light d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
            Menu
        </button>
    </div>
</header>

<div class="icon-background">
    <img src="./pictures/icon1.png" alt="Icon 1" class="icon" id="icon1"/>
    <img src="./pictures/icon2.png" alt="Icon 2" class="icon" id="icon2"/>
    <img src="./pictures/icon3.png" alt="Icon 3" class="icon" id="icon3"/>
    <img src="./pictures/icon4.png" alt="Icon 4" class="icon" id="icon4"/>
    <img src="./pictures/icon5.png" alt="Icon 5" class="icon" id="icon5"/>
    <img src="./pictures/icon6.png" alt="Icon 6" class="icon" id="icon6"/>
</div>
<!-- Bouton pour changer le style -->
<div class="button" style="position: fixed; top: 200px; right: 10px;">
    <img id="theme-icon" src="pictures/moon.svg" alt="Changer de mode" onclick="changeStyle()" style="cursor: pointer;width:20px;height:20px" />
</div>
<!-- Bannière de consentement aux cookies -->
<div id="cookie-banner">
    Ce site utilise des cookies pour améliorer votre expérience. Acceptez-vous les cookies non indispensables comme le cookie de style ?
    <button id="accept-cookies">Accepter</button>
    <button id="reject-cookies">Refuser</button>
</div>

