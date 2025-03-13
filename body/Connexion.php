<?php
$metaDescription = "Page de connexion";
$pageTitre = "Connexion";
require_once __DIR__ . DIRECTORY_SEPARATOR . ".."  . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "header.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . ".."  . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "footer.php";
echo $header;
?>
<h1>Connexion</h1>
<fieldset class="Container">
    <form action="/App/connexionForm.php" method="post">
        <label for="surnom">pseudo</label><br>
        <input class="input-setup" type="text" name="surnom" id="surnom" minlength="2" maxlength="255" required></input><br>
        <label for="motDePasse">mot de passe</label><br>
        <input class="input-setup" type="motDePasse" name="motDePasse" id="motDePasse" minlength="8" maxlength="72" required></input><br>
        <input class="submit" type="submit" value="envoyer">
        <input class="submit" type="reset" value="annuler">
    </form>
    <p>
    Si vous souhaitez vous <a href='./Inscription.php'>Inscrire</a>
    </p>
</fieldset>
<?php
echo $footer;
?>