<?php ob_start()?>
<!DOCTYPE html>
<html lang='fr'>
    <head>
            <meta charset='utf-8'>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="<?=$metaDescription?>">
            <title><?=$pageTitre?></title>
            <link href='/assets/style.css' rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <div class="menu-bar">
                <a <?php if ($_SERVER["REQUEST_URI"] == "/index.php") { echo "class='select'";} else { echo "class='menu-btn'";} ?> href='/index.php'>Accueil</a>
                <a <?php if ($_SERVER["REQUEST_URI"] == "/Contact.php") { echo "class='select'";} else { echo "class='menu-btn'";} ?> href='/body/Contact.php'>Contact</a>
                <a <?php if ($_SERVER["REQUEST_URI"] == "/Connexion.php") { echo "class='select'";} else { echo "class='menu-btn'";} ?> href='/body/Connexion.php'>Connexion</a>
            </div>
        </header>
        <main>
<?php $header = ob_get_clean()?>