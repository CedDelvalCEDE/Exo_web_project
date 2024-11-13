

<?php
// this file has the static structure of the website in two variables [$header, $footer]
// explicate is a facultative variable
ob_start(); 
?>

<!DOCTYPE html>
<html lang='fr'>
    <head>
            <meta charset='utf-8'>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta name="description" content="<?=$metaDescription?>">
            <title>Web</title>
            <link href='Style.css' rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <div class="menu-bar">
                <a <?php if ($_SERVER["REQUEST_URI"] == "/index.php") { echo "class='select'";} else { echo "class='menu-btn'";} ?> href='index.php'>Accueil</a>
                <?php
                // <a <?php if ($_SERVER["REQUEST_URI"] == "/Contact.php") { echo "class='select'";} else { echo "class='menu-btn'";} ?> href='Contact.php'>Contact</a>
                ?>
            </div>
        </header>
        <main>

<?php $header = ob_get_clean(); ob_start(); ?>

        </main>
        <footer>
            Cédric Delval
        </footer>
    </body>
</html>

<?php $footer = ob_get_clean(); ob_start(); ?>

<div>
    <h2>Explicatif</h2>
    <p>Ce site sert de test</p>
</div>

<?php $explicate = ob_get_clean(); ?>