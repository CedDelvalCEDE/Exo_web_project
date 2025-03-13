<?php
$metaDescription = "Contact";
$pageTitre = "Contact";
$postAnswer = "";
require_once __DIR__ . DIRECTORY_SEPARATOR . ".."  . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "header.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . ".."  . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "footer.php";
?>
<?=$header?>
<h1>Contactez Nous</h1>
<fieldset class="Container">
    <form action="/App/contactForm.php" method="post">
        <label for="nom">nom</label><br>
        <input type="text" class="input-setup" id="nom" name="nom" required minlength="2" maxlength="255"><br>
        <label for="prenom">prénom</label><br>
        <input type="text" class="input-setup" id="prenom" name="prenom" minlength="2" maxlength="255"><br>
        <label for="email">email</label><br>
        <input type="email" class="input-setup" id="email" name="email" required><br>
        <label for="message">message</label><br>
        <textarea type="text" class="input-setup" id="message" name="message" rows="8" cols="20" required minlength="10" maxlength="3000"></textarea><br>
        <input class="submit" type="submit">
        <p><?=$postAnswer?></p>
    </form>
</fieldset>
<?=$footer?>