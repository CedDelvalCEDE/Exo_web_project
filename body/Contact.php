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
        <label for="nom">Votre nom</label><br>
        <input type="text" id="nom" name="nom" required minlength="2" maxlength="255"><br>
        <label for="prenom">Votre prénom</label><br>
        <input type="text" id="prenom" name="prenom" minlength="2" maxlength="255"><br>
        <label for="email">Votre email</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="message">Votre message</label><br>
        <textarea type="text" id="message" name="message" rows="8" cols="20" required minlength="10" maxlength="3000"></textarea><br>
        <input type="submit">
        <label><?=$postAnswer?></label>
    </form>
</fieldset>
<?=$footer?>