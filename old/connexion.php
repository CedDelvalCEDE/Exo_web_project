<?php
$metaDescription = "Page de connexion de mon site";
require_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "header.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "footer.php";
echo $header;
?>
<h1>Inscription</h1>
<fieldset>
    <form method="post">
        <label for="user_name">Votre pseudo</label>
        <input class="right-stink" type="text" name="user_name" id="user_name" required></input><br>
        <label for="user_name">Votre mot de passe</label>
        <input class="right-stink" type="password" name="user_name" id="user_name" required></input><br>
        <input type="submit" value="envoyer">
        <input class="right-stink" type="reset" value="annuler">
    </form>
</fieldset>
<?php
echo $explicate;
echo $footer;
?>