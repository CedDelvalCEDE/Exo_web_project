<?php
$metaDescription = "Page de connexion";
$pageTitre = "Connexion";
require_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "header.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "template" . DIRECTORY_SEPARATOR . "footer.php";
echo $header;
?>
<h1>Connexion</h1>
<fieldset>
    <form action="/App/connexionForm.php" method="post">
        <label for="surnom">Votre pseudo</label>
        <input class="right-stink" type="text" name="surnom" id="surnom" minlength="2" maxlength="255" required></input><br>
        <label for="motDePasse">Votre mot de passe</label>
        <input class="right-stink" type="motDePasse" name="motDePasse" id="motDePasse" minlength="8" maxlength="72" required></input><br>
        <input type="submit" value="envoyer">
        <input class="right-stink" type="reset" value="annuler">
    </form>
    <p>
    Si vous souhaitez vous <a href='/body/Inscription.php'>Inscrire</a>
    </p>
</fieldset>
<?php
echo $footer;
?>