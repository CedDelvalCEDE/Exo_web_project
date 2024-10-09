<?php
$metaDescription = "Page d'accueil de mon site";
require_once __DIR__ . DIRECTORY_SEPARATOR . "header.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "test_ob_start.php"
?>
    <h1>Welcome</h1>
    <?=$html?>
<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . "footer.php";
?>