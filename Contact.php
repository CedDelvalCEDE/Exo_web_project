<?php
$metaDescription = "Page de contact de mon site";
require_once __DIR__ . DIRECTORY_SEPARATOR . "structure.php";
?>
<?=$header?>
<h1>Contact</h1>
<fieldset>
    <form action="form_worker.php" method="post">
        <label for="user_name">Votre prénom</label>
        <input class="right-stink" type="text" name="user_name" id="user_name"></input><br>
        <label for="user_surname">Votre nom</label>
        <input class="right-stink" type="text" name="user_surname" id="user_surname"></input><br>
        <label for="user_mail">Votre email</label>
        <input class="right-stink" type="email" name="user_mail" id="user_mail"></input><br>
        <label for="message">Un message sur vos impressions</label><br>
        <input class="right-stink" type="textarea" name="message" id="message"></input><br>
        <input type="submit" value="envoyer">
        <input class="right-stink" type="reset" value="annuler">
    </form>
</fieldset>
<?=$explicate?>
<?=$footer?>