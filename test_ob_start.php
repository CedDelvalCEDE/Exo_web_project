<?php
    ob_start();
    ?>
    <div>
        <h2>Explicatif</h2>
        <p>Ce site sert de test</p>
    </div>
    <?php
    $html = ob_get_clean();
?>