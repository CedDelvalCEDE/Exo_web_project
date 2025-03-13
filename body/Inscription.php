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
        <label for="surnom">pseudo</label><br>
        <input class="input-setup" type="text" name="surnom" id="surnom" minlength="2" maxlength="255" required></input><br>
        <label for="mail">email</label><br>
        <input class="input-setup" type="email" name="mail" id="mail" required></input><br>
        <label for="motDePasse">mot de passe</label><br>
        <input class="input-setup" type="motDePasse" name="motDePasse" id="motDePasse" minlength="8" maxlength="72" required></input><br>
        <label for="motDePasseC">mot de passe de confirmation</label><br>
        <input class="input-setup" type="motDePasseC" name="motDePasseC" id="motDePasseC" minlength="8" maxlength="72" required></input><br>
        <input type="submit" class="submit" value="envoyer">
        <input class="submit" type="reset" value="annuler">
    </form>
</fieldset>
<?php
echo $footer;
?>