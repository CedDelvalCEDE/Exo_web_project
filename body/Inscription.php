<?php
$metaDescription = "Page d'inscription";
$pageTitre = "Inscription";
require_once __DIR__ . DIRECTORY_SEPARATOR . ".."  . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "header.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . ".."  . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "footer.php";
echo $header;
?>
<h1>Inscription</h1>
<fieldset class="Container">
    <form action="/App/inscriptionForm.php" method="post">
        <label for="surnom">Votre pseudo</label>
        <input class="right-stink" type="text" name="surnom" id="surnom" minlength="2" maxlength="255" required></input><br>
        <label for="mail">Votre email</label>
        <input class="right-stink" type="email" name="mail" id="mail" required></input><br>
        <label for="motDePasse">Votre mot de passe</label>
        <input class="right-stink" type="motDePasse" name="motDePasse" id="motDePasse" minlength="8" maxlength="72" required></input><br>
        <label for="motDePasseC">Votre mot de passe de confirmation</label>
        <input class="right-stink" type="motDePasseC" name="motDePasseC" id="motDePasseC" minlength="8" maxlength="72" required></input><br>
        <input type="submit" value="envoyer">
        <input class="right-stink" type="reset" value="annuler">
    </form>
</fieldset>
<?php
echo $footer;
?>