<?php

if ($pageTitre == "Accueil") {
    $Accueil = "./index.php";
    $Contact = "./body/Contact.php";
    $Connexion = "./body/Connexion.php";
    $pageCss = "./assets/style.css";
}
else {
    $Accueil = "./../index.php";
    $Contact = "./Contact.php";
    $Connexion = "./Connexion.php";
    $pageCss = "./../assets/style.css";
}
ob_start()
?>
<!DOCTYPE html>
<html lang='fr'>
    <head>
            <meta charset='utf-8'>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="<?=$metaDescription?>">
            <title><?=$pageTitre?></title>
            <link href=<?=$pageCss?> rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <div class="menu-bar">
                <a <?php if ($_SERVER["REQUEST_URI"] == "/index.php") { echo "class='select'";} else { echo "class='menu-btn'";} ?> href=<?=$Accueil?>>Accueil</a>
                <a <?php if ($_SERVER["REQUEST_URI"] == "/Contact.php") { echo "class='select'";} else { echo "class='menu-btn'";} ?> href=<?=$Contact?>>Contact</a>
                <a <?php if ($_SERVER["REQUEST_URI"] == "/Connexion.php") { echo "class='select'";} else { echo "class='menu-btn'";} ?> href=<?=$Connexion?>>Connexion</a>

            </div>
        </header>
        <main>
<?php $header = ob_get_clean()?>