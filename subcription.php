<?php
$metaDescription = "Page d'inscription de mon site";
require_once __DIR__ . DIRECTORY_SEPARATOR . "structure.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "Cookies.php";
echo $header;
?>
<h1>Inscription</h1>
<fieldset>
    <form method="post">
        <label for="user_name">Votre pseudo</label>
        <input class="right-stink" type="text" name="user_name" id="user_name" required></input><br>
        <label for="user_mail">Votre email</label>
        <input class="right-stink" type="email" name="user_mail" id="user_mail" required></input><br>
        <label for="user_name">Votre mot de passe</label>
        <input class="right-stink" type="password" name="user_name" id="user_name" required></input><br>
        <label for="user_name">Votre mot de passe de confirmation</label>
        <input class="right-stink" type="password" name="user_name" id="user_name" required></input><br>
        <input type="submit" value="envoyer">
        <input class="right-stink" type="reset" value="annuler">
    </form>
</fieldset>
<?php
echo $explicate;
echo $footer;
?>